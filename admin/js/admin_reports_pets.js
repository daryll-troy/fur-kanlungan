// a namespace import  because a namespace import is cooler
import * as clearers from "./admin_dashboard.js";

export function filterPets() {
    //  helloWorld();
    clearers.clearAll();
    $(".middle-search").css("display", "block");
    $(".municipality").css("display", "block");
    $(".pet_menu").css("display", "block");
    
    let muni = $(".municipality").val();
    let pm = $('.pet_menu').val();

    // check if the municipality dropdown menu is selected as all municipalities
    if (muni == "all_muni") {
        // check if the pet category is selected
        if (pm === "pet_type") {
            clearers.clearTitles();
            $(".pet_type").css("display", "block");
            $(".breed").css("display", "block");
            // store selected animal_type
            let pt =  $(".pet_type").val();
            
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
    }else{

    }


}



// function helloWorld() {
//     console.log('hello world');
// }

// export all to create a namespace import because it is cooler
export * from "./admin_reports_pets.js";