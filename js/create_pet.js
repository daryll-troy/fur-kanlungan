// For choosing the appropriate breeds based on the pet category selected
$(document).ready(function () {
    $("#pet_category").change(function () {
        var pc = $("#pet_category").val();
        // alert(pc);
        $.ajax({
            url: 'choose_breed.php',
            method: 'post',
            data: 'pc=' + pc
        }).done(function (breeds) {

            breeds = JSON.parse(breeds);
            // console.log(breeds);
            $('#breed').empty();
            breeds.forEach(function (breed) {
                $('#breed').append('<option class = each_breed' + '>' + breed.breed + '</option>')
            })
        })
    })
})

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
$('#btn_create_pet').click(function () {
    checkName();
    checkBirthYear();
    checkGender();
    checkPetCategory();
    checkUploadPics();
    checkDescription();
    all_valid();
});

// check validity of all inputs
function all_valid() {
    let store_color = document.getElementById('name').style.borderColor;
    if (store_color == "lime") {
        store_color = document.getElementById('birthyear').style.borderColor;
        if (store_color == "lime") {
            store_color = document.getElementById('gender').style.borderColor;
            if (store_color == "lime") {
                store_color = document.getElementById('pet_category').style.borderColor;
                if (store_color == "lime") {
                    store_color = document.getElementById('breed').style.borderColor;
                    if (store_color == "lime") {
                        store_color = document.getElementById('upload_pics').style.borderColor;
                        if (store_color == "lime") {
                            store_color = document.getElementById('description').style.borderColor;
                            if (store_color == "lime") {
                                document.getElementById('btn_create_pet').setAttribute("type", "submit");

                            }


                        }
                    }
                }
            }
        }
    }

}

// validate the name
function checkName() {
    if ($('#name').val() == '') {
        $('#name').css("border-color", "red");
        $('#name_err').css("display", "block");
        $('#name_err').text("Please fill this input.");
    } else {
        if (isName($('#name').val())) {
            $('#name').css("border-color", "lime");
            $('#name_err').css("display", "none");
            $('#name_err').text("");

        } else {
            $('#name').css("border-color", "red");
            $('#name_err').css("display", "block");
            $('#name_err').text("Letters and Spaces are only allowed.");
        }

    }
}

function isName(name) {
    // check if the name field contains only letters and spaces
    return /^[A-Za-z\s]*$/.test(name);
}

// validate the age
function checkBirthYear() {
    if ($('#birthyear').val() == '') {
        $('#birthyear').css("border-color", "red");
        $('#birthyear_err').css("display", "block");
        $('#birthyear_err').text("Please fill this input.");
    } else {
        if (onlyNumbers($('#birthyear').val())) {
            let year = parseInt($('#birthyear').val());

            if (year > new Date().getFullYear() || year < 2005) {
                $('#birthyear').css("border-color", "red");
                $('#birthyear_err').css("display", "block");
                $('#birthyear_err').text("Invalid year (2005 & up only).");
            } else {
                $('#birthyear').css("border-color", "lime");
                $('#birthyear_err').css("display", "none");
                $('#birthyear_err').text("");
            }


        } else {
            $('#birthyear').css("border-color", "red");
            $('#birthyear_err').css("display", "block");
            $('#birthyear_err').text("Only numbers are allowed");
        }
    }
}
function onlyNumbers(str) {
    return /^[0-9]*$/.test(str);
}

// validate the gender
function checkGender() {
    if ($('#gender').val() === 'none') {
        $('#gender').css("border-color", "red");
        $('#gender_err').css("display", "block");
        $('#gender_err').text("Please fill this input.");
    } else {
        $('#gender').css("border-color", "lime");
        $('#gender_err').css("display", "none");
        $('#gender_err').text("");
    }
}

// validate the pet category
function checkPetCategory() {
    if ($('#pet_category').val() == 'none') {
        $('#pet_category').css("border-color", "red");
        $('#pet_category_err').css("display", "block");
        $('#pet_category_err').text("Please fill this input.");
    } else {
        $('#pet_category').css("border-color", "lime");
        $('#pet_category_err').css("display", "none");
        $('#pet_category_err').text("");
        $('#breed').css("border-color", "lime");
        $('#breed_err').css("display", "none");
        $('#breed_err').text("");
    }
}



// validate the upload pics
function checkUploadPics() {
    if ($('#upload_pics').val() == '') {
        $('#upload_pics').css("border-color", "red");
        $('#upload_pics_err').css("display", "block");
        $('#upload_pics_err').text("Please fill this input.");
    } else {
        // if($('#upload_pics').files[0].size < 10485760){

        // }else{
        //     $('#upload_pics').css("border-color", "red");
        //     $('#upload_pics_err').css("display", "block");
        //     $('#upload_pics_err').text("File size limit: 10MB");
        // }
        $('#upload_pics').css("border-color", "lime");
        $('#upload_pics_err').css("display", "none");
        $('#upload_pics_err').text("");

    }
}

// validate the description
function checkDescription() {
    if ($('#description').val() == '') {
        $('#description').css("border-color", "red");
        $('#description_err').css("display", "block");
        $('#description_err').text("Please fill this input.");
    } else {
        $('#description').css("border-color", "lime");
        $('#description_err').css("display", "none");
        $('#description_err').text("");
    }
}

