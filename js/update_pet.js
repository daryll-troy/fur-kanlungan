// auto resize the text area for description
$("#description").each(function () {
    this.setAttribute("style", "height:" + (this.scrollHeight) + "px;overflow-y:hidden;");
}).on("input", function () {
    this.style.height = (this.scrollHeight) + "px";
    if ($('#description').val() === "") {
        this.setAttribute("style", "height: 0px");
        $('.form_div').css("width", "60%");
    } else if ($('#description').css("height") > "500px") {
        // resizing the width of form when the description's height exceeds a limit
        $('.form_div').css("width", "100%");

    }

});

// Start to validity of each input when the create button is clicked
$('#btn_update_pet').click(function () {
    checkDescription();
    all_valid();
});

// check validity of all inputs
function all_valid() {
    let store_color = document.getElementById('description').style.borderColor;

  if (store_color == "lime") {
        document.getElementById('btn_update_pet').setAttribute("type", "submit");
    } 

}


// validate the description
function checkDescription() {
    let trimmed = $('#description').val().trim();
    if (trimmed == '') {
        $('#description').css("border-color", "red");
        $('#description_err').css("display", "block");
        $('#description_err').text("Please fill this input.");
    } else {
        $('#description').css("border-color", "lime");
        $('#description_err').css("display", "none");
        $('#description_err').text("");
    }
}
