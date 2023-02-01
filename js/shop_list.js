// For displaying the pets based from the pet_category selected
$(document).ready(function () {
    $("#pet_category").change(function () {
        let pc = $("#pet_category").val();

        // console.log(pc);

        if (pc === "none") {
            location.reload();

        } else {
            $.ajax({

                url: 'shop_list_filter.php',
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
                        url: 'shop_list_filter.php',
                        method: 'post',
                        data: 'petID=' + value.shopID
                    }).done(function (photo) {
                        photo = JSON.parse(photo);
                        console.log(value.shopID);

                        // display the pet card
                        photo.forEach(function (pho_value) {
                            get1photo = pho_value.photo;


                            $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                " <a href='shop_info.php?shop_id=" + value.shopID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                " <div class='card' style='width: 18rem; '>" +
                                "<div class='d-flex justify-content-center ipa-grey'>" +
                                "<img src='../images/shop_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                + "</div>" +

                                "<div class='card-body white-box'>" +
                                " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.shop_name + "</p>" +
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


// LIVE SEARCH OF SHOPS
$(document).ready(function () {

    $("#type-search").keyup(function () {
        // reset the dropdowns to all's when live searching
        $('#pet_category').val('none');

        let search = $("#type-search").val();

        $.ajax({
            url: 'shop_list_filter.php',
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
                    url: 'shop_list_filter.php',
                    method: 'post',
                    data: 'petID=' + value.shopID
                }).done(function (photo) {
                    photo = JSON.parse(photo);
                    console.log(photo);
                    // display the pet card
                    photo.forEach(function (pho_value) {

                        get1photo = pho_value.photo;

                        $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                            " <a href='shop_info.php?shop_id=" + value.shopID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                            " <div class='card' style='width: 18rem; '>" +
                            "<div class='d-flex justify-content-center ipa-grey'>" +
                            "<img src='../images/shop_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                            + "</div>" +

                            "<div class='card-body white-box'>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.shop_name + "</p>" +
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