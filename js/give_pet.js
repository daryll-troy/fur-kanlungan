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
})