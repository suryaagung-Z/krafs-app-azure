<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\ForumConversation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Pusher\Pusher;

class PusherController extends Controller
{
    public function sendMessage(Request $request)
    {
        // return response()->json($request->all()['id_forum']);
        $return_data["response_code"] = 0;
        $return_data["message"] = "Something went wrong, Please try again later.";

        $validator = Validator::make($request->all(), [
            "message" => "required",
            "id_forum" => "required",
            "type_forum" => "required"
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
                "is_me" => Auth::id()
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
