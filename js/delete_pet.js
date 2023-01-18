// NOTE REMINDER: THIS SCRIPT IS NOT USED BECAUSE THE INDEX IS ALWAYS 0 AND THE VALUE IS ALWAYS THE CONCATENATION OF ALL ID's

$(document).ready(function () {
    $(".list_my_pets").on('click', ".each_pet .delete_pets .delete_pet_img", function() {
       
        alert($('.delete_pet_img').index());
        if (confirm("Are you sure you want to delete this record?")) {
            let petID = $(".getPetID").text();
            alert(petID);


        }


  
    });
});