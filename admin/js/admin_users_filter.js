$(document).ready(function () {

    $('.middle-search').change(() => {

        let muni = $('.municipality').val()

        if (muni != "all_muni")
            muniUser(muni);
        else
            allUser();



    })
    $(".type-search").keyup(function () {
        let search = $('.type-search').val()
        if (search != "") {
            searchUser(search);
        } else {
            allUser();
        }
    })

})

function allUser() {
    $('.type-search').val("");

    $.ajax({
        url: "non_report_filter.php",
        method: "post",
        data: { user_all_muni: "" },
        success: (output) => {
            output = JSON.parse(output);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.verified_id + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span onclick='goToClinicPic(" + result.userID + ")'>" +
                    "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>" +
                    "<path d='M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z' />" +
                    "</svg>" +
                    "</span>" +
                    "</div > " +
                    "</div>"
                );
                count++;
            })

            $('.count').remove();
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " Result(s)</div>");
        }
    })
}

function muniUser(muni) {
    $('.type-search').val("");

    $.ajax({
        url: "non_report_filter.php",
        method: "post",
        data: { user_muni: muni },
        success: (output) => {
            output = JSON.parse(output);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.verified_id + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span onclick='goToClinicPic(" + result.userID + ")'>" +
                    "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>" +
                    "<path d='M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z' />" +
                    "</svg>" +
                    "</span>" +
                    "</div > " +
                    "</div>"
                );
                count++;
            })

            $('.count').remove();
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " Result(s)</div>");
        }
    })
}

function searchUser(search) {
    $('.municipality').val("all_muni");

    $.ajax({
        url: "non_report_filter.php",
        method: "post",
        data: { user_LS: search },
        success: (output) => {
            output = JSON.parse(output);

            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.userID + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.verified_id + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span onclick='goToClinicPic(" + result.userID + ")'>" +
                    "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'>" +
                    "<path d='M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z' />" +
                    "</svg>" +
                    "</span>" +
                    "</div > " +
                    "</div>"
                );
                count++;
            })

            $('.count').remove();
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " Result(s)</div>");
        }
    })
}