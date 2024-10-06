const form = document.querySelector(".registerForm form"),
  continueBtn = form.querySelector("#register"),
  errorText = form.querySelector(".error-text");


form.onsubmit = (e) => {
  e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "func/signup.php", true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          console.log(data);
          if (data === "success") {
           location.href = "login.php";
          }
          else {
            if (errorText.classList.contains('hidden')) {
              errorText.classList.remove('hidden');
            }
            
            errorText.textContent = data;
          }
        }
      }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};