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

// when sign up button is clicked
btn_signup.addEventListener('click', (e) => {
    // call all validation functions
    checkName();
    checkEmail();
    checkUsername();
    checkPassword();
    checkValidId();
    checkMunicipality();
    all_valid();


})

// change the btn_signup to type = "submit"
function all_valid() {
    let store_color = fname.style.borderColor;
    if (store_color == "lime") {
        store_color = lname.style.borderColor;
        if (store_color == "lime") {
            store_color = email.style.borderColor;
            if (store_color == "lime") {
                store_color = username.style.borderColor;
                if (store_color == "lime") {
                    store_color = password.style.borderColor;
                    if (store_color == "lime") {
                        store_color = conf_password.style.borderColor;
                        if (store_color == "lime") {
                            store_color = valid_id.style.borderColor;
                            if (store_color == "lime") {
                                store_color = municipality.style.borderColor;

                                setInterval(() => {
                                    btn_signup.setAttribute("type", "submit");
                                    btn_signup.value = "Sign Up";
                                }, 100);

                            }
                        }
                    }
                }
            }
        }
    }


    // if ( == lname.style.borderColor == email.style.borderColor == username.style.borderColor == password.style.borderColor == conf_password.style.borderColor == valid_id.style.borderColor == municipality.style.borderColor == "lime")
    //     btn_signup.setAttribute("type", "submit");
    // else{
    //     alert('something went wrong');
    // }
}
// when sign in link is clicked
signin.addEventListener('click', (e) => {
    remove_red_on_close();
})

/** when blur-sapin is clicked
 * somehow this works even if blurry is not initialized to blur-sapin element above and if it gets initialized, 
 * the sign up button wont work otherwise which is kind of -intuitive
*/
blurry.addEventListener('click', (e) => {
    remove_red_on_close();
})


function checkName() {
    let fname_val = fname.value.trim();
    let lname_val = lname.value.trim();
    let regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
    // check for blank inputs
    if (fname_val === '' || lname_val === '') {

        if (fname_val === '' && lname_val !== '') {
            fname.style.borderColor = "red";
            lname.style.borderColor = "lime";
            name_err.innerHTML = "Please fill this input";

        }
        if (lname_val === '' && fname_val !== '') {
            lname.style.borderColor = "red";
            fname.style.borderColor = "lime";
            name_err.innerHTML = "Please fill this input";

        }
        if (lname_val === '' && fname_val === '') {
            lname.style.borderColor = "red";
            fname.style.borderColor = "red";
            name_err.innerHTML = "Please fill this input";

        }

    } else if (fname_val !== '' || lname_val !== '') {
        if (fname_val !== '' && lname_val === '')
            fname.style.borderColor = "lime";

        if (lname_val !== '' && fname_val === '')
            lname.style.borderColor = "lime";

        if (lname_val !== '' && fname_val !== '') {
            // check if both name fields contain non-letter characters
            if (!isName(fname_val) || !isName(lname_val)) {
                fname.style.borderColor = "red";
                lname.style.borderColor = "red";
                name_err.innerHTML = "Name fields can only contain letters and white spaces";

            } else {
                fname.style.borderColor = "lime";
                lname.style.borderColor = "lime";
                name_err.innerHTML = "";
            }
        }
    } else {
        fname.style.borderColor = "lime";
        lname.style.borderColor = "lime";
        name_err.innerHTML = "";
    }

}
function isName(name) {
    // check if the name field contains only letters
    return /^[A-Za-z]*$/.test(name);
}

function checkEmail() {
    let email_val = email.value.trim();
    let lower_case_email = email_val.toLowerCase();

    // check if email is blank
    if (email_val === '') {
        email.style.borderColor = "red";
        email_err.innerHTML = "Please fill this input";

        // check if the string is a valid email structure
    } else if (!isEmail(email_val)) {

        email.style.borderColor = "red";
        email_err.innerHTML = "Invalid email.";

        // check if it contains gmail.com or yahoo.com
    } else if ((lower_case_email.match("@gmail.com") == '@gmail.com') || (lower_case_email.match("@yahoo.com") == '@yahoo.com')) {
        // check if there are still non-white characters after.com 
        let after_atsign = lower_case_email.search('@') + 1;
        let max_length = lower_case_email.length;
        let diff = max_length - after_atsign;
        if (diff === 9) {
            email.style.borderColor = "lime";
            email_err.innerHTML = "";
        } else {
            email.style.borderColor = "red";
            email_err.innerHTML = ".com is only accepted";

        }

    } else {
        // check if the domain is .com
        if ((lower_case_email.match("@gmail.") == '@gmail.') || (lower_case_email.match("@yahoo.") == '@yahoo.')) {
            email.style.borderColor = "red";
            email_err.innerHTML = ".com is only accepted";

        } else {
            email.style.borderColor = "red";
            email_err.innerHTML = "Gmail and Yahoo are only accepted";

        }
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
        username_err.innerHTML = "Please fill this input";
    } else if (onlyLettersAndNumbers(username_val)) {
        username.style.borderColor = "lime";
        username_err.innerHTML = "";
    }
    else {
        username.style.borderColor = "red";
        username_err.innerHTML = "Letters and Numbers are only allowed";
    }
}

// check username input for other characters besides letters and numbers
function onlyLettersAndNumbers(str) {
    return /^[A-Za-z0-9]*$/.test(str);
}

function checkPassword() {
    let password_val = password.value.trim();

    // check if password is blank
    if (password_val === '') {
        password.style.borderColor = "red";
        password_err.innerHTML = "Please fill this input";
        checkConfirmPassword(password_val);
    } else if (password_val.length < 8) {
        //check if no. of characters is > 8
        password.style.borderColor = "red";
        password_err.innerHTML = "Minimum of 8 characters";
        checkConfirmPassword(password_val);
    } else {
        password.style.borderColor = "lime";
        password_err.innerHTML = "";

        checkConfirmPassword(password_val);
    }
}

function checkConfirmPassword(password_val) {
    let conf_password_val = conf_password.value.trim();

    // check if conf password is blank
    if (conf_password_val === '') {
        conf_password.style.borderColor = "red";
        conf_password_err.innerHTML = "Please fill this input";
    } else if (conf_password_val.length < 8) {
        //check if no. of characters is > 8
        conf_password.style.borderColor = "red";
        conf_password_err.innerHTML = "Minimum of 8 characters";
    } else {

        equalPassword(password_val, conf_password_val);
    }
}

function equalPassword(password_val, conf_password_val) {
    if (password_val !== conf_password_val) {
        password.style.borderColor = "red";
        conf_password.style.borderColor = "red";
        password_err.innerHTML = conf_password_err.innerHTML = "Password do not match"

    } else {
        conf_password.style.borderColor = "lime";
        conf_password_err.innerHTML = "";
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


        municipality.style.border = "2px";
        municipality.style.borderStyle = "solid";
        municipality.style.borderColor = "lime";
        municipality_err.innerHTML = "";
    }
}

function checkValidId() {
    let validid_val = valid_id.value;

    // check if username is blank
    if (validid_val === '') {
        valid_id.style.borderColor = "red";
        validid_err.innerHTML = "Please Upload an image file";
    } else {
        // validate the file size
        if (valid_id.files[0].size > 2_000_000) {
            valid_id.value = "";
            valid_id.style.borderColor = "red";
            validid_err.innerHTML = "Image should not exceed 2MB";
        } else {

            valid_id.style.borderColor = "lime";
            validid_err.innerHTML = "";
        }
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
    municipality.style.border = "black";
}

