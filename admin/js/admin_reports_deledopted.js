// a namespace import  because a namespace import is cooler
import * as clearers from "./admin_dashboard.js";

export function filterDeledopted() {
    clearers.clearAll();
    $(".deledopted").css("display", "block");
    $(".middle-search").css("display", "block");

    // get the value of the deledopted sub menu dropdown
    let dele = $(".deledopted").val();
    // get muni_name
    let muni = $(".municipality").val();

    // if pet details is selected
    if (dele == "pet_details") {
        // clear titles
        clearers.clearTitles();
        // display the pet_details col title
        $(".pet_det_title").css("display", "grid");

        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            // just set the post variable, value does not matter because the query has no condition
            data: { pet_det: dele }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_pet_det each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.age + "</div>" +
                    "<div>" + result.sex + "</div>" +
                    "<div>" + result.vaccinated + "</div>" +
                    "<div>" + result.animal_type + "</div>" +
                    "<div>" + result.breed + "</div>" +
                    "</div>"
                );
                count++;
            })

            $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
        })
    }

    // if owner is selected
    if (dele == "owner") {
        // clear titles
        clearers.clearTitles();
        // display the pet_details col title
        $(".dele_owner_title").css("display", "grid");
        $(".municipality").css("display", "block");

        if (muni == "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                // just set the post variable, value does not matter because the query has no condition
                data: { dele_owner: dele }
            }).done(function (output) {
                output = JSON.parse(output);

                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                output.forEach(function (result) {
                    $('.grid-container').append(
                        "<div class='each_dele_owner each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.date_time + "</div>" +
                        "</div>"
                    );
                    count++;
                })

                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            //SPECIFIED MUNICIPALITY
        } else {

            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                // just set the post variable, value does not matter because the query has no condition
                data: { dele_owner_muni: muni }
            }).done(function (output) {
                output = JSON.parse(output);

                $('.each_user_categ').remove();
                // used for the num of resulting rows
                let count = 0;
                output.forEach(function (result) {
                    $('.grid-container').append(
                        "<div class='each_dele_owner each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.username + "</div>" +
                        "<div>" + result.fname + "</div>" +
                        "<div>" + result.lname + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "<div>" + result.date_time + "</div>" +
                        "</div>"
                    );
                    count++;
                })

                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }
    }
}

export function searchDeledopted() {
    // get the value of the deledopted sub menu dropdown
    let dele = $(".deledopted").val();
    // get the search input value
    let ts = $('.type-search').val();

    if (dele == "pet_details") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            // just set the post variable, value does not matter because the query has no condition
            data: { pet_det_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_pet_det each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.age + "</div>" +
                    "<div>" + result.sex + "</div>" +
                    "<div>" + result.vaccinated + "</div>" +
                    "<div>" + result.animal_type + "</div>" +
                    "<div>" + result.breed + "</div>" +
                    "</div>"
                );
                count++;
            })

            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }

    if (dele == "owner") {
        // reset to all_muni
        let muni = $(".municipality").val("all_muni");

        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            // just set the post variable, value does not matter because the query has no condition
            data: { dele_owner_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_dele_owner each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    "</div>"
                );
                count++;
            })

            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }
}

// export all to create a namespace import because it is cooler
export * from "./admin_reports_deledopted.js";