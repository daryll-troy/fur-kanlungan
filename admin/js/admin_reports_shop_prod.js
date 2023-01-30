// a namespace import  because a namespace import is cooler
import * as clearers from "./admin_dashboard.js";

export function filterShopProd() {
    clearers.clearAll();
    $(".pet_type").css("display", "block");
    $(".shop_name").css("display", "block");
    $(".middle-search").css("display", "block");

    $('.shop_prod_title').css('display', 'grid');


    let pt = $('.pet_type').val();
    let sn = $('.shop_name').val();

    if (sn === "all_shops") {
        //only display the municipality when all shops is selected
        $(".municipality").css("display", "block");
        let muni = $(".municipality").val();

        //  all municipalities are selected
        if (muni === "all_muni") {
            // all pet types
            if (pt === "all_pets") {

                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',
                    // just set the post variable, value does not matter because the query has no condition
                    data: { am_ap: pt }
                }).done(function (output) {
                    output = JSON.parse(output);

                    $('.each_user_categ').remove();
                    // used for the num of resulting rows
                    let count = 0;
                    output.forEach(function (result) {
                        $('.grid-container').append(
                            "<div class='each_shop_prod each_user_categ'>" +
                            "<div>" + result.prodID + "</div>" +
                            "<div>" + result.prod_name + "</div>" +
                            "<div>₱" + result.price + "</div>" +
                            "<div>" + result.shopID + "</div>" +
                            "<div>" + result.shop_name + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    $(".count").html("<h4>" + count + " Result(s)</h4>");
                })

                // specific pet type is selected
            } else {
                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',
                    // now, pt's value will used as a parameter in the query
                    data: { am_sp: pt }
                }).done(function (output) {
                    output = JSON.parse(output);

                    $('.each_user_categ').remove();
                    // used for the num of resulting rows
                    let count = 0;
                    output.forEach(function (result) {
                        $('.grid-container').append(
                            "<div class='each_shop_prod each_user_categ'>" +
                            "<div>" + result.prodID + "</div>" +
                            "<div>" + result.prod_name + "</div>" +
                            "<div>₱" + result.price + "</div>" +
                            "<div>" + result.shopID + "</div>" +
                            "<div>" + result.shop_name + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    $(".count").html("<h4>" + count + " Result(s)</h4>");
                })
            }
            // specific municipality is selected
        } else {

            //  all pet types with a specific municipality
            if (pt === "all_pets") {

                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',

                    data: {
                        sp_muni: muni
                    }
                }).done(function (output) {
                    output = JSON.parse(output);

                    $('.each_user_categ').remove();
                    // used for the num of resulting rows
                    let count = 0;
                    output.forEach(function (result) {
                        $('.grid-container').append(
                            "<div class='each_shop_prod each_user_categ'>" +
                            "<div>" + result.prodID + "</div>" +
                            "<div>" + result.prod_name + "</div>" +
                            "<div>₱" + result.price + "</div>" +
                            "<div>" + result.shopID + "</div>" +
                            "<div>" + result.shop_name + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    $(".count").html("<h4>" + count + " Result(s)</h4>");
                })

                // specific pet type and municipality are selected
            } else {
                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',

                    data: {
                        sm_sp: pt,
                        sp_muni2: muni
                    }
                }).done(function (output) {
                    output = JSON.parse(output);
                    // console.log(output);
                    $('.each_user_categ').remove();
                    // used for the num of resulting rows
                    let count = 0;
                    output.forEach(function (result) {
                        $('.grid-container').append(
                            "<div class='each_shop_prod each_user_categ'>" +
                            "<div>" + result.prodID + "</div>" +
                            "<div>" + result.prod_name + "</div>" +
                            "<div>₱" + result.price + "</div>" +
                            "<div>" + result.shopID + "</div>" +
                            "<div>" + result.shop_name + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    $(".count").html("<h4>" + count + " Result(s)</h4>");
                })
            }
        }
        // SPECIFIC SHOP NAME IS SELECTED
    } else {
        //hide the municipality dropdown
        // $(".municipality").css("display", "none");

        // all pet types
        if (pt === "all_pets") {

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    // pass the shop_name value
                    ss1: sn
                }
            }).done(function (output) {
                output = JSON.parse(output);

                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                output.forEach(function (result) {
                    $('.grid-container').append(
                        "<div class='each_shop_prod each_user_categ'>" +
                        "<div>" + result.prodID + "</div>" +
                        "<div>" + result.prod_name + "</div>" +
                        "<div>₱" + result.price + "</div>" +
                        "<div>" + result.shopID + "</div>" +
                        "<div>" + result.shop_name + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.animal_type + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                $(".count").html("<h4>" + count + " Result(s)</h4>");
            })

            // specific pet type is selected
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    // now, pt's value will used as a parameter in the query
                    sp_ss: pt,
                    // pass the shop_name value, again
                    ss2: sn
                }
            }).done(function (output) {
                output = JSON.parse(output);

                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                output.forEach(function (result) {
                    $('.grid-container').append(
                        "<div class='each_shop_prod each_user_categ'>" +
                        "<div>" + result.prodID + "</div>" +
                        "<div>" + result.prod_name + "</div>" +
                        "<div>₱" + result.price + "</div>" +
                        "<div>" + result.shopID + "</div>" +
                        "<div>" + result.shop_name + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.animal_type + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                $(".count").html("<h4>" + count + " Result(s)</h4>");
            })
        }

    }
}

export function searchShopProd() {

    // unhide the municipality
    $(".municipality").css("display", "block");
    // reset the values of dropdown menus
    $(".municipality").val('all_muni');
    $(".pet_type").val('all_pets');
    $(".shop_name").val('all_shops');
    // get the search input value
    let ts = $('.type-search').val();

    $.ajax({
        url: 'admin_filter_categ.php',
        method: 'post',
        data: { shop_prod_LS: ts }
    }).done(function (output) {
        output = JSON.parse(output);

        $('.each_user_categ').remove();
        // used for the num of resulting rows
        let count = 0;
        output.forEach(function (result) {
            $('.grid-container').append(
                "<div class='each_shop_prod each_user_categ'>" +
                "<div>" + result.prodID + "</div>" +
                "<div>" + result.prod_name + "</div>" +
                "<div>₱" + result.price + "</div>" +
                "<div>" + result.shopID + "</div>" +
                "<div>" + result.shop_name + "</div>" +
                "<div>" + result.muni_name + "</div>" +
                "<div>" + result.animal_type + "</div>" +
                "</div>"
            );
            count++;
        })
        $(".count").html("<h4>" + count + " Result(s)</h4>");
    })
}


// export all to create a namespace import because it is cooler
export * from "./admin_reports_shop_prod.js";