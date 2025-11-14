// Flag variables for button disabling
let nameIsValid = false;
let emailIsValid = false;

$(document).ready(function () {
  // Live validation of name field
  $("#name").on("input", function () {
    nameIsValid = validateName();
    toggleSubmit();
  });

  // Live validation of email field
  $("#email").on("input", function () {
    emailIsValid = validateEmail();
    toggleSubmit();
  });

  toggleSubmit();
});

//Validation for name
function validateName() {
  const nameValue = $("#name").val().trim();
  const namePattern = /^[a-zA-Z][a-zA-Z\s]{2,}$/; // reg exp

  if (!namePattern.test(nameValue)) {
    $(".error-name").text(
      "Name should contain at least 3 letters and spaces only."
    ); //Show error message
    return false;
  }

  $(".error-name").text(""); //REemove error message
  return true;
}

//Validation for Email
function validateEmail() {
  const emailValue = $("#email").val().trim();
  const emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; // reg exp

  if (!emailPattern.test(emailValue)) {
    $(".error-email").text("Enter a valid email address."); //Show error message
    return false;
  }

  $(".error-email").text(""); //REemove error message
  return true;
}

// Function for enabling and disabling the register button
function toggleSubmit() {
  $("#submit").prop("disabled", !(nameIsValid && emailIsValid));
}

//Admin Delete record functionality
function deleteRecord() {
  con = confirm("Delete this record?");
  if (con) {
    window.location.href = "delete.php"; //Proceed to delete the record
  } else {
    window.event.preventDefault(); // Cancel and stay in the dashboard
  }
}
