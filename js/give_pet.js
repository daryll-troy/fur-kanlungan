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

    $(".fas").click(() => {
        let the_pet = $('.the_pet').text();
        let other_user = $('.other_user').text();
        // console.log(the_pet + " " + other_user);
        if(confirm("Do you want to give " +  the_pet + " to user " + other_user +"?")){

        }
    })
})