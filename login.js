const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// form validation

function clearErrors(){
  const errors = document.getElementsByClassName('formerror');
  for(let item of errors) {
      item.innerHTML = "";
  }
}

function seterror(id, error){
  const element = document.getElementById(id);
  element.getElementsByClassName('formerror')[0].innerHTML = error;
}

function registervalidateForm(event) {
  clearErrors();
  let returnval = true;

  // Perform validation and if validation fails, set the value of returnval to false
  const name = document.forms['myForm']["Username"].value;
  if (name.length < 3) {
      seterror("Name", "&nbsp;*Length of name is too short");
      returnval = false;
  }

  function validateEmail(email) {
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
  }

  const email = document.forms['myForm']["Email"].value;
  if (!validateEmail(email)) {
      seterror("e-mail", "&nbsp;*Email is not in valid format");
      returnval = false;
  }

  function validatePassword(password) {
      const upperRegex = /[A-Z]/;
      const lowerRegex = /[a-z]/;
      const specialRegex = /[!@#$%^&*(),.?":{}|<>]/;
      const numberRegex = /\d/;
      return (upperRegex.test(password) && lowerRegex.test(password) && specialRegex.test(password) && numberRegex.test(password));
  }

  const password = document.forms['myForm']["Password"].value;
  if (password.length < 8) {
      seterror("pass_word", "&nbsp;*Password should be at least 8 characters long<br>&nbsp; *Must include: 1 uppercase, 1 lowercase,<br> &nbsp; &nbsp; 1 number, 1 special character");
      returnval = false;
  } else if (!validatePassword(password)) {
      seterror("pass_word", "&nbsp;*Password should be at least 8 characters long<br>&nbsp; *Must include: 1 uppercase, 1 lowercase,<br> &nbsp; &nbsp; 1 number, 1 special character");
      returnval = false;
  }

  if(!returnval) {
    event.preventDefault(); // Prevent form submission if validation fails
  }
  return returnval;
}

