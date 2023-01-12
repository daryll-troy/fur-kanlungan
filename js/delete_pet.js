// NOTE REMINDER: THIS SCRIPT IS NOT USED BECAUSE THE INDEX IS ALWAYS 0 AND THE VALUE IS ALWAYS THE CONCATENATION OF ALL ID's

$(document).ready(function () {
    $(".list_my_pets").on('click', ".each_pet .delete_pets .delete_pet_img", function() {
       
        alert($('.delete_pet_img').index());
        if (confirm("Are you sure you want to delete this record?")) {
            let petID = $(".getPetID").text();
            alert(petID);


            // Ajax config

            // $.ajax({
            //     type: "POST", //we are using GET method to get data from server side
            //     url: 'delete_pet.php', // get the route value
            //     data: { petID: petID }, //set data
            //     beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click

            //     },
            //     success: function (response) {//once the request successfully process to the server side it will return result here
                   
            //         // alert(response);
            //         location.reload(true); 
            //     }
            // });
        }


        // alert(petID);
        // // alert(dp);
        // $.ajax({
        //     url: 'delete_pet.php',
        //     method: 'post',
        //     data: 'petID=' + petID
        // }).done(function () {
        //     alert('Deleted Successfully');

        // })
    });
});