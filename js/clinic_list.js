// For displaying the pets based from the pet_category selected
$(document).ready(function () {
    $("#pet_category").change(function () {
        let pc = $("#pet_category").val();
        $("#type-search").val("");
        // console.log(pc);

        if (pc === "none") {
            location.reload();

        } else {
            $.ajax({

                url: 'clinic_list_filter.php',
                method: 'post',
                data: {
                    pc: pc
                }

            }).done(function (breeds) {

                breeds = JSON.parse(breeds);
                // console.log(breeds);
                $('.black-border').remove();

                // change the list of pets
                breeds.forEach(function (value) {
                    var get1photo = "";

                    // get 1 photo from each pet
                    $.ajax({
                        url: 'clinic_list_filter.php',
                        method: 'post',
                        data: 'petID=' + value.clinicID
                    }).done(function (photo) {
                        photo = JSON.parse(photo);
                        // console.log(value.clinicID);

                        // display the pet card
                        photo.forEach(function (pho_value) {
                            get1photo = pho_value.photo;


                            $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                " <a href='clinic_info.php?clinic_id=" + value.clinicID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                " <div class='card' style='width: 18rem; '>" +
                                "<div class='d-flex justify-content-center ipa-grey'>" +
                                "<img src='../images/clinic_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                + "</div>" +

                                "<div class='card-body white-box'>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.clinic_name + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Municipality: </span>" + value.muni_name + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Email: </span>" + value.email + "</p>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Open: </span>" + value.open_hours + "</p>"
                                + "</div>"
                                + "</div>"
                                + "</a>"
                                + "</div>");

                        })
                    })
                })
            })
        }
    })

})


// LIVE SEARCH OF PRODUCTS
$(document).ready(function () {

    $("#type-search").keyup(function () {
        // reset the dropdowns to all's when live searching
        $('#pet_category').val('none');

        let search = $("#type-search").val();

        $.ajax({
            url: 'clinic_list_filter.php',
            method: 'post',
            data: 'search=' + search
        }).done(function (search) {
            search = JSON.parse(search);
            // console.log(search);
            $('.black-border').remove();

            // change the list of pets
            search.forEach(function (value) {
                var get1photo = "";

                // get 1 photo from each pet
                $.ajax({
                    url: 'clinic_list_filter.php',
                    method: 'post',
                    data: 'petID=' + value.clinicID
                }).done(function (photo) {
                    photo = JSON.parse(photo);
                    console.log(photo);
                    // display the pet card
                    photo.forEach(function (pho_value) {

                        get1photo = pho_value.photo;

                        $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                            " <a href='clinic_info.php?clinic_id=" + value.clinicID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                            " <div class='card' style='width: 18rem; '>" +
                            "<div class='d-flex justify-content-center ipa-grey'>" +
                            "<img src='../images/clinic_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                            + "</div>" +

                            "<div class='card-body white-box'>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.clinic_name + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Municipality: </span>" + value.muni_name + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Email: </span>" + value.email + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Open: </span>" + value.open_hours + "</p>"
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