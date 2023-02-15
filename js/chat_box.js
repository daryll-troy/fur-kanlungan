$(document).ready(function () {
    // when the image is clicked
    // $('.phoImage').click(function() {
    //     alert('i am double clicked!')
    // })

    // when send button is clicked
    $(".send").click(() => {
        // for sending text
        let cf = $.trim($('.chat_field').val());
        if (cf !== "") {
            $.ajax({
                url: 'chat_queries.php',
                method: 'post',
                dataType: "text",
                data: { message: cf },
                success: (output) => {
                    // console.log(output);
                }
            })

        }

        // empty the chat_field after sending
        $('.chat_field').val("");
    })

    // when enter is pressed while keydown
    $('.chat_field').keypress(function (event) {
        let cf = $.trim($('.chat_field').val());
        var keycode = (event.keyCode ? event.keyCode : event.which);
        // when enter key is pressed while cursor is active
        if (cf !== "") {
            // create a new line with shit+enter, if enter only, then send the message
            if (keycode == '13' && !event.shiftKey) {

                // for sending text
                $.ajax({
                    url: 'chat_queries.php',
                    method: 'post',
                    dataType: "text",
                    data: { enter_key: cf },
                    success: (output) => {
                        // console.log(output);
                        // empty the chat_field after sending
                        $('.chat_field').val("");
                    }
                })

            }
        }
        event.stopPropagation();
    });

    // Used for checking the scrollheight change
    localStorage.setItem("height", document.getElementById('messages_display').scrollHeight);
    // refresh the message display for new messages
    setInterval(() => {
        // for sending text
        $.ajax({
            url: "chat_refresh.php",
            method: 'post',
            data: {
                // just set the post variable
                chat_refresh: "refresh"
            },
            dataType: 'text',
            success: function (output) {

                // render the  DM entirely again
                $('.messages_display').html(output);


                // var scrollBottom = $('.messages_display').scrollTop() + $('.messages_display').height();
                let height = document.getElementById('messages_display').scrollHeight;

                // check if the scrollheight increases, if yes, then scroll to bottom
                if (localStorage.getItem("height") != height) {
                    document.getElementById('messages_display').scrollTo(0, $('.messages_display').scrollTop() + height);
                    // set the localstorage height variable equal to the new scrollHeight so than the scrollTo() only executes when a new message is added
                    localStorage.setItem("height", height);
                }

            }

        })
    }, 700)

    // set the scroll bar to the bottom once the page reloads
    let reload = 0;
    while (reload == 0) {
        let height = document.getElementById('messages_display').scrollHeight;
        document.getElementById('messages_display').scrollTo(0, $('.messages_display').scrollTop() + height);
        reload++;
    }

})