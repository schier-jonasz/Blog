const submitButton = document.querySelector(".delete-comment__submit");
const formElement = document.querySelector(".delete-comment");

formElement.addEventListener('submit', (e) => {
    if (confirm("Jesteś pewien, że chcesz usunąć ten komentarz?")) {
        submitButton.submit();
    } else {
        e.preventDefault();
    }
});