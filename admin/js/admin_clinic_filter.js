$(document).ready(function () {

    $('.municipality').change(() => {

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
        data: { clinic_all_muni: "" },
        success: (output) => {
            output = JSON.parse(output);
            // console.log(output);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.clinicID + "</div>" +
                    "<div>" + result.clinic_name + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.owner+ "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.contact_no + "</div>" +
                    "<div>" + result.open_hours + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span class='material-symbols-outlined update_pet_img' id='delete_pet_img' onclick='goToUpdateClinic(" + result.clinicID + ")'>" +
                    "update </span>" +

                    " <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img' onclick='goToDeleteClinic(" + result.clinicID + ")'>" +
                    "delete </span>" +

                    " <span onclick='goToClinicPic(" + result.clinicID + ")'>" +
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
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " clinic(s) Created</div>");
        }
    })
}

function muniUser(muni) {
    $('.type-search').val("");

    $.ajax({
        url: "non_report_filter.php",
        method: "post",
        data: { clinic_muni: muni },
        success: (output) => {
            output = JSON.parse(output);
            // console.log(output);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.clinicID + "</div>" +
                    "<div>" + result.clinic_name + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.owner+ "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.contact_no + "</div>" +
                    "<div>" + result.open_hours + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span class='material-symbols-outlined update_pet_img' id='delete_pet_img' onclick='goToUpdateClinic(" + result.clinicID + ")'>" +
                    "update </span>" +

                    " <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img' onclick='goToDeleteClinic(" + result.clinicID + ")'>" +
                    "delete </span>" +

                    " <span onclick='goToClinicPic(" + result.clinicID + ")'>" +
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
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " clinic(s) Created</div>");
        }
    })
}



function searchUser(search) {
    $('.municipality').val("all_muni");

    $.ajax({
        url: "non_report_filter.php",
        method: "post",
        data: { clinic_LS: search },
        success: (output) => {
            output = JSON.parse(output);
            // console.log(output);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_clinic').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_clinic'>" +
                    "<div>" + result.clinicID + "</div>" +
                    "<div>" + result.clinic_name + "</div>" +
                    "<div>" + result.email + "</div>" +
                    "<div>" + result.owner+ "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "<div>" + result.contact_no + "</div>" +
                    "<div>" + result.open_hours + "</div>" +
                    "<div>" + result.date_time + "</div>" +
                    " <div class='btn_delete'>" +

                    " <span class='material-symbols-outlined update_pet_img' id='delete_pet_img' onclick='goToUpdateClinic(" + result.clinicID + ")'>" +
                    "update </span>" +

                    " <span class='material-symbols-outlined delete_pet_img' id='delete_pet_img' onclick='goToDeleteClinic(" + result.clinicID + ")'>" +
                    "delete </span>" +

                    " <span onclick='goToClinicPic(" + result.clinicID + ")'>" +
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
            $(".grid-container").before("<div class='count' style='font-weight: bolder; font-size: 1.5em; margin-top: 1em; color: aliceblue;'>" + count + " clinic(s) Created</div>");
        }
    })
}