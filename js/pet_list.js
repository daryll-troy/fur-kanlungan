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
            $('#breed').append("<option value='none' class='each_breed> Select Breed</option>");
            breeds.forEach(function (breed) {
                $('#breed').append('<option class = each_breed' + '>' + breed.breed + '</option>');
            })
        })
    })
})

// For displaying the pets based from pet_category only
$(document).ready(function () {

    $("#pet_category").change(function () {
        var pc = $("#pet_category").val();
        if (pc !== "none") {
            // alert(pc);
            $.ajax({
                url: "pet_list_filter.php",
                method: "post",
                data: "pc=" + pc
            }).done(function (pets) {
                pets = JSON.parse(pets);


                $('.black-border').remove();
                console.log(pets);


                // change the list of pets
                pets.forEach(function (value) {
                    var get1photo = "";
                    // get 1 photo from each pet
                    $.ajax({
                        url: 'pet_list_filter.php',
                        method: 'post',
                        data: 'petID=' + value.petID
                    }).done(function (photo) {
                        photo = JSON.parse(photo);
                        
                        photo.forEach(function (pho_value) {
                            get1photo = pho_value.photo;
                            console.log(get1photo);
                            // console.log(new Date().getFullYear() - value.age);
                            $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                " <a href='pet_info.php?pet_id=" + value.petID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                " <div class='card' style='width: 18rem; '>" +
                                "<div class='d-flex justify-content-center ipa-grey'>" +
                                "<img src='../images/pet_pics/" + get1photo
                                + "' class='card-img-top img-fluid' alt='image'>"
                                + "</div>"
                                + "</div>"
                                + "</a>"
                                + "</div>");
                        })


                    })



                })


            })
        } else {
            $.ajax({
                url: 'pet-list.php',
                method: 'get',
                data: 'pc=' + pc

            }).done(function () {
                // reload the document when no filter selected
                location.reload();
            })
        }
    })
})