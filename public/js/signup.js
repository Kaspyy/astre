const form = document.querySelector(".sign-up-form"),
continueBtn = form.querySelector(".sign-up-form input[class='btn solid']");

form.onsubmit = (e) => {
    e.preventDefault(); //preventing from form submitting
}

continueBtn.onclick = () => {
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "src/controllers/SignUpController.php", true);
    xhr.onload = () => {

    }
    xhr.send();
}