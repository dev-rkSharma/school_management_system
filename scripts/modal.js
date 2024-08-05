// universally opening  modal
function modalshow() {
  const modal = document.getElementById("modal");
  modal.classList.remove("hidden");
}

//users modal contents
function showElement() {
  document.getElementById("user_id").classList.add("hidden");
  document.getElementById("name").value = "";
  document.getElementById("_username").value = "";
  document.getElementById("email").value = "";
  document.getElementById("submit_btn").innerHTML = "Add";
  document.getElementById("password").value = "";
  document.getElementById("password").style.display = "";
}

function modalContent() {
  modalshow();
  showElement();
}

//hide user page modal
function hide() {
  const modal = document.getElementsByClassName("modal-container-user")[0];
  modal.classList.add("hidden");
}

// adding users --------------------------------------------------
function add_users() {
  modalContent();
  let user_name = document.getElementById("name");
  let _username = document.getElementById("_username");
  let user_mail = document.getElementById("email");
  let password = document.getElementById("password");
  console.info(
    user_name.value,
    _username.value,
    user_mail.value,
    password.value
  );

  if (
    user_name.value.trim() === "" ||
    _username.value.trim() === "" ||
    user_mail.value.trim() === "" ||
    password.value.trim() === ""
  ) {
    alert("All fields are required to fill out.");
    user_name.value.trim() === "" //ternary statement
      ? ((user_name.style.border = "1px solid red"), user_name.focus())
      : _username.value.trim() === ""
      ? ((_username.style.border = "1px solid red"), _username.focus())
      : user_mail.value.trim() === ""
      ? ((user_mail.style.border = "1px solid red"), user_mail.focus)
      : "";
    return;
  } else {
    const form_data = {
      user_name: user_name.value,
      _username: _username.value,
      user_mail: user_mail.value,
      password: password.value,
    };
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/add_update_user.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify(form_data));
    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText)
          ? JSON.parse(this.responseText)
          : console.error(this.responseText);
        console.debug("password response :" + response);
        if (response.status == 1) {
          alert(response.message);
          load_user_page(e);
          // hide();
        } else if (response.status == 3) {
          console.error(response.message);
        }
      }
    };
  }
}

// editing users --------------------------------------------------
function edit_users(e) {
  e.preventDefault();

  modalshow();
  showElement();
  let id_input = document.getElementById("user_id");
  let password = document.getElementById("password");
  password.style.display = "none";
  id_input.classList.remove("hidden");
  id_input.style.border = "1px grey solid";
  id_input.style.color = "grey";

  let id = e.target.getAttribute("data-id");
  let name = e.target.getAttribute("data-name");
  let username = e.target.getAttribute("data-username");
  let email = e.target.getAttribute("data-email");

  let user_id = document.getElementById("user_id");
  let user_name = document.getElementById("name");
  let _username = document.getElementById("_username");
  let user_mail = document.getElementById("email");

  user_mail.value = email;
  _username.value = username;
  user_name.value = name;
  user_id.value = id;

  let submit_btn = document.getElementById("submit_btn");
  submit_btn.innerHTML = "Update";

  
  submit_btn.replaceWith(submit_btn.cloneNode(true));
  submit_btn = document.getElementById("submit_btn");

  submit_btn.addEventListener("click", function () {
    const form_value = {
      user_id: user_id.value,
      user_name: user_name.value,
      _username: _username.value,
      user_mail: user_mail.value,
    };

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/add_update_user.php", true);
    xhr.setRequestHeader("Content-type", `application/json`);
    xhr.send(JSON.stringify(form_value));
    xhr.onload = function () {
      if (this.status === 200) {
        let response;
        try {
          response = JSON.parse(this.responseText);
        } catch (error) {
          console.error("Failed to parse JSON:", error);
          console.error("Original response:", this.responseText);
          response = null;
        }

        if (response.status == 1) {
          console.info(response.message);
          alert(response.message);
          load_user_page(e);
        } else if (response.status == 3) {
          console.error(response.messsage);
        }
      }
    };
  });
}

// delteing users---------------------------------------------------------
function delete_users(e) {
  e.preventDefault();

  let id = e.target.getAttribute("data-id");
  let name = e.target.getAttribute("data-name");

  let confirmDelete = confirm(`Are you sure you want to delete : " ${name} "?`);
  if (confirmDelete) {
    console.debug("Deleting user with id : " + id);
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "../backend/delete_users.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify({ id: id }));
    xhr.onload = function () {
      if (this.status === 200) {
        const response = JSON.parse(this.responseText)
          ? JSON.parse(this.responseText)
          : console.error(this.responseText);
        if (response.status == 1) {
          alert(response.message);
          load_user_page(e);
        } else if (response.status == 2) {
          alert(response.message);
        } else if (response.status == 3) {
          alert(response.message);
        }
      }
    };
  } else {
    console.info("Delete operation cancelled.");
    return;
  }
}

// reloading page---------------------------------------------------------
function load_user_page(e) {
  e.preventDefault();
  var bodyPart = document.getElementById("ajaxContent");
  var http = new XMLHttpRequest();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      bodyPart.innerHTML = this.responseText;
      document.querySelectorAll(".edit_usr").forEach((element) => {
        element.addEventListener("click", edit_users);
      });

      document
        .getElementById("modal-btn")
        .addEventListener("click", modalContent);

      document
        .getElementById("submit_btn")
        .addEventListener("click", add_users);

      document.querySelectorAll(".delete_usr").forEach((e) => {
        e.addEventListener("click", delete_users);
      });
    }
  };
  http.open("GET", "user_master.php", true);
  http.send();
}
