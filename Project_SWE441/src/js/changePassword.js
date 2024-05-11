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

  if (
    password.value.length >= 8 &&
    password.value.length <= 20 &&
    /[a-zA-Z]/.test(password.value) &&
    /[0-9]/.test(password.value) &&
    /[^a-zA-Z0-9]/.test(password.value)
  ) {
    document.getElementById("passwordHelpInline").innerHTML = "";
  } else {
    document.getElementById("passwordHelpInline").innerHTML =
      "Password must contain at least 1 letter, 1 number, 1 symbol, and be between 8 and 20 characters long";
    return false;
  }

  return true;
}
