// For displaying the appropriate breeds based on the pet category selected
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
            $('#breed').append("<option value='none' class='each_breed'> All Breeds</option>");
            breeds.forEach(function (breed) {

                $('#breed').append('<option class = each_breed' + '>' + breed.breed + '</option>');
            })
        })
    })
})

// For displaying the pets based from the pet_category selected
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
                // console.log(pets);


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



                        // display the pet card
                        photo.forEach(function (pho_value) {
                            var getBreedName = "";
                            // get breed name
                            $.ajax({
                                url: 'pet_list_filter.php',
                                method: 'post',
                                data: 'breedName=' + value.bcID
                            }).done(function (breedName) {
                                breedName = JSON.parse(breedName);

                                breedName.forEach(function (breedName) {
                                    getBreedName = breedName.breed;
                                    get1photo = pho_value.photo;
                                    // console.log(get1photo);
                                    let getAge = new Date().getFullYear() - value.age;

                                    $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                        " <a href='pet_info.php?pet_id=" + value.petID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                        " <div class='card' style='width: 18rem; '>" +
                                        "<div class='d-flex justify-content-center ipa-grey'>" +
                                        "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                        + "</div>" +

                                        "<div class='card-body white-box'>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.name + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span>" + value.sex + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span>" + getAge + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Breed: </span>" + getBreedName + "</p>"
                                        + "</div>"
                                        + "</div>"
                                        + "</a>"
                                        + "</div>");
                                })
                            })


                        })


                    })



                })


            })
        } else {
            // reload the page to load all pets 
            location.reload();

        }
    })
})



// // For displaying the pets based from breed_category 
$(document).ready(function () {
    $("#breed").change(function () {
        var bc = $("#breed").val();

        if (bc !== "none") {

            $.ajax({

                url: 'pet_list_filter.php',
                method: 'post',
                data: 'bc=' + bc

            }).done(function (breeds) {

                breeds = JSON.parse(breeds);
                console.log(breeds);
                $('.black-border').remove();

                // change the list of pets
                breeds.forEach(function (value) {
                    var get1photo = "";

                    // get 1 photo from each pet
                    $.ajax({
                        url: 'pet_list_filter.php',
                        method: 'post',
                        data: 'petID=' + value.petID
                    }).done(function (photo) {
                        photo = JSON.parse(photo);
                        // display the pet card
                        photo.forEach(function (pho_value) {
                            get1photo = pho_value.photo;
                            // console.log(get1photo);
                            let getAge = new Date().getFullYear() - value.age;

                            $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                " <a href='pet_info.php?pet_id=" + value.petID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                " <div class='card' style='width: 18rem; '>" +
                                "<div class='d-flex justify-content-center ipa-grey'>" +
                                "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                + "</div>" +

                                "<div class='card-body white-box'>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.name + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span>" + value.sex + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span>" + getAge + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Breed: </span>" + bc + "</p>"
                                + "</div>"
                                + "</div>"
                                + "</a>"
                                + "</div>");

                        })
                    })
                })
            })
        } else {
            // get all breeds of pets of the same category
            // get the pet_category
            var pc = $("#pet_category").val();

            $.ajax({

                url: 'pet_list_filter.php',
                method: 'post',
                data: 'pc=' + pc

            }).done(function (pets) {
                // reload the document when All Pets is selected
                pets = JSON.parse(pets);


                $('.black-border').remove();


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



                        // display the pet card
                        photo.forEach(function (pho_value) {
                            var getBreedName = "";
                            // get breed name
                            $.ajax({
                                url: 'pet_list_filter.php',
                                method: 'post',
                                data: 'breedName=' + value.bcID
                            }).done(function (breedName) {
                                breedName = JSON.parse(breedName);

                                breedName.forEach(function (breedName) {
                                    getBreedName = breedName.breed;
                                    get1photo = pho_value.photo;
                                    // console.log(get1photo);
                                    let getAge = new Date().getFullYear() - value.age;

                                    $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                        " <a href='pet_info.php?pet_id=" + value.petID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                        " <div class='card' style='width: 18rem; '>" +
                                        "<div class='d-flex justify-content-center ipa-grey'>" +
                                        "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                        + "</div>" +

                                        "<div class='card-body white-box'>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.name + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span>" + value.sex + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span>" + getAge + "</p>" +
                                        " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Breed: </span>" + getBreedName + "</p>"
                                        + "</div>"
                                        + "</div>"
                                        + "</a>"
                                        + "</div>");
                                })
                            })


                        })


                    })



                })

            })
        }
    })

})


// LIVE SEARCH OF PET NAMES
$(document).ready(function () {
    $("#type-search").keyup(function () {
        // alert("Type Search");
        // get breed name
        var search = $("#type-search").val();
        // console.log(search);

        $.ajax({
            url: 'pet_list_filter.php',
            method: 'post',
            data: 'search=' + search
        }).done(function (search) {
            search = JSON.parse(search);
            console.log(search);
            $('.black-border').remove();

            // change the list of pets
            search.forEach(function (value) {
                var get1photo = "";

                // get 1 photo from each pet
                $.ajax({
                    url: 'pet_list_filter.php',
                    method: 'post',
                    data: 'petID=' + value.petID
                }).done(function (photo) {
                    photo = JSON.parse(photo);

                    // display the pet card
                    photo.forEach(function (pho_value) {
                        var getBreedName = "";
                        // get breed name
                        $.ajax({
                            url: 'pet_list_filter.php',
                            method: 'post',
                            data: 'breedName=' + value.bcID
                        }).done(function (breedName) {
                            breedName = JSON.parse(breedName);

                            breedName.forEach(function (breedName) {
                                getBreedName = breedName.breed;
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='pet_info.php?pet_id=" + value.petID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Gender: </span>" + value.sex + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Age: </span>" + getAge + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Breed: </span>" + getBreedName + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");
                            })
                        })
                    })

                })

            })
        })

    })
})