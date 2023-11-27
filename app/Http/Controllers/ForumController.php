<?php

namespace App\Http\Controllers;

use App\Models\BotConversation;
use App\Models\Forum;
use App\Models\ForumConversation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use OpenAI;
use Pusher\Pusher;

class ForumController extends Controller
{
    public function index()
    {
        $forums = Forum::all();

        return view('apps.chat', [
            "forums" => $forums,
        ]);
    }

    public function storeBot(Request $request)
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));
        $conv = BotConversation::where("user_id", Auth::id())->get();

        try {

            if ($conv->count() > 0) {
                $_messages = [];
                foreach ($conv as $value) {
                    $_messages[] = [
                        'role' => 'user',
                        'content' => $value->question,
                    ];
                    $_messages[] = [
                        'role' => 'assistant',
                        'content' => $value->answer,
                    ];
                }
                $_messages[] = [
                    'role' => 'user',
                    'content' => $request->input('question')
                ];
                $resOpenAI = $client->chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => $_messages,
                ]);
            } else {
                $resOpenAI = $client->chat()->create([
                    'model' => 'gpt-3.5-turbo',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $request->input('question')
                        ]
                    ],
                ]);
            }

            $conversation = new BotConversation();
            $conversation->user_id = Auth::id();
            $conversation->question = $request->input('question');
            $conversation->answer = $resOpenAI['choices'][0]['message']['content'];
            $conversation->save();


            return response()->json([
                "answer" => $resOpenAI['choices'][0]['message']['content'],
                "time" => $conversation->created_at
            ]);
        } catch (Exception $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    public function showBot()
    {
        $res = BotConversation::where('user_id', Auth::id())->get();
        return response()->json(["messages" => $res]);
    }

    public function showForum(string $id)
    {
        $res = ForumConversation::where('forum_id', $id)->get();

        return response()->json(["messages" => $res]);
    }

    public function storeForum(Request $request)
    {
        $return_data["response_code"] = 0;
        $return_data["message"] = "Something went wrong, Please try again later.";

        $validator = Validator::make($request->all(), [
            "message" => "required",
            "id_forum" => "required",
        ]);

        $getForum = Forum::find($request->all()['id_forum']);
        if (!$getForum || ($getForum == null)) {
            return $return_data;
        }

        if ($validator->fails()) {
            $message = implode(" | ", $validator->messages()->all());
            $return_data["message"] = $message;
            return $return_data;
        }

        try {
            $options = [
                "cluster" => env("PUSHER_APP_CLUSTER"),
                "useTLS" => true
            ];

            $pusher = new Pusher(
                env("PUSHER_APP_KEY"),
                env("PUSHER_APP_SECRET"),
                env("PUSHER_APP_ID"),
                $options
            );

            $response = $pusher->trigger("krafs-forum", "krafs-forum-event", [
                "message" => $validator->validated()['message'],
                "id_forum" => $validator->validated()['id_forum'],
                "is_me" => Auth::id(),
                "time" => getCurrentTimeFormatted()
            ]);

            if ($response) {
                $storeConv = new ForumConversation();
                $storeConv->user_id = Auth::id();
                $storeConv->forum_id = $getForum->_id;
                $storeConv->message = $validator->validated()['message'];
                $storeConv->save();

                if ($storeConv) {
                    $return_data["new_message"] = $storeConv->message;
                } else {
                    $return_data["new_message"] = "Something went wrong.";
                }

                $return_data["response_code"] = 1;
                $return_data["message"] = "Success.";
            }
        } catch (Exception $e) {
            $return_data["message"] = $e->getMessage();
        }

        return response()->json($return_data);
    }
}
