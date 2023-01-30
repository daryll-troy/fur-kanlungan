// a namespace import  because a namespace import is cooler
import * as clearers from "./admin_dashboard.js";

export function filterPets() {

    clearers.clearAll();
    $(".middle-search").css("display", "block");
    $(".municipality").css("display", "block");
    $(".pet_menu").css("display", "block");

    let muni = $(".municipality").val();
    let pm = $('.pet_menu').val();

    // detect if there is a change in pet type, then display the appropriate breeds
    $("#pet_type").change(function () {
        // store selected animal_type
        let pt = $(".pet_type").val();

        // display the appropriate breed for the selected animal_type
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { pet_type: pt }
        }).done(function (pet_type) {

            pet_type = JSON.parse(pet_type);
            $('.breed').empty();
            // display the all breeds option again, once
            $('.breed').append(
                "<option value='all_breeds' class='entity'> All Breeds </option>"
            );
            pet_type.forEach(function (result) {
                //    display each breed depending on the pet category
                $('.breed').append(
                    "<option value='" + result.breed + "' class='entity'>" + result.breed + "</option>"
                );
            })
        })
    })

    // check if the municipality dropdown menu is selected as all municipalities
    if (muni == "all_muni") {
        // check if the pet category is selected
        if (pm === "pet_type") {
            clearers.clearTitles();
            $(".pet_type").css("display", "block");
            $(".breed").css("display", "block");
            $(".pet_category").css("display", "grid");

            let pt = $(".pet_type").val();
            let breed = $(".breed").val();
            // check if animal_type is specified
            if (pt !== "all_pets") {
                // check if breed is not specified
                if (breed === "all_breeds") {
                    $.ajax({
                        url: 'admin_filter_categ.php',
                        method: 'post',
                        data: { pet_type_filter: pt }
                    }).done(function (pet_type_filter) {

                        pet_type_filter = JSON.parse(pet_type_filter);
                        // remove the each_user_categ class if it exists already, to not duplicate the output table
                        $('.each_user_categ').remove();

                        // used for the num of resulting rows
                        let count = 0;
                        pet_type_filter.forEach(function (result) {
                            // console.log(result);


                            $('.grid-container').append(
                                "<div class='each_not_owned each_user_categ'>" +
                                "<div>" + result.petID + "</div>" +
                                "<div>" + result.name + "</div>" +
                                "<div>" + result.animal_type + "</div>" +
                                "<div>" + result.breed + "</div>" +
                                "<div>" + result.muni_name + "</div>" +
                                "</div>"
                            );
                            count++;
                        })
                        // console.log(count);
                        $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                    })
                } else {
                    // if breed is specified
                    $.ajax({
                        url: 'admin_filter_categ.php',
                        method: 'post',
                        data: {
                            breed: breed
                        }
                    }).done(function (breed) {

                        breed = JSON.parse(breed);
                        // remove the each_user_categ class if it exists already, to not duplicate the output table
                        $('.each_user_categ').remove();

                        // used for the num of resulting rows
                        let count = 0;
                        breed.forEach(function (result) {
                            // console.log(result);


                            $('.grid-container').append(
                                "<div class='each_not_owned each_user_categ'>" +
                                "<div>" + result.petID + "</div>" +
                                "<div>" + result.name + "</div>" +
                                "<div>" + result.animal_type + "</div>" +
                                "<div>" + result.breed + "</div>" +
                                "<div>" + result.muni_name + "</div>" +
                                "</div>"
                            );
                            count++;
                        })
                        // console.log(count);
                        $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                    })
                }

                //check if the animal_type is set to all_pets
            } else {
                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',
                    data: { pet_type_filter_all: pt }
                }).done(function (pet_type_filter_all) {

                    pet_type_filter_all = JSON.parse(pet_type_filter_all);
                    // remove the each_user_categ class if it exists already, to not duplicate the output table
                    $('.each_user_categ').remove();

                    // used for the num of resulting rows
                    let count = 0;
                    pet_type_filter_all.forEach(function (result) {
                        // console.log(result);


                        $('.grid-container').append(
                            "<div class='each_not_owned each_user_categ'>" +
                            "<div>" + result.petID + "</div>" +
                            "<div>" + result.name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "<div>" + result.breed + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    // console.log(count);
                    $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                })
            }
        }

        // check if birthyear is selected
        if (pm === "birthyear") {
            clearers.clearTitles();
            $(".birthyear").css("display", "block");
        }

        // check if sex is selected
        if (pm === "sex") {
            clearers.clearTitles();
            $(".sex").css("display", "block");
        }

        // check if vaccinated is selected
        if (pm === "vaccinated") {
            clearers.clearTitles();
            $(".vaccinated").css("display", "block");
        }


        // if the municipality is specific
    } else {


        // check if the pet category is selected
        if (pm === "pet_type") {
            clearers.clearTitles();
            $(".pet_type").css("display", "block");
            $(".breed").css("display", "block");
            $(".pet_category").css("display", "grid");

            let pt = $(".pet_type").val();
            let breed = $(".breed").val();
            let muni = $('.municipality').val();
            // check if animal_type is specified
            if (pt !== "all_pets") {
                // check if breed is not specified
                if (breed === "all_breeds") {
                    $.ajax({
                        url: 'admin_filter_categ.php',
                        method: 'post',
                        data: {
                            pt_fm: pt,
                            muni: muni
                        }
                    }).done(function (output) {

                        output = JSON.parse(output);
                        // console.log(output);
                        // remove the each_user_categ class if it exists already, to not duplicate the output table
                        $('.each_user_categ').remove();

                        // used for the num of resulting rows
                        let count = 0;
                        output.forEach(function (result) {
                            // console.log(result);


                            $('.grid-container').append(
                                "<div class='each_not_owned each_user_categ'>" +
                                "<div>" + result.petID + "</div>" +
                                "<div>" + result.name + "</div>" +
                                "<div>" + result.animal_type + "</div>" +
                                "<div>" + result.breed + "</div>" +
                                "<div>" + result.muni_name + "</div>" +
                                "</div>"
                            );
                            count++;
                        })
                        // console.log(count);
                        $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                    })
                } else {
                    // if breed is specified
                    $.ajax({
                        url: 'admin_filter_categ.php',
                        method: 'post',
                        data: {
                            breed_muni: breed,
                            muni2: muni
                        }
                    }).done(function (breed) {

                        breed = JSON.parse(breed);
                        // remove the each_user_categ class if it exists already, to not duplicate the output table
                        $('.each_user_categ').remove();
                        // console.log(breed);
                        // used for the num of resulting rows
                        let count = 0;
                        breed.forEach(function (result) {
                            $('.grid-container').append(
                                "<div class='each_not_owned each_user_categ'>" +
                                "<div>" + result.petID + "</div>" +
                                "<div>" + result.name + "</div>" +
                                "<div>" + result.animal_type + "</div>" +
                                "<div>" + result.breed + "</div>" +
                                "<div>" + result.muni_name + "</div>" +
                                "</div>"
                            );
                            count++;
                        })
                        // console.log(count);
                        $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                    })
                }

                //check if the animal_type is set to all_pets
            } else {
                $.ajax({
                    url: 'admin_filter_categ.php',
                    method: 'post',
                    data: {
                        pt_fa: pt,
                        muni3: muni
                    }
                }).done(function (pet_type_filter_all) {

                    pet_type_filter_all = JSON.parse(pet_type_filter_all);
                    // remove the each_user_categ class if it exists already, to not duplicate the output table
                    $('.each_user_categ').remove();

                    // used for the num of resulting rows
                    let count = 0;
                    pet_type_filter_all.forEach(function (result) {
                        // console.log(result);


                        $('.grid-container').append(
                            "<div class='each_not_owned each_user_categ'>" +
                            "<div>" + result.petID + "</div>" +
                            "<div>" + result.name + "</div>" +
                            "<div>" + result.animal_type + "</div>" +
                            "<div>" + result.breed + "</div>" +
                            "<div>" + result.muni_name + "</div>" +
                            "</div>"
                        );
                        count++;
                    })
                    // console.log(count);
                    $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
                })
            }

        }

        // check if birthyear is selected
        if (pm === "birthyear") {
            clearers.clearTitles();
            $(".birthyear").css("display", "block");
        }

        // check if sex is selected
        if (pm === "sex") {
            clearers.clearTitles();
            $(".sex").css("display", "block");
        }

        // check if vaccinated is selected
        if (pm === "vaccinated") {
            clearers.clearTitles();
            $(".vaccinated").css("display", "block");
        }

    }


}


export function searchPetCategory() {
    // reset the values of the sub categories dropdowns to all's
    $('.pet_type').val('all_pets');
    $('.breed').val('all_breeds');
    $('.municipality').val('all_muni');

    let pm = $('.pet_menu').val();
    let ts = $('.type-search').val();

    if (pm === "pet_type") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { pet_type_LS: ts }
        }).done(function (pet_type) {

            pet_type = JSON.parse(pet_type);
            console.log(pet_type);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            pet_type.forEach(function (result) {



                $('.grid-container').append(
                    "<div class='each_not_owned each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.animal_type + "</div>" +
                    "<div>" + result.breed + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }
}


// export all to create a namespace import because it is cooler
export * from "./admin_reports_pets.js";