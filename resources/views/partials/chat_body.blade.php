<!doctype html>
<html lang="en">
  <head>

  	<title>Chat</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    
    <div class="contact-profile">
        <img src="{{ $user->imgfile_path }}" alt="" />
        <p>{{ $user->username }}</p>
    </div>
    <div class="messages">
        <ul>
            @foreach ($messages as $message)
            <li class="{{ ($message->sender_id == $current_user_id) ? 'sent' : 'replies' }}">
                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                <p>{{ $message->message }}</p>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="message-input">
        <div class="wrap">
        <input type="text" placeholder="Write your message..." />
        <button id="send_button" class="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
        </div>
    </div>


    <script src="https://js.pusher.com/7.0.3/pusher.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        Pusher.logToConsole = false;
        var pusher = new Pusher('b9d31bbfd443ce40f0ef', {
        cluster: 'eu'
        });
        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            if ({{ Session::get('current_user_id') }} == data.sender_id) {
                $('#' + data.receiver_id).click();
            } else {
                if ({{ Session::get('current_user_id') }} == data.sender_id) {
                    // if receiver is selected, reload the selected user ...
                    $('#' + data.sender_id).click();
                } 
            }
        });

        function newMessage() {
            message = $(".message-input input").val();
            if($.trim(message) == '') {
                return false;
            }
            $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
            $('.message-input input').val(null);
            $('.contact.active .preview').html('<span>You: </span>' + message);
            $(".messages").animate({ scrollTop: $(document).height() }, "fast");
            var receiver_id = {{ $user_id }};

            if ( message != '' && receiver_id != '') {
                        $(".message-input input").val();
                        var datastr = "receiver_id=" + receiver_id + "&message=" + message;
                        
                        $.ajax({
                            type: "post",
                            url: "chat", // need to create this post route
                            data: datastr,
                            cache: false,
                            success: function (data) {
                            }
                        })
            }
    
};

    //yeni fonk oluştur orada database e yollayan funcı yaz
    $('.submit').click(function() {
    newMessage();
    });

    $(window).on('keydown', function(e) {
    if (e.which == 13) {
        newMessage();
        return false;
    }
    });
});

    </script>

</body>
</html>
