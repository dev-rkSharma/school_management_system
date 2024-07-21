var bodyPart = document.getElementById("ajaxContent");


// users page
var userPage = document
  .getElementById("click_on_users")
  .addEventListener("click", function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        bodyPart.innerHTML = this.responseText;
        
        document.querySelectorAll('.edit_usr').forEach(element => {
          element.addEventListener("click", edit_users);
        }); 
        
        document.querySelectorAll('.delete_usr').forEach(e => {
          e.addEventListener("click", delete_users);
        });
        document.getElementById("modal-btn").addEventListener("click", modalContent);
        
        document.getElementById("submit_btn").addEventListener("click", add_users);
      }
    };
    http.open("GET", "user_master.php", true);
    http.send();
  });

// country page 
var countryPage = document
  .getElementById("country_page")
  .addEventListener("click", function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        bodyPart.innerHTML = this.responseText;
        //todo edit button click event
        document.getElementById('modal-btn').addEventListener('click', modalshow);//open modal
        document.getElementById('insertCountryBtn').addEventListener('click', insertData) //insert country
        //open modal
        document.querySelectorAll('.edit-country').forEach(e => {//edit button click
          e.addEventListener('click',edit_country);
        });

        document.querySelectorAll('.delete-country').forEach(e => {//delete button click
          e.addEventListener('click',delete_country);
        });

      }
    };
    http.open("GET", "../pages/country.php", true);
    http.send();
  });

//  state page
var countryPage = document
  .getElementById("state_page")
  .addEventListener("click", function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        bodyPart.innerHTML = this.responseText;
        Country_filter();
      }
    };

    http.open("GET", "../pages/state.php", true);
    http.send();
  });

// city page
var countryPage = document
  .getElementById("city_page")
  .addEventListener("click", function (e) {
    e.preventDefault();
    var http = new XMLHttpRequest();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        bodyPart.innerHTML = this.responseText;
        city_country_filter();
      }
    };
    http.open("GET", "../pages/city_master.php", true);
    http.send();
  });

var classPage = document.getElementById("class_page").addEventListener("click", function (e) { //class master page
  e.preventDefault();
  ajax({
    url: "class_master.php",
    method: "GET",
    dataType: "html",
    success: (response) => {
      bodyPart.innerHTML = response;
    },
    error: (error) => {
      console.error("Error:", error);
    },
  })
});
