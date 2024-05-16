function validate() {
  let username = document.getElementById("username");
  let password = document.getElementById("password");
  let repetpassword = document.getElementById("repetpassword");
  let email = document.getElementById("email");

  if (password.value !== repetpassword.value) {
    document.getElementById("message_pass").innerHTML =
      "Passwords do not match";
    return false;
  } else {
    document.getElementById("message_pass").innerHTML = "";
  }

  if (username.value.length >= 3 && username.value.length <= 20) {
    document.getElementById("message_name").innerHTML = "";
  } else {
    document.getElementById("message_name").innerHTML =
      "The user name must be between 3 and 20 characters";
    return false;
  }

  if (
    password.value.length >= 8 &&
    password.value.length <= 20 &&
    /[a-zA-Z]/.test(password.value) &&
    /[0-9]/.test(password.value) &&
    /[^a-zA-Z0-9]/.test(password.value)
  ) {
    document.getElementById("message_pass").innerHTML = "";
  } else {
    document.getElementById("message_pass").innerHTML =
      "Password must contain at least 1 letter, 1 number, 1 symbol, and be between 8 and 20 characters long";
    return false;
  }

  return true;
}
