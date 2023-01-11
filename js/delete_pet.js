$(document).ready(function () {
    $("#delete_pet_img").click(function () {

        

        if (confirm("Are you sure you want to delete this record?")) {
            var petID = $("#getPetID").text();
            alert(petID);
            // Ajax config
            $.ajax({
                type: "GET", //we are using GET method to get data from server side
                url: 'delete.php', // get the route value
                data: { petID: petID }, //set data
                beforeSend: function () {//We add this before send to disable the button once we submit it so that we prevent the multiple click

                },
                success: function (response) {//once the request successfully process to the server side it will return result here
                    // Reload lists of employees
                    all();

                    alert(response)
                }
            });
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