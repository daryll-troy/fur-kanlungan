// if the users category is selected
$(document).ready(function () {
    $(".categories").change(function () {
        var encat = $('.entity_category').val();
        if (encat === "user") {
            filterUser();
        }

        if (encat == "none") {
            clearAll();
        }
    })
})


// remove all filters and display nothing
function clearAll() {
    $(".user_category").css("display", "none");
    $(".municipality").css("display", "none");
    $(".middle-search").css("display", "none");
    $(".col_users").css("display", "none");
    $('.each_user_categ').css("display", "none");
}


// filter the user
function filterUser() {
    $(".middle-search").css("display", "block");
    $(".user_category").css("display", "block");
    $(".municipality").css("display", "block");
    $(".col_users").css("display", "grid");
    // let user_categ = $(".user_category").val();
    let muni = $(".municipality").val();
    let um = $('.user_menu').val();

    // check if the municipality dropdown menu is selected as all municipalities
    if (muni == "all_muni") {
        // check if the users category is pets owned
        if (um === "pets_owned") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { pets_owned: um }
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

        // check if the users category is unverified
        if (um === "unverified") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { user_categ: user_categ }
            })
        }
    } else {
        // if user category is pets owned
        if (um === "pets_owned") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: { pets_owned_muni: muni }
            }).done(function (pets_owned_muni) {
                pets_owned_muni = JSON.parse(pets_owned_muni);

                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

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

                })

            })
        }
    }
}