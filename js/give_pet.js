$(document).ready(function () {

    // when name of the user  is clicked
    $(".name_of_message").click(() => {
        $('.give_pet').css("display", "flex");
        $('.blurry').css("display", "block");
    })

    // when outside the container is clicked, hide the container
    $(".blurry").click(() => {
        $('.give_pet').css("display", "none");
        $('.blurry').css("display", "none");
    })

    // i have not used the ajax for giving pets because i cannot find a way to pass the value of userID and petID per row coming from chat_box.php

    // $(".fas").click(() => {
    //     const the_pet = $('.btnGive input').val();
    //     const other_user = $('.other_user').text();

    //     // console.log(the_pet + " " + other_user);
    //     if (confirm("Do you want to give " + the_pet + " to user " + other_user + "?")) {
    //         $.ajax({
    //             url: 'give_pet.php',
    //             method: 'post',
    //             // dataType: "text",
    //             data: {
    //                 uid: ""
    //             },
    //             success: (output) => {
    //                 // output = JSON.parse(output);
    //                 // // console.log(output);

    //                 // output.forEach(function (pet) {
    //                 //     // console.log(pet.name);
    //                 // })


    //             }
    //         })
    //     }
    // })


})
