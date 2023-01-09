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
                $('#breed').append('<option>' + breed.breed + '</option>')
            })
        })
    })
})