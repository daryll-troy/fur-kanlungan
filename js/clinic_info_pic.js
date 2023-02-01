var getCurrentPic = "";

window.onload = function () {
    var firstPic = $("#pet_pic").val();

    $.ajax({
        url: 'get_all_clinicPhotos.php',
        method: 'post',
        data: 'firstPic=' + firstPic
    }).done(function (firstPic) {

        // set the first pic
        $("#pet_pic").attr("src", "../images/clinic_pics/" + firstPic);
        getCurrentPic = firstPic;
    })



}


// This will serve as the index of getCurrentPic for forward button
var currentIndexForward = 0;

function forward() {
    // console.log(getCurrentPic);
    var page = $("#pet_pic").val();

    $.ajax({
        url: 'get_all_clinicPhotos.php',
        method: 'post',
        data: 'page=' + page
    }).done(function (page) {

        page = JSON.parse(page);


        //    get the value of the object property 'photo'
        let arrPhotos = ""
        for (let x in page) {


            arrPhotos = page[x];

            // console.log("past: " + getCurrentPic);
            for (let cou = 0; cou < arrPhotos.length; cou++) {
                // console.log("current: " + arrPhotos[cou]);
                // console.log("cou: " + cou + " => currentIndexForward: " + currentIndexForward);


                if (getCurrentPic != arrPhotos[cou]) {
                    if (cou < currentIndexForward)
                        continue;

                    $("#pet_pic").attr("src", "../images/clinic_pics/" + arrPhotos[cou]);
                    getCurrentPic = arrPhotos[cou];

                    break;
                } else {
                    currentIndexForward++;
                    if (currentIndexForward == arrPhotos.length - 1)
                        currentIndexForward = 0;
                }
            }
        }

    })
}

// This will serve as the index of getCurrentPic for backward button
var currentIndexBackward = 0;

var page = $("#pet_pic").val();

$.ajax({
    url: 'get_all_clinicPhotos.php',
    method: 'post',
    data: 'page=' + page
}).done(function (page) {

    page = JSON.parse(page);
    for (let x in page) {
        currentIndexBackward = page[x].length - 1;

    }
});




function backward() {

    // console.log(getCurrentPic);
    var page = $("#pet_pic").val();

    $.ajax({
        url: 'get_all_clinicPhotos.php',
        method: 'post',
        data: 'page=' + page
    }).done(function (page) {

        page = JSON.parse(page);


        //    get the value of the object property 'photo'
        let arrPhotos = ""
        for (let x in page) {


            arrPhotos = page[x];

            // console.log(arrPhotos);
            // console.log("past: " + getCurrentPic);
            for (let cou = arrPhotos.length - 1; cou >= 0; cou--) {
                // console.log("current: " + arrPhotos[cou]);
                // console.log("cou: " + cou + " => currentIndexBackward: " + currentIndexBackward);


                if (getCurrentPic != arrPhotos[cou]) {
                    if (cou > currentIndexBackward)
                        continue;

                    $("#pet_pic").attr("src", "../images/clinic_pics/" + arrPhotos[cou]);
                    getCurrentPic = arrPhotos[cou];
                    break;
                } else {
                    currentIndexBackward--;
                    if (currentIndexBackward == 0)
                        currentIndexBackward = arrPhotos.length - 1;
                }
            }
        }

    })
}


