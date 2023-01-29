// import statements
// import statement for the pet report
import * as pet_report from "./admin_reports_pets.js";


// if the users category is selected
$(document).ready(function () {

    // check if the dropdown menus' value changed
    $(".categories").change(function () {
        var encat = $('.entity_category').val();

        switch (encat) {
            case "user":
                filterUser();
                break;
            case "pet":
                pet_report.filterPets();
                break
            default:
                clearAll();
        }
    })

    //  check if the search bar has input
    $(".type-search").keyup(function () {
        var encat = $('.entity_category').val();
        switch (encat) {
            case "user":
                searchUser();
                break;
        }
    })
})



// remove all filters and display nothing
 export function clearAll() {
    //users
    $(".user_category").css("display", "none");
    $(".municipality").css("display", "none");
    $(".middle-search").css("display", "none");
    $('.each_user_categ').css("display", "none");
    //pets
    $(".pet_menu").css("display", "none");
    $(".pet_type").css("display", "none");
    $(".breed").css("display", "none");
    $(".birthyear").css("display", "none");
    $(".sex").css("display", "none");
    $(".vaccinated").css("display", "none");
    //clear the column headers
    clearTitles();
}

// clear up all column titles so that only one corresponding col title will display
export function clearTitles() {
    // column titles
    $(".col_users").css("display", "none");
    $(".not_owned").css("display", "none");
    $(".unver_ver").css("display", "none");
    // num of resulting rows
    $(".count").css("display", "none");
}
// export all to generate a namespace import because it is cooler
export * from "./admin_dashboard.js";

// filter the user
function filterUser() {
    // clear the sub menu dropdowns first to make sure that at any event, only the submenus of the user report will appear
    clearAll();

    $(".middle-search").css("display", "block");
    $(".user_category").css("display", "block");
    $(".municipality").css("display", "block");

    let muni = $(".municipality").val();
    let um = $('.user_menu').val();

    // check if the municipality dropdown menu is selected as all municipalities
    if (muni == "all_muni") {

        // check if the users category is pets owned
        if (um === "pets_owned") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".col_users").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { pets_owned: um }
            }).done(function (pets_owned) {

                pets_owned = JSON.parse(pets_owned);

                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                pets_owned.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_user_categ'>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.pets_owned + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })

        }

        // check if the users category is not owned
        if (um === "not_owned") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".not_owned").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { not_owned: um }
            }).done(function (not_owned) {

                not_owned = JSON.parse(not_owned);

                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                not_owned.forEach(function (result) {
                    console.log(result);


                    $('.grid-container').append(
                        // the each_not_owned class was created to match the number of appropriate columns
                        "<div class='each_not_owned each_user_categ '>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })

        }

        // check if the users category is unverified
        if (um === "unverified") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".unver_ver").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { unverified: um }
            }).done(function (unverified) {
                unverified = JSON.parse(unverified);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                unverified.forEach(function (result) {
                    console.log(result);


                    $('.grid-container').append(
                        // each_not_owned class is also used here because they have the same amout of column
                        "<div class='each_not_owned each_user_categ '>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +

                        "</div>"
                    );
                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }


        // check if the users category is verified
        if (um === "verified") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".unver_ver").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { verified: um }
            }).done(function (verified) {
                verified = JSON.parse(verified);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                verified.forEach(function (result) {
                    console.log(result);


                    $('.grid-container').append(
                        // each_not_owned class is also used here because they have the same amout of column
                        "<div class='each_not_owned each_user_categ '>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +

                        "</div>"
                    );
                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }


        // if the municipality is specific
    } else {
        // if user category is pets owned
        if (um === "pets_owned") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".col_users").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { pets_owned_muni: muni }
            }).done(function (pets_owned_muni) {
                pets_owned_muni = JSON.parse(pets_owned_muni);

                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                pets_owned_muni.forEach(function (result) {
                    console.log(result);
                    $('.grid-container').append(
                        "<div class='each_user_categ'>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.pets_owned + "</div>" +
                        "</div>"
                    );

                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }


        // if user category is not owned
        if (um === "not_owned") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".not_owned").css("display", "grid");
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { not_owned_muni: muni }
            }).done(function (not_owned_muni) {
                not_owned_muni = JSON.parse(not_owned_muni);

                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                not_owned_muni.forEach(function (result) {
                    console.log(result);
                    $('.grid-container').append(
                        "<div class='each_not_owned each_user_categ'>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;

                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }

        // check if the users category is unverified
        if (um === "unverified") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".unver_ver").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { unverified_muni: muni }
            }).done(function (unverified) {
                unverified = JSON.parse(unverified);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                unverified.forEach(function (result) {
                    console.log(result);


                    $('.grid-container').append(
                        // each_not_owned class is also used here because they have the same amout of column
                        "<div class='each_not_owned each_user_categ '>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +

                        "</div>"
                    );
                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }



        // check if the users category is verified
        if (um === "verified") {
            // display the column titles, but first, clear the all column titles
            clearTitles();
            $(".unver_ver").css("display", "grid");

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { verified_muni: muni }
            }).done(function (verified) {
                verified = JSON.parse(verified);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                verified.forEach(function (result) {
                    console.log(result);


                    $('.grid-container').append(
                        // each_not_owned class is also used here because they have the same amout of column
                        "<div class='each_not_owned each_user_categ '>" +
                        "<div>" + result.userID + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +

                        "</div>"
                    );
                    count++;
                })
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }
    }
}

function searchUser() {
    let um = $('.user_menu').val();
    let ts = $('.type-search').val();
    // reset the value of municipality to all municipalities when live searching
    $(".municipality").val('all_muni');

    if (um === "pets_owned") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { pets_owned_LS: ts }
        }).done(function (pets_owned) {

            pets_owned = JSON.parse(pets_owned);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            pets_owned.forEach(function (result) {
                console.log(result);


                $('.grid-container').append(
                    "<div class='each_user_categ'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.pets_owned + "</div>" +
                    "</div>"
                );

            })
        })
    }


    if (um === "not_owned") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { not_owned_LS: ts }
        }).done(function (not_owned) {

            not_owned = JSON.parse(not_owned);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            not_owned.forEach(function (result) {
                console.log(result);


                $('.grid-container').append(
                    "<div class='each_not_owned each_user_categ'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );

            })
        })
    }


    if (um === "unverified") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { unverified_LS: ts }
        }).done(function (unverified) {

            unverified = JSON.parse(unverified);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            unverified.forEach(function (result) {
                console.log(result);


                $('.grid-container').append(
                    "<div class='each_not_owned each_user_categ'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );

            })
        })
    }




    if (um === "verified") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { verified_LS: ts }
        }).done(function (verified) {

            verified = JSON.parse(verified);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            verified.forEach(function (result) {
                console.log(result);


                $('.grid-container').append(
                    "<div class='each_not_owned each_user_categ'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );

            })
        })
    }
}