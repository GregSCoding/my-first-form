let xicon = document.createElement("i");
xicon.className = "fa fa-times-circle-o fa-lg";
let checkicon = document.createElement("i");
checkicon.className = "fa fa-check-circle-o fa-lg";
let inputs = document.querySelectorAll("input");
let passwordInputs = document.querySelectorAll('[type="password"]');
let passwordInput = passwordInputs[0];
let passwordConfirmation = passwordInputs[1];
let checkBoxes = document.querySelectorAll('[type="checkbox"]');

inputs.forEach(elem => {
  elem.addEventListener("focusout", validate);
});
checkBoxes.forEach(elem => {
  elem.removeEventListener("focusout", validate);
});
passwordConfirmation.removeEventListener("focusout", validate);
passwordConfirmation.addEventListener("focusout", passwordMatch);

function passwordMatch(event){
  if(event.target.hasIcon = true) removeIndicators(event);
  if(event.target.value === "" || event.target.value != passwordInput.value){
    event.target.parentNode.append(xicon.cloneNode());
    event.target.classList.add("invalid");
    event.target.classList.remove("valid");
    let errorDescription = document.createElement("div");
    errorDescription.classList.add("error-description");
    errorDescription.textContent = event.target.getAttribute("data-description");
    event.target.parentNode.parentNode.append(errorDescription);
    element.hasDescription = true;
  }else{
    event.target.parentNode.append(checkicon.cloneNode());
    event.target.classList.add("valid");
    event.target.classList.remove("invalid");
  }
  event.target.hasIcon = true;
}

function validate(event){
  if(event.target.hasIcon = true) removeIndicators(event);passwordInputs = document.querySelectorAll('[type="password"]');
  if(event.target.checkValidity()){
    event.target.parentNode.append(checkicon.cloneNode());
    event.target.classList.add("valid");
    event.target.classList.remove("invalid");
  }else{
    event.target.parentNode.append(xicon.cloneNode());
    event.target.classList.add("invalid");
    event.target.classList.remove("valid");
    let errorDescription = document.createElement("div");
    errorDescription.classList.add("error-description");
    errorDescription.textContent = event.target.getAttribute("data-description");
    event.target.parentNode.parentNode.append(errorDescription);
    element.hasDescription = true;
  }
  event.target.hasIcon = true;
}
function removeIndicators(event){
  element = event.target
  element.parentNode.removeChild(element.parentNode.lastChild);
  if(element.hasDescription){
  element.parentNode.parentNode.removeChild( element.parentNode.parentNode.lastChild);
  element.hasDescription = false;
  }
}