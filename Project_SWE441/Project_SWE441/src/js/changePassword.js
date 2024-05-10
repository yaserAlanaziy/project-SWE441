function validate() {
  let password = document.getElementById("password");

  let pass_error = document.getElementById("passwordHelpInline");

  // Clear existing error messages
  pass_error.textContent = "";

  if (password.value.trim() === "") {
    pass_error.textContent = "This field can't be empty!";
    return false;
  }

  if (password.value.includes(" ")) {
    pass_error.textContent = "You cannot use white spaces as input!";
    return false;
  }

  // if password does not match the length limitations
  if (password.value.length < 8 || password.value.length > 20) {
    pass_error.textContent = "Must be 8-20 characters long";
    return false;
  }

  return true;
}
