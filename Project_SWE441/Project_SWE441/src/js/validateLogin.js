function validate() {
  let username = document.getElementById("username");
  let password = document.getElementById("password");

  let user_error = document.getElementById("usernameHelpInline");
  let pass_error = document.getElementById("passwordHelpInline");

  // Clear existing error messages
  user_error.textContent = "";
  pass_error.textContent = "";

  // if the fields are empty
  if (username.value.trim() === "") {
    user_error.textContent = "This field can't be empty!";
    return false;
  }

  if (password.value.trim() === "") {
    pass_error.textContent = "This field can't be empty!";
    return false;
  }

  // check if fields have white spaces
  if (username.value.includes(" ")) {
    user_error.textContent = "You cannot use white spaces as input!";
    return false;
  }

  if (password.value.includes(" ")) {
    pass_error.textContent = "You cannot use white spaces as input!";
    return false;
  }

  // if username does not match the length limitations
  if (username.value.length < 3 || username.value.length > 20) {
    user_error.textContent = "Must be 3-20 characters long";
    return false;
  }

  // if password does not match the length limitations
  if (password.value.length < 8 || password.value.length > 20) {
    pass_error.textContent = "Must be 8-20 characters long";
    return false;
  }

  return true;
}
