const form = document.querySelector(".message__text");
const button = document.querySelector(".message__button");

button.disabled = true;

form.addEventListener('input', (element) => {
    let value = element.target.value;
    if (value != "") {
        button.disabled = false;
    } else {
        button.disabled = true;
    }
})