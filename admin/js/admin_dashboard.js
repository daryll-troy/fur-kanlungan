// if the users category is selected
$(document).ready(function () {

    // check if the dropdown menus' value changed
    $(".categories").change(function () {
        var encat = $('.entity_category').val();

        switch (encat) {
            case "user":
                filterUser();
                break;
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
function clearAll() {
    $(".user_category").css("display", "none");
    $(".municipality").css("display", "none");
    $(".middle-search").css("display", "none");
    $('.each_user_categ').css("display", "none");
    clearTitles();
}

// clear up all column titles so that only one corresponding col title will display
function clearTitles() {
    // column titles
    $(".col_users").css("display", "none");
    $(".not_owned").css("display", "none");

    // num of resulting rows
    $(".count").css("display", "none");
}

// filter the user
function filterUser() {
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
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { unverified: um }
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
    }
}

function searchUser() {
    let um = $('.user_menu').val();
    let ts = $('.type-search').val();
    // console.log(ts);
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
}