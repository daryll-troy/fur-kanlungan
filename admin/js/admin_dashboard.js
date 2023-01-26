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
    $(".col_users").css("display", "none");
}


// filter the user
function filterUser() {
    $(".middle-search").css("display", "block");
    $(".user_category").css("display", "block");
    $(".municipality").css("display", "block");
    $(".col_users").css("display", "grid");
    let user_categ = $(".user_category").val();
    let muni = $(".municipality");

    if (muni.val() == "all_muni") {
        
        $.ajax({
            url: 'admin_filter_categ.php',
            method: 'post',
            data: "user_categ=" + user_categ
        }).done(function (user_cat_res) {
           
            user_cat_res = JSON.parse(user_cat_res);
            console.log(user_cat_res);
        })
    } else {

        // $.ajax({
        //     url: 'admin_filter_categ.php',
        //     method: 'post',
        //     data: {user_categ: user_categ}
        // }).done(function (user_cat_res) {
        //     user_cat_res = JSON.parse(user_cat_res);
        // })
    }
}