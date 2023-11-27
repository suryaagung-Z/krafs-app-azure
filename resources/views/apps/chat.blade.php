@extends('layouts.simple.master')
@section('title', 'Chat App')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
<h3>Forum App</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Forums</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row" id="type-bot">
		<div class="col call-chat-body">

			<div class="card" id="card-chat">
				<div class="card-body p-0">
					<div class="row chat-box">
						<div class="col pe-0 chat-right-aside">
							<div class="chat">
								<div class="chat-header clearfix">
									<img class="rounded-circle" src="{{ asset('assets/images/user/8.jpg') }}" alt="">
									<div class="about">
										<div class="name">Krafs Bot 🤖</div>
										<div class="status text-primary">Online...</div>
									</div>
									<ul class="list-inline float-start float-sm-end chat-menu-icons">
										<li class="list-inline-item">
											<a href="#"><i class="icon-search"></i></a>
										</li>
										<li class="list-inline-item toogle-bar">
											<a href="#"><i class="icon-menu"></i></a>
										</li>
									</ul>
								</div>
								<!-- chat-header end-->
								<div class="chat-history chat-msg-box custom-scrollbar">
									<ul id="box-chat-history">

									</ul>
								</div>
								<!-- end chat-history-->
								<div class="chat-message clearfix">
									<div class="row">
										<div class="col-xl-12 d-flex">
											<div class="smiley-box bg-primary">
												<div class="picker">
													<img src="{{ asset('assets/images/smiley.png') }}" alt="">
												</div>
											</div>
											<div class="input-group text-box" id="send-message">
												<input class="form-control input-txt-bx" id="message-to-send"
													type="text" placeholder="Type a message......">
												<button class="input-group-text btn btn-primary" type="button"
													id="btn-message-submit">SEND</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@foreach ($forums as $forum)
	<div class="row" id="type-group" data-id-forum="{{ $forum->_id }}"
		data-action="{{ route("forum.show-forum", $forum->_id) }}">
		<div class="col call-chat-body">

			<div class="card" id="card-chat">
				<div class="card-body p-0">
					<div class="row chat-box">
						<div class="col pe-0 chat-right-aside">
							<div class="chat">
								<div class="chat-header clearfix">
									<img class="rounded-circle" src="{{ asset('assets/images/user/8.jpg') }}" alt="">
									<div class="about">
										<div class="name">{{ $forum->name }}</div>
										<div class="status text-primary">Online...</div>
									</div>
									<ul class="list-inline float-start float-sm-end chat-menu-icons">
										<li class="list-inline-item">
											<a href="#"><i class="icon-search"></i></a>
										</li>
										<li class="list-inline-item toogle-bar">
											<a href="#"><i class="icon-menu"></i></a>
										</li>
									</ul>
								</div>
								<!-- chat-header end-->
								<div class="chat-history chat-msg-box custom-scrollbar">
									<ul id="box-chat-history">

									</ul>
								</div>
								<!-- end chat-history-->
								<div class="chat-message clearfix">
									<div class="row">
										<div class="col-xl-12 d-flex">
											<div class="smiley-box bg-primary">
												<div class="picker">
													<img src="{{ asset('assets/images/smiley.png') }}" alt="">
												</div>
											</div>
											<div class="input-group text-box" id="send-message">
												<input class="form-control input-txt-bx" id="message-to-send"
													type="text" placeholder="Type a message......">
												<button class="input-group-text btn btn-primary" type="button"
													id="btn-message-submit">SEND</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	@endforeach
</div>
@endsection

@section('script')
<script lang="javascript">
	const csrfToken = document.querySelector(`meta[name="csrf-token"]`).getAttribute('content');
	const pushMessage = (box, message, time, isMyMessage = true) => {
		const messageClass = isMyMessage ? "my-message text-end" : "other-message pull-right";
		box.insertAdjacentHTML(
			"beforeend",
			`
			<li class="${isMyMessage ? '' : 'clearfix'}">
				<div class="message ${messageClass}">
					<img class="rounded-circle ${isMyMessage ? 'float-end' : ''} chat-user-img img-30"
						src="/assets/images/user/12.png" alt="">
					<div class="message-data ${isMyMessage ? 'text-end' : ''}"><span class="message-data-time">${time}</span></div>
					${message}
				</div>
			</li>
			`
		);
	};

	function getCurrentTimeFormatted() {
		const currentDate = new Date();
		let hours = currentDate.getHours();
		let minutes = currentDate.getMinutes();
		
		const amPm = hours >= 12 ? 'PM' : 'AM';
		hours = hours % 12 || 12;
		minutes = minutes < 10 ? '0' + minutes : minutes;

		const formattedTime = `${hours}.${minutes}${amPm}`;
		
		return formattedTime;
	}

	function convertMongoDBTime(mongoDBTime) {
		const date = new Date(mongoDBTime);

		// Dapatkan nilai jam, menit, dan detik
		const hours = date.getUTCHours();
		const minutes = date.getUTCMinutes();

		// Format jam dalam format 12 jam (AM/PM)
		const amPm = hours >= 12 ? 'PM' : 'AM';
		const formattedHours = hours % 12 || 12; // Mengonversi jam 0 menjadi 12 pada format 12 jam

		// Dapatkan nilai milidetik dan formatnya
		const milliseconds = date.getUTCMilliseconds();
		const formattedMilliseconds = String(milliseconds).padStart(3, '0'); // Pastikan tiga digit milidetik

		// Buat string dengan format yang diinginkan
		const formattedTime = `${formattedHours}.${String(minutes).padStart(2, '0')}${amPm}`;

		return formattedTime;
	}
</script>
<script lang="javascript">
	(function(){
		const containerBot = document.querySelector('#type-bot');
		const botBoxChatHistory = containerBot.querySelector('#box-chat-history');
		const botMessageInput = containerBot.querySelector('#message-to-send');
		const botBtnSubmit = containerBot.querySelector('#btn-message-submit');

		const updateBot = async function(){
			const resHistoryChat = await fetch(`{{ route("forum.show-bot") }}`, {
				method: "GET",
				headers: {
					"X-CSRF-TOKEN": csrfToken,
				},
			});

			try {
				const res = await resHistoryChat.json();
				res.messages.forEach((_res_) => {
					pushMessage(botBoxChatHistory, _res_.question, convertMongoDBTime(_res_.created_at), true);
					pushMessage(botBoxChatHistory, _res_.answer, convertMongoDBTime(_res_.created_at), false);
				});
			} catch (error) {
				console.log(error);
			}

		}
		updateBot();
		botBtnSubmit.addEventListener('click', (e)=>{
			e.preventDefault();
			sendMessage({
				url : `{{ route("forum.store-bot") }}`,
				message : botMessageInput.value,
				time : getCurrentTimeFormatted()
			});
		});

		const sendMessage = async (params) => {
			botBtnSubmit.classList.add("disabled");
			pushMessage(botBoxChatHistory, params.message, params.time, true);
			botMessageInput.value = "";

			const response = await fetch(params.url, {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": csrfToken,
				},
				body: JSON.stringify({
					question: params.message,
				}),
			});

			try {
				const responseData = await response.json();
				// console.log(responseData);return;
				pushMessage(botBoxChatHistory, responseData.answer, responseData.time, false);
				botBtnSubmit.classList.remove("disabled");
			} catch (error) {
				console.log(error);
				botBtnSubmit.classList.remove("disabled");
			}
		};

	})();
</script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
	(function () {
		$('#type-group').each( async function(){
			const botBoxChatHistory = $(this).find('#box-chat-history');
			const btnSubmit = $('#btn-message-submit', this);
			const question = $('input#message-to-send', this);
			const idForum = $(this).data('id-forum');
			const actionForum = $(this).data('action');
			
			const resForum = await fetch(actionForum, {
				method: "GET",
				headers: {
					"X-CSRF-TOKEN": csrfToken,
				},
			});

			try {
				const res = await resForum.json();
				res.messages.forEach((_res_) => {
					const isMe = (_res_.user_id == `{{ Auth::id() }}`) ? true : false;
					pushMessage(botBoxChatHistory[0], _res_.message, convertMongoDBTime(_res_.created_at), isMe);
				});
			} catch (error) {
				console.log(error);
			}

			btnSubmit.click(function(){
				btnSubmit.addClass('disabled');
				if(question.val().trim() != ""){
					$.ajax({
						type: "POST",
						cache: false,
						dataType: "json",
						url: `{{ route("forum.store-forum") }}`,
						data: {
							message : question.val(),
							id_forum : idForum,
						},
						headers: {
							"X-CSRF-TOKEN": csrfToken,
						},
						success: function (result) {
							if (result.response_code != 1) {
								alert(result.message);
							}
						},
						error: function () {
							alert("Something went wrong please try again later");
						},
						complete: function(){
							question.val("");
							btnSubmit.removeClass('disabled');
						},
					});
				}
			});
		});


		const pusher = new Pusher("e836809e97a45ab56d3e", {
			cluster: "ap1",
			forceTLS: true,
		});
		const channel = pusher.subscribe("krafs-forum");
		channel.bind("krafs-forum-event", function (data) {
			const boxHistory = $(`#type-group[data-id-forum="${data.id_forum}"] #box-chat-history`);
			const isMe = "{{Auth::id()}}" == data.is_me;
			pushMessage(boxHistory[0], data.message, data.time, isMe);
		});
	})();

</script>
@endsection