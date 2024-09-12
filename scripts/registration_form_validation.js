$(document).ready(function () {
  // validation patters
  const alpha = /^[a-zA-Z]+(\s[a-zA-Z]+)*$/; // Allows letters and spaces
  const pincodePattern = /^\d{6}$/;
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/; // Email pattern
  const phone = /^[0-9]{10}$/; // 10-digit
  const passwordPattern = /.{8,}$/;
  const addresPattern = /^[a-zA-Z0-9\s,.-]+$/;

  //error message function
  function error(selector, message) {
    $(selector).text(message).css({
      color: "red",
      display: "block",
    });
  }

  // clear error function
  function clearError(selector) {
    $(selector).text("").css({
      display: "none",
      outline: "",
    });
  }

  // name validation
  function validateName() {
    const name = $("#name").val().trim();

    if (name === "") {
      error("#nameError", "Name is required");

      return false;
    } else if (!alpha.test(name)) {
      error("#nameError", "Enter correct name");
      return false;
    } else {
      clearError("#nameError");
      return true;
    }
  }
  // father name validation
  function validateFatherName() {
    const father_name = $("#father-name").val();

    if (father_name == "") {
      error("#fatherNameError", "Father Name is required");
      return false;
    } else if (!alpha.test(father_name)) {
      error("#fatherNameError", "Enter correct father name");
      return false;
    } else {
      clearError("#fatherNameError");
      return true;
    }
  }

  //   mother name validation
  function validateMotherName() {
    const mother_name = $("#mother-name").val();
    if (mother_name == "") {
      error("#motherNameError", "Mother Name is required");
      return false;
    } else if (!alpha.test(mother_name)) {
      error("#motherNameError", "Enter correct mother name");
      return false;
    } else {
      clearError("#motherNameError");
      return true;
    }
  }
  // moblie number validation
  function validateMobile1() {
    const mobile1 = $("#mobile1").val();
    if (mobile1 === "") {
      error("#mobile", "Mobile number is required");
      $("#mobile1").css("outline", "1px solid red");
      return false;
    } else if (!phone.test(mobile1)) {
      error("#mobile", "Enter correct mobile number");
      $("#mobile1").css("outline", "1px solid red");
      return false;
    } else {
      clearError("#mobile");

      return true;
    }
  }

  function validateMobile2() {
    const mobile2 = $("#mobile2").val();
    if (mobile2 == "" || !phone.test(mobile2)) {
      error("#mobile", "Enter correct mobile number");
      $("#mobile2").css("outline", "1px solid red");
      return false;
    } else {
      clearError("#mobile");
      return true;
    }
  }
  // email validation
  function validateEmail() {
    const mail = $("#email").val().trim();
    if (mail === "") {
      error("#mail", "Enter e-mail address");
      return false;
    } else if (!emailPattern.test(mail)) {
      error("#mail", "Enter correct e-mail address");
      return false;
    } else {
      clearError("#mail");
      return true;
    }
  }

  // gender validation
  function validateGender() {
    if (!$("input[name='gender']:checked").val()) {
      error("#genderError", "Select your gender");
      return false;
    } else if (!$("input[name='gender']:checked")) {
      error("#genderError", "Please select your gender");
      return false;
    } else {
      clearError("#genderError");
      return true;
    }
  }

  //class validation
  function validateClass() {
    const class_name = $("#class").val();

    if (class_name == "11th" || class_name == "12th") {
      $("#course-section").css("display", "block");
    } else {
      $("#course-section").css("display", "none");
    }
    if (class_name === "") {
      error("#classError", "Select your class");
      return false;
    } else {
      clearError("#classError");
      return true;
    }
  }

  // dob validation
  //to check if date is valid or not
  // function isValidDate(dateString) {
  //   const date = new Date(dateString);
  //   return date instanceof Date || !isNaN(date);
  // }
  function isValidDate(dateString) {
    const date = new Date(dateString);
    return !isNaN(date.getTime());
  }
  //check if the selected date is in the future or not
  function isFutureDate(dateString) {
    const today = new Date();
    const selectedDate = new Date(dateString);
    return selectedDate > today;
  }

  function validateDob() {
    const selectedDob = $("#dob").val();
    if (selectedDob === "") {
      error("#dateError", "enter your date of birth");
      return false;
    } else if (!isValidDate(selectedDob)) {
      error("#dateError", "please enter a valid date");
      return false;
    } else if (isFutureDate(selectedDob)) {
      error("#dateError", "date of birth cannot be in future");
      return false;
    } else {
      clearError("#dateError");
      return true;
    }
  }

  // validate address
  function validateAddress() {
    const address = $("#address").val().trim();
    if (address === "") {
      error("#addressError", "Enter your address");
      return false;
    } else if (!addresPattern.test(address)) {
      error("#addressError", "Enter valid address");
      return false;
    } else if (address.length < 10) {
      error("#addressError", "Address is too short");
    } else {
      clearError("#addressError");
      return true;
    }
  }

  // validate pincode
  function validatePincode() {
    const pincode = $("#pincode").val();
    if (pincode === "") {
      error("#pincodeError", "pincode required");
      return false;
    } else if (!pincodePattern.test(pincode)) {
      error("#pincodeError", "invalid pincode");
      return false;
    } else {
      clearError("#pincodeError");
      return true;
    }
  }

  // validate region
  function validateRegion() {
    const country = $("#country").val();
    const state = $("#state").val();
    const city = $("#city").val();

    if (country === "" || state === "" || city === "") {
      error("#regionError", "Select your country, state, and city");
    } else if (country === "") {
      error("#regionError", "Select your country");
      return false;
    } else if (country === "Select Country") {
      error("#regionError", "Select your country");
      return false;
    } else if (state === "") {
      error("#regionError", "Select your state");
      return false;
    } else if (state === "Select State") {
      error("#regionError", "Select your state");
      return false;
    } else if (city === "") {
      error("#regionError", "Select your city");
      return false;
    } else if (city === "Select City") {
      error("#regionError", "Select your city");
      return false;
    } else {
      clearError("#regionError");
      return true;
    }
  }

  // validate course
  function validateCourse() {
    const course = $("#course").val();
    if (course === "") {
      error("#courseError", "Select your course");
      return false;
    } else {
      clearError("#courseError");
      return true;
    }
  }

  //validate password
  function validatePassword() {
    const password = $("#password").val().trim();
    if (password === "") {
      error("#passwordError", "Password is required");
      return false;
    } else if (!passwordPattern.test(password)) {
      error(
        "#passwordError",
        "Password must be at least 8 characters long and include both letters and numbers."
      );
      return false;
    } else {
      clearError("#passwordError");
      return true;
    }
  }

  function validateConfirmPasword() {
    const password = $("#password").val().trim();
    const confirmPassword = $("#confirm-password").val().trim();
    if (password !== confirmPassword) {
      error("#confirmPasswordError", "Passwords do not match");
      return false;
    } else {
      clearError("#confirmPasswordError");
      return true;
    }
  }

  $(".error").css("display", "none"); //removing all error on page load
  $("#course-section").css("display", "none"); //course section hidden initally until class selected

  //   dynamic validation calling
  $("#name").on("input", validateName);
  $("#father-name").on("input", validateFatherName);
  $("#mother-name").on("input", validateMotherName);
  $("#mobile1").on("input", validateMobile1);
  $("#mobile2").on("input", validateMobile2);
  $("#email").on("input", validateEmail);
  $("#gender").on("change", validateGender);
  $("#class").on("change", validateClass);
  $("#dob").on("input", validateDob);
  $("#address").on("input", validateAddress);
  $("#pincode").on("input", validatePincode);
  $("#country").on("change", validateRegion);
  $("#state").on("change", validateRegion);
  $("#city").on("change", validateRegion);
  $("#course").on("change", validateCourse);
  $("#password").on("input", validatePassword);
  $("#confirm-password").on("input", validateConfirmPasword);
  // clear error messages on form reset
  $("#reset-btn").on("click", function () {
    clearErrors();
  });

  //submit
  $("#submit-btn").on("click", function (e) {
    let firstInvalidField = null;
    function checkValidity(validateFuction, selector) {
      if (!validateFuction()) {
        $(selector).css("outline", "1px solid red");

        if (!firstInvalidField) {
          firstInvalidField = $(selector);
        }
      } else {
        $(selector).css("outline", "none");
      }
    }

    checkValidity(validateName, "#name");
    checkValidity(validateFatherName, "#father-name");
    checkValidity(validateMotherName, "#mother-name");
    checkValidity(validateMobile1, "#mobile1");
    // checkValidity(validateMobile2, "#mobile2");
    checkValidity(validateEmail, "#email");
    checkValidity(validateGender, "input[name='gender']");
    checkValidity(validateClass, "#class");
    checkValidity(validateDob, "#dob");
    checkValidity(validateAddress, "#address");
    checkValidity(validatePincode, "#pincode");
    checkValidity(validateRegion, "#country");
    // checkValidity(validateCourse, "#course");
    checkValidity(validatePassword, "#password");
    checkValidity(validateConfirmPasword, "#confirm-password");

    // if there is an invalid field, prevent form submission and set focus
    if (firstInvalidField) {
      e.preventDefault();
      
      firstInvalidField.focus();
    }else{
        e.preventDefault();
      let studentName = data('#name');
      let fatherName = data('#father-name');
      let motherName = data('#mother-name');
      let mobile1 = data('#mobile1'); 
      let mobile2 = data('#mobile2');
      let email = data('#email');
      let gender = $("input[name='gender']:checked").val();
      let classSelected = data('#class');
      let dob = data('#dob');
      let address = data('#address');
      let pincode = data('#pincode');
      let city = data('#city');
      let course = data('#course');
      console.info(studentName);
      console.info(fatherName);
      console.info(motherName);
      console.info(mobile1);
      console.info(mobile2);
      console.info(email);
        console.info(gender);
      console.info(classSelected);
      console.info(dob);
      console.info(address);
      console.info(pincode);
      console.info(city);
      console.info(course);
      $.ajax({
        url: '../backend/formsubmit.php',
        type: 'post',
        contentType: 'application/json',
        data : JSON.stringify({
          name: studentName,
          father_name: fatherName,
          mother_name: motherName,
          mobile1: mobile1,
          mobile2: mobile2,
          email: email,
          gender: gender,
          class: classSelected,
          dob: dob,
          address: address,
          pincode: pincode,
          city: city,
          course: course,
        }),
        dataType: 'json',
        
        success: function (response) {
          console.log('data',data);
          console.log('success response : ',response);
          if(response.status === true) {
            alert("Form submitted successfully!");
            clearError();
            clearForm();
            console.log(response.message);
            console.log(response.data);
          }
          else if(response.status === 'collapsed'){
            alert('email already registered');
          }
          else{
            console.log(response.message);
            console.log(response.data);
          }
        },
        error : function (xhr, status, error) {
          // console.error('error',error);
          // console.error("extra",response);
          console.error("response",xhr.responseText);
          console.error("status",status);
          alert("Failed to submit form. Please try again later.");
        }

      })
    }

  });
  
  // value = 'hello';
  //form data submit
  function data(id) {
    return $(id).val().trim();
  }

  //class load

  $.ajax({
    url: "../backend/fetchClasses.php",
    type: "post",
    dataType: "json",
    success: function (response) {
      if (response.status === 1) {
        $("#class")
          .empty()
          .append(
            '<option value="" disabled selected>-- Select Class --</option>'
          );
        response.data.forEach((className) => {
          $("#class").append(
            `<option value='${className}'>${className}</option>`
          );
        });
      } else {
        console.log("Error: ", response.message);
      }
    },
    error: function (xhr, status, error) {
      console.log(xhr.responseText);
    },
  });

  // load country
  $.ajax({
    url: "../backend/filterRegistration.php",
    type: "POST",

    dataType: "json",
    success: function (response) {
      if (response.status === 1) {
        $("#country")
          .empty()
          .append(
            '<option value="" disabled selected>-- Select Country --</option>'
          );
        $.each(response.data, function (index, Country) {
          $("#country").append(
            `<option value="${Country.country_id}">${Country.country_name}</option>`
          );
        });
      } else {
        console.debug("message :  ", response.message);
      }
    },
    error: function (xhr, status, error) {
      console.table("Response: ", xhr.responseText);
    },
  });

  // load state
  $("#country").on("change", function () {
    const country = $('#country').val();
    $.ajax({
      url: "../backend/filterRegistration.php",
      type: "POST",
      data:JSON.stringify({ country_id: country }),
      dataType: "json",
      success: function (response) {
        if (response.status === 1) {
          $("#state")
            .empty()
            .append(
              '<option value="" disabled selected>-- Select State --</option>'
            );
          $.each(response.data, function (index,state) {
            $("#state").append(
              `<option value="${state.state_id}">${state.state_name}</option>`
            );
          });
        } else {
          console.debug("message :  ", response.message);
          console.debug("status : ", response.status);
        }
      },
      error: function (xhr, status, error) {
        console.table("Response: ", xhr.responseText);
      },
    });
  });

  //load cities
  $("#state").on("change", function (e) {
    var state = $('#state').val();
    $.ajax({
      url: "../backend/filterRegistration.php",
      type: "POST",
      data: JSON.stringify({ state_id: state }),
      dataType: "json",
      success: function (response) {
        if (response.status === 1) {
          $("#city").empty();
          $("#city").append(
            '<option value="" disabled selected>-- Select City --</option>'
          );
          $.each(response.data, function (index, city) {
            $("#city").append(
              `<option value="${city.city_id}">${city.city_name}</option>`
            );
          });
        } else {
          console.debug("message : ", response.message);
          console.debug("status : ", response.status);
        }
      },
      error: function (xhr, status, error) {
        console.error("error: " ,xhr.responseText);
      },
    });
  });
});
