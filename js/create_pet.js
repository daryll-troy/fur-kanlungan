// For choosing the appropriate breeds based on the pet category
$(document).ready(function() {
    $("#pet_category").change(function() {
        var pc = $("#pet_category").val();
        // alert(pc);
        $.ajax({
            url: 'choose_breed.php',
            method: 'post',
            data: 'pc=' + pc
        }).done(function(breeds) {
            
            breeds = JSON.parse(breeds);
            console.log(breeds);
            $('#breed').empty();
            breeds.forEach(function(breed) {
                $('#breed').append('<option class = each_breed' + '>' + breed.breed + '</option>')
            })
        })
    })
})

