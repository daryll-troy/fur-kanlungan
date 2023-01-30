// a namespace import  because a namespace import is cooler
import * as clearers from "./admin_dashboard.js";

export function filterPets() {

    clearers.clearAll();
    $(".middle-search").css("display", "block");
    $(".municipality").css("display", "block");
    $(".pet_menu").css("display", "block");

    let muni = $(".municipality").val();
    let pm = $('.pet_menu').val();

    // detect if there is a change in pet type, then display the appropriate breeds as value of the select tag
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
            birthyear();
        }

        // check if sex is selected
        if (pm === "sex") {
            clearers.clearTitles();
            $(".sex").css("display", "block");
            sex();
        }

        // check if vaccinated is selected
        if (pm === "vaccinated") {
            clearers.clearTitles();
            $(".vaccinated").css("display", "block");
            vaccinated();
        }

        // check if owner is selected
        if (pm === "owner") {
            clearers.clearTitles();
            $(".owner").css("display", "block");
            owner();
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
            // let muni = $('.municipality').val();
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
            // call birthyear filter for pet
            birthyear();
        }

        // check if sex is selected
        if (pm === "sex") {
            clearers.clearTitles();
            $(".sex").css("display", "block");
            sex();
        }

        // check if vaccinated is selected
        if (pm === "vaccinated") {
            clearers.clearTitles();
            $(".vaccinated").css("display", "block");
            vaccinated();
        }

        // check if owner is selected
        if (pm === "owner") {
            clearers.clearTitles();
            $(".owner").css("display", "block");
            owner();
        }
    }


}



export function searchPet() {
    // reset the values of the sub categories dropdowns to all's
    $('.pet_type').val('all_pets');
    $('.breed').val('all_breeds');
    $('.birthyear').val('all_years');
    $('.sex').val('both');
    $('.vaccinated').val('both');
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
            // console.log(pet_type);
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

    if (pm === "birthyear") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { birthyear_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_birthyear each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.age + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }

    if (pm === "sex") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { sex_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_birthyear each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.sex + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }


    if (pm === "vaccinated") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { vaccinated_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_birthyear each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.vaccinated + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }


    if (pm === "owner") {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: { owner_LS: ts }
        }).done(function (output) {
            output = JSON.parse(output);

            $('.each_user_categ').remove();
            // used for the num of resulting rows
            let count = 0;
            output.forEach(function (result) {
                $('.grid-container').append(
                    "<div class='each_owner each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            $(".count").html("<h4>" + count + " Result(s)</h4>");
        })
    }
}


function birthyear() {
    // make birthyear col title visible
    $('.birthyear_title').css('display', 'grid');

    let muni = $(".municipality").val();
    let by = $('.birthyear').val();

    if (by === "all_years") {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    by_all_years: by
                }
            }).done(function (by_all_years) {
                by_all_years = JSON.parse(by_all_years);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                by_all_years.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.age + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            //if municipality is specified for all years
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    bay_muni: by,
                    muni_ay: muni
                }
            }).done(function (bay_muni) {
                bay_muni = JSON.parse(bay_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                bay_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.age + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }
        // WHEN YEAR IS SPECIFIED
    } else {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    by_a_year: by
                }
            }).done(function (by_a_year) {
                by_a_year = JSON.parse(by_a_year);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                by_a_year.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.age + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            // WHEN THE YEAR AND MUNICIPALITY IS SPECIFIED
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    bay_muni2: by,
                    muni_ay2: muni
                }
            }).done(function (bay_muni) {
                bay_muni = JSON.parse(bay_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                bay_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.age + "</div>" +
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
}

// filter the pet by sex
function sex() {
    // make sex col title visible
    $('.sex_title').css('display', 'grid');

    let muni = $(".municipality").val();
    let sex = $('.sex').val();

    if (sex === "both") {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    both_sex: sex
                }
            }).done(function (both_sex) {
                both_sex = JSON.parse(both_sex);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                both_sex.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        // each_birthyear class is used because they have the number of columns anyway
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.sex + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            //if municipality is specified for both sexes
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    both_sex_muni: sex,
                    muni_sex: muni
                }
            }).done(function (both_sex_muni) {
                both_sex_muni = JSON.parse(both_sex_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                both_sex_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.sex + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }
        // WHEN SEX IS SPECIFIED
    } else {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    per_sex: sex
                }
            }).done(function (per_sex) {
                per_sex = JSON.parse(per_sex);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                per_sex.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.sex + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            // WHEN THE SEX AND MUNICIPALITY IS SPECIFIED
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    per_sex_muni: sex,
                    muni_sex2: muni
                }
            }).done(function (per_sex_muni) {
                per_sex_muni = JSON.parse(per_sex_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                per_sex_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.sex + "</div>" +
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
}



// filter the pet by vaccine status
function vaccinated() {
    // make vaccinated col title visible
    $('.vaccinated_title').css('display', 'grid');

    let muni = $(".municipality").val();
    let vaccinated = $('.vaccinated').val();

    if (vaccinated === "both") {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    both_vaccinated: vaccinated
                }
            }).done(function (both_vaccinated) {
                both_vaccinated = JSON.parse(both_vaccinated);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                both_vaccinated.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        // each_birthyear class is used because they have the number of columns anyway
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.vaccinated + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            //if municipality is specified for both vaccine status
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    both_vaccinated_muni: vaccinated,
                    muni_vaccinated: muni
                }
            }).done(function (both_vaccinated_muni) {
                both_vaccinated_muni = JSON.parse(both_vaccinated_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                both_vaccinated_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.vaccinated + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
        }
        // WHEN vaccine status IS SPECIFIED
    } else {
        if (muni === "all_muni") {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    per_vaccinated: vaccinated
                }
            }).done(function (per_vaccinated) {
                per_vaccinated = JSON.parse(per_vaccinated);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                per_vaccinated.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.vaccinated + "</div>" +
                        "<div>" + result.muni_name + "</div>" +
                        "</div>"
                    );
                    count++;
                })
                // console.log(count);
                $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
            })
            // WHEN THE SEX AND MUNICIPALITY are SPECIFIED
        } else {
            $.ajax({
                url: 'admin_filter_categ.php',
                method: 'post',
                data: {
                    per_vaccinated_muni: vaccinated,
                    muni_vaccinated2: muni
                }
            }).done(function (per_vaccinated_muni) {
                per_vaccinated_muni = JSON.parse(per_vaccinated_muni);
                // remove the each_user_categ class if it exists already, to not duplicate the output table
                $('.each_user_categ').remove();

                // used for the num of resulting rows
                let count = 0;
                per_vaccinated_muni.forEach(function (result) {
                    // console.log(result);


                    $('.grid-container').append(
                        "<div class='each_birthyear each_user_categ'>" +
                        "<div>" + result.petID + "</div>" +
                        "<div>" + result.name + "</div>" +
                        "<div>" + result.vaccinated + "</div>" +
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
}


function owner() {
    // make vaccinated col title visible
    $('.owner_title').css('display', 'grid');

    let muni = $(".municipality").val();

    if (muni === 'all_muni') {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: {
                owner: "just set the this post variable"
            }
        }).done(function (owner) {
            owner = JSON.parse(owner);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            // used for the num of resulting rows
            let count = 0;
            owner.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_owner each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
                    "<div>" + result.muni_name + "</div>" +
                    "</div>"
                );
                count++;
            })
            // console.log(count);
            $(".grid-container").before("<div class='count' style='margin-left: 2em;'><h4>" + count + " Result(s)</h4> </div>");
        })


        //if muni is specified
    } else {
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: {
                muni_owner: muni
            }
        }).done(function (owner) {
            owner = JSON.parse(owner);
            // remove the each_user_categ class if it exists already, to not duplicate the output table
            $('.each_user_categ').remove();

            // used for the num of resulting rows
            let count = 0;
            owner.forEach(function (result) {
                // console.log(result);


                $('.grid-container').append(
                    "<div class='each_owner each_user_categ'>" +
                    "<div>" + result.petID + "</div>" +
                    "<div>" + result.name + "</div>" +
                    "<div>" + result.username + "</div>" +
                    "<div>" + result.fname + "</div>" +
                    "<div>" + result.lname + "</div>" +
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

// export all to create a namespace import because it is cooler
export * from "./admin_reports_pets.js";