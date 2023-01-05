// sign up form and parent background div
const signin = document.getElementById("link-signin");
// const blurry = document.getElementById("blur-sapin");

// const form = document.getElementById('form_signup');
const fname = document.getElementById('reg-firstname');
const lname = document.getElementById('reg-lastname');
const email = document.getElementById('reg-email');
const username = document.getElementById('reg-username');
const password = document.getElementById('reg-password');
const conf_password = document.getElementById('reg-conf-password');
const valid_id = document.getElementById('reg-id');
const municipality = document.getElementById('municipality');

// divs for error messages
let name_err = document.getElementById('name_err');
let email_err = document.getElementById('email_err');
let username_err = document.getElementById('username_err');
let password_err = document.getElementById('password_err');
let conf_password_err = document.getElementById('conf_password_err');
let validid_err = document.getElementById('validid_err');
let municipality_err = document.getElementById('municipality_err');

const btn_signup = document.getElementById('btn_signup');



// this will be used to change the attribute value of sign up button to submit
let check_validations = 0;

// make border green
// fname.addEventListener("focusout", (e)=>{
//     fname.style.borderColor = "green";
// });

// when sign up button is clicked
btn_signup.addEventListener('click', (e) => {
    // call all validation functions
    checkName();
    checkEmail();
    checkUsername();
    checkPassword();
    checkValidId();
    checkMunicipality();
    // btn_signup.setAttribute("type", "submit");
})
// when sign in link is clicked
signin.addEventListener('click', (e) => {
    remove_red_on_close();
})

// when blur-sapin is clicked
/** 
 * somehow this works even if blurry is not initialized to blur-sapin element above and if it gets initialized, 
 * the sign up button wont work otherwise which is kind of counter-intuitive
*/
blurry.addEventListener('click', (e) => {
    remove_red_on_close();
})


function checkName() {
    let fname_val = fname.value.trim();
    let lname_val = lname.value.trim();

    // check for blank inputs
    if (fname_val === '' || lname_val === '') {

        if (fname_val === '' && lname_val !== '') {
            fname.style.borderColor = "red";
            lname.style.borderColor = "black";
            name_err.innerHTML = "Please fill this input.";
        }
        if (lname_val === '' && fname_val !== '') {
            lname.style.borderColor = "red";
            fname.style.borderColor = "black";
            name_err.innerHTML = "Please fill this input.";
        }
        if (lname_val === '' && fname_val === '') {
            lname.style.borderColor = "red";
            fname.style.borderColor = "red";
            name_err.innerHTML = "Please fill this input.";
        }

    } else if (fname_val !== '' || lname_val !== '') {
        if (fname_val !== '' && lname_val === '')
            fname.style.borderColor = "black";

        if (lname_val !== '' && fname_val === '')
            lname.style.borderColor = "black";

        if (lname_val !== '' && fname_val !== '') {
            fname.style.borderColor = "black";
            lname.style.borderColor = "black";
            name_err.innerHTML = "";
        }
    }


}

function checkEmail() {
    let email_val = email.value.trim();

    // check if email is blank
    if (email_val === '') {
        email.style.borderColor = "red";
        email_err.innerHTML = "Please fill this input.";
    } else if (!isEmail(email_val)) {
        email.style.borderColor = "red";
        email_err.innerHTML = "Invalid email.";
    } else {
        email.style.borderColor = "black";
        email_err.innerHTML = "";
    }

}
// test for accepted characters in an email
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function checkUsername() {
    let username_val = username.value.trim();

    // check if username is blank
    if (username_val === '') {
        username.style.borderColor = "red";
        username_err.innerHTML = "Please fill this input.";
    } else {
        username.style.borderColor = "black";
        username_err.innerHTML = "";
    }
}

function checkPassword() {
    let password_val = password.value.trim();

    // check if password is blank
    if (password_val === '') {
        password.style.borderColor = "red";
        password_err.innerHTML = "Please fill this input.";
        checkConfirmPassword(password_val);
    } else if (password_val.length < 8) {
        //check if no. of characters is > 8
        password.style.borderColor = "red";
        password_err.innerHTML = "Minimum of 8 characters.";
        checkConfirmPassword(password_val);
    } else {
        password.style.borderColor = "black";
        password_err.innerHTML = "";
        checkConfirmPassword(password_val);
    }
}

function checkConfirmPassword(password_val) {
    let conf_password_val = conf_password.value.trim();

    // check if conf password is blank
    if (conf_password_val === '') {
        conf_password.style.borderColor = "red";
        conf_password_err.innerHTML = "Please fill this input.";
    } else if (conf_password_val.length < 8) {
        //check if no. of characters is > 8
        conf_password.style.borderColor = "red";
        conf_password_err.innerHTML = "Minimum of 8 characters.";
    } else {
        conf_password.style.borderColor = "black";
        conf_password_err.innerHTML = "";
        equalPassword(password_val, conf_password_val);
    }
}

function equalPassword(password_val, conf_password_val) {
    if (password_val !== conf_password_val) {
        password.style.borderColor = "red";
        conf_password.style.borderColor = "red";
        password_err.innerHTML = conf_password_err.innerHTML = "Password do not match."

    }
}

function checkValidId() {
    let validid_val = valid_id.value;

    // check if username is blank
    if (validid_val === '') {
        valid_id.style.borderColor = "red";
        validid_err.innerHTML = "Please Upload an image file.";
    } else {
        valid_id.style.borderColor = "black";
        validid_err.innerHTML = "";
    }
}

function checkMunicipality() {
    let municipality_val = municipality.value;

    if (municipality_val == 'none') {
        municipality_err.innerHTML = "Select Municipality";
        municipality.style.border = "2px";
        municipality.style.borderStyle = "solid";
        municipality.style.borderColor = "red";
    } else {

        municipality_err.innerHTML = "";
    }
}

function remove_red_on_close() {
    // reset the values of textboxes to ""
    fname.value = "";
    lname.value = "";
    email.value = "";
    username.value = "";
    password.value = "";
    conf_password.value = "";
    valid_id.value = "";
    municipality.value = "none";
    // set div for errors to "" after sign up close
    name_err.innerHTML = "";
    email_err.innerHTML = "";
    username_err.innerHTML = "";
    password_err.innerHTML = "";
    conf_password_err.innerHTML = "";
    validid_err.innerHTML = "";
    municipality_err.innerHTML = "";
    // set borders to black after sign up close
    fname.style.borderColor = "black";
    lname.style.borderColor = "black";
    email.style.borderColor = "black";
    username.style.borderColor = "black";
    password.style.borderColor = "black";
    conf_password.style.borderColor = "black";
    valid_id.style.borderColor = "black";
    municipality.style.border = "none";
}


