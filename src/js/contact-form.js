var form = document.getElementById("my-form");
    
    async function handleSubmit(event) {
      event.preventDefault();
      var status = document.querySelector(".status");
      var data = new FormData(event.target);
      fetch(event.target.action, {
        method: form.method,
        body: data,
        headers: {
            'Accept': 'application/json'
        }
      }).then(response => {
        status.classList.add('success');
        status.innerHTML = "Wielkie dzięki za wiadomość! :)";
        form.reset()
      }).catch(error => {
        status.classList.add('error');
        status.innerHTML = "Oops! Coś poszło nie tak..."
      });
    }
    form.addEventListener("submit", handleSubmit)