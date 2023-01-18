// if the users category is selected
$(document).ready(function () {
    $(".categories").change(function () {
        var encat = $('.entity_category').val();
        if (encat === "user") {
            filterUser();
        }

        if (encat == "none") {
            clearAll();
        }
    })
})


// remove all filters and display nothing
function clearAll() {
    $(".user_category").css("display", "none");
    $(".municipality").css("display", "none");
    $(".middle-search").css("display", "none");
}


// filter the user
function filterUser() {
    $(".middle-search").css("display", "block");
    $(".user_category").css("display", "block");
    $(".municipality").css("display", "block");
    let user_cat = $(".user_category");
    let muni = $(".municipality");

    if (muni.val() != "all_muni") {
        // $.ajax({
        //     url: '',
        //     method: 'post',
        //     data: {user_cat: user_cat}
        // }).done(function (user_cat_res) {
        // })
    }
}