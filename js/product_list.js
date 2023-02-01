// For displaying the pets based from the pet_category selected
$(document).ready(function () {
    $("#pet_category").change(function () {
        let pc = $("#pet_category").val();
        let bc = $("#breed").val();


        if (pc !== "none") {
            if (bc === "none") {
                // alert(pc);
                $.ajax({
                    url: "product_list_filter.php",
                    method: "post",
                    data: "pc=" + pc
                }).done(function (pets) {
                    pets = JSON.parse(pets);

                    // remove the cards
                    $('.black-border').remove();
                    // console.log(pets);


                    // change the list of pets
                    pets.forEach(function (value) {
                        var get1photo = "";


                        // get 1 photo from each pet
                        $.ajax({
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);



                            // display the pet card
                            photo.forEach(function (pho_value) {

                                get1photo = pho_value.photo;


                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: ₱ </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");



                            })


                        })



                    })


                })
                // if both pc and sn are specific
            } else {
                // console.log('both specific_top');
                $.ajax({

                    url: 'product_list_filter.php',
                    method: 'post',
                    data: {
                        sp: bc,
                        pcs: pc
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
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);
                            // display the pet card
                            photo.forEach(function (pho_value) {
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                // let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");

                            })
                        })
                    })
                })
            }
            // IF PET_CATEGORY IS ALL PETS
        } else {
            // IF BOTH SHOP AND PC ARE ALL 
            if (bc === "none") {
                // reload the page to load all pets 
                location.reload();

                // IF PC IS ALL BUT SHOP NAME IS SPECIFIC
            } else {

                $.ajax({

                    url: 'product_list_filter.php',
                    method: 'post',
                    data: 'bc=' + bc

                }).done(function (breeds) {

                    breeds = JSON.parse(breeds);
                    // console.log(breeds);
                    $('.black-border').remove();

                    // change the list of pets
                    breeds.forEach(function (value) {
                        var get1photo = "";

                        // get 1 photo from each pet
                        $.ajax({
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);
                            // display the pet card
                            photo.forEach(function (pho_value) {
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                // let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");

                            })
                        })
                    })
                })
            }
        }
    })
})




// // For displaying the RESUlt with a specified shop name
$(document).ready(function () {
    $("#breed").change(function () {
        let pc = $("#pet_category").val();
        let bc = $("#breed").val();
        // console.log(bc);
        // IF  SHOP IS SPECIFIC AND PC IS ALL
        if (bc !== "none") {
            if (pc === "none") {
                $.ajax({

                    url: 'product_list_filter.php',
                    method: 'post',
                    data: 'bc=' + bc

                }).done(function (breeds) {

                    breeds = JSON.parse(breeds);
                    // console.log(breeds);
                    $('.black-border').remove();

                    // change the list of pets
                    breeds.forEach(function (value) {
                        var get1photo = "";

                        // get 1 photo from each pet
                        $.ajax({
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);
                            // display the pet card
                            photo.forEach(function (pho_value) {
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                // let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");

                            })
                        })
                    })
                })
                // IF PC AND SHOP are both SPECIFIC
            } else {
                // console.log('both specific_bottom')
                $.ajax({

                    url: 'product_list_filter.php',
                    method: 'post',
                    data: {
                        sp: bc,
                        pcs: pc
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
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);
                            // display the pet card
                            photo.forEach(function (pho_value) {
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                // let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");

                            })
                        })
                    })
                })
            }


            //  IF SHOP IS ALL  
        } else {

            // IF BOTH SHOP AND PC ARE ALL 
            if (pc === "none") {
                // reload the page to load all pets 
                location.reload();

                // IF PC IS ALL BUT SHOP NAME IS SPECIFIC
            } else {
                $.ajax({

                    url: 'product_list_filter.php',
                    method: 'post',
                    data: 'bc=' + bc

                }).done(function (breeds) {

                    breeds = JSON.parse(breeds);
                    // console.log(breeds);
                    $('.black-border').remove();

                    // change the list of pets
                    breeds.forEach(function (value) {
                        var get1photo = "";

                        // get 1 photo from each pet
                        $.ajax({
                            url: 'product_list_filter.php',
                            method: 'post',
                            data: 'petID=' + value.prodID
                        }).done(function (photo) {
                            photo = JSON.parse(photo);
                            // display the pet card
                            photo.forEach(function (pho_value) {
                                get1photo = pho_value.photo;
                                // console.log(get1photo);
                                // let getAge = new Date().getFullYear() - value.age;

                                $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                                    " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                                    " <div class='card' style='width: 18rem; '>" +
                                    "<div class='d-flex justify-content-center ipa-grey'>" +
                                    "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                                    + "</div>" +

                                    "<div class='card-body white-box'>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                                    " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
                                    + "</div>"
                                    + "</div>"
                                    + "</a>"
                                    + "</div>");

                            })
                        })
                    })
                })
            }

        }
    })

})




// LIVE SEARCH OF PRODUCTS
$(document).ready(function () {

    $("#type-search").keyup(function () {
        // reset the dropdowns to all's when live searching
        $('#pet_category').val('none');
        $('#breed').val('none');

        let search = $("#type-search").val();

        $.ajax({
            url: 'product_list_filter.php',
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
                    url: 'product_list_filter.php',
                    method: 'post',
                    data: 'petID=' + value.prodID
                }).done(function (photo) {
                    photo = JSON.parse(photo);
                    console.log(photo);
                    // display the pet card
                    photo.forEach(function (pho_value) {

                        get1photo = pho_value.photo;

                        $('.row_of_col').append(" <div class='col-12 col-md-6 col-lg-3 d-flex justify-content-center black-border'>" +
                            " <a href='product_info.php?product_id=" + value.prodID + "' style='text-decoration: none; color:black;' class='col_a_tag'>" +
                            " <div class='card' style='width: 18rem; '>" +
                            "<div class='d-flex justify-content-center ipa-grey'>" +
                            "<img src='../images/pet_pics/" + get1photo + "' class='card-img-top img-fluid' alt='image'>"
                            + "</div>" +

                            "<div class='card-body white-box'>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Name: </span>" + value.prod_name + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Price: </span>" + value.price + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Shop Name: </span>" + value.shop_name + "</p>" +
                            " <p class='card-text' style='text-transform:capitalize;'><span style='font-weight: bold; '>Pet Type: </span>" + value.animal_type + "</p>"
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