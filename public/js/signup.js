const form = document.querySelector(".sign-up-form");
const emailInputField = form.querySelector(".input-field");
const emailInput = form.querySelector('input[name = "email"]');
const confirmPasswordInputField = form.querySelector("#rePasswordInput");
const passwordInput = form.querySelector('input[name = "password"]');
const confirmPasswordInput = form.querySelector('input[name = "re_password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, re_password) {
    return password === re_password;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

emailInput.addEventListener('keyup', function() {
    setTimeout(function() {
        markValidation(emailInputField, isEmail(emailInput.value));
    },
        1000
    )
});

confirmPasswordInput.addEventListener('keyup', function() {
    setTimeout(function() {
        const condition = arePasswordsSame(
            passwordInput.value,
            confirmPasswordInput.value
        );
        markValidation(confirmPasswordInputField, condition);
    },
        1000
    );
});