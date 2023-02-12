$(document).ready(function () {
    $("#type-search").keyup(function () {
        let search = $("#type-search").val();
        // holds the last message sent
        // let message = "";
        let other_user = "";
        $.ajax({
            url: 'chat_list_filter.php',
            method: 'post',
            data: { search: search },
            success: (output) => {
                output = JSON.parse(output);
                // console.log(output);
                // remove all displayed converstations with other users
                $('.each_userchat').remove();
                output.forEach((result) => {
                    $('.color_container').append(
                        ' <div class="each_userchat">' +
                        '<a href="chat_box.php?pet_user=' + result.userID + '"><img class="prof_pic" src="../images/prof_pics/' + result.prof_pic + '" alt=""></a>' +
                        '<a href="chat_box.php?pet_user=' + result.userID + '" class="atag_name">' +
                        ' <div class="fullname">' + result.fname + ' ' + result.lname + '</div>' +
                        '</a>' +

                        // get the last convo sent between the two users
                        // $.ajax({
                        //     url: 'chat_list_filter.php',
                        //     method: 'post',
                        //     data: { other_user: result.userID },
                        //     success: (output2) => {
                        //         output2 = JSON.parse(output2);
                        //         // console.log(output2);
                        //         // $('.lastConvo').remove();
                        //         output2.forEach(function (result2) {
                        //             //   message = result2.message;
                        //             console.log(result2.message);
                        //             // $('.each_userchat').append(
                        //                 '<div class="lastConvo">' + result2.message + '</div>'
                        //             // );
                        //         })

                        //     }
                        // }) +
                        ' </div>'
                    );
                    other_user = result.userID;
                    // // get the last convo sent between the two users
                    if (search != "") {
                        $.ajax({
                            url: 'chat_list_filter.php',
                            method: 'post',
                            data: { other_user: other_user },
                            success: (output2) => {
                                output2 = JSON.parse(output2);
                                console.log(output2);
                                $('.lastConvo').remove();
                                output2.forEach(function (result2) {
                                    //   message = result2.message;
                                    // console.log(result2.message);
                                    $('.each_userchat').append(
                                        '<div class="lastConvo">' + result2.message + '</div>'
                                    );
                                })

                            }
                        })
                    }else{
                        location.reload()
                    }
                })

            }
        })




    })
})