// country-insertion---------------------------------------------------------------------------------------->
function insertData() {
  var country_name = document.getElementById("inputCountry").value;
  var data = {
    country_name: country_name,
  };

  var jsonData = JSON.stringify(data);
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "../backend/addCountry.php", true);
  xhr.setRequestHeader("Content-type", "application/json");
  xhr.send(jsonData);
  xhr.onload = function () {
    if (this.status == 200 && this.readyState == 4) {
      console.debug(this.responseText);
      var response = this.responseText ? JSON.parse(this.responseText) : null;
      console.log(this.responseText);
      console.log(response);
      if (response.status == 1) {
        loadcountryPage();

        console.log(response.data);
      } else if (
        response.status == 2 ||
        response.status == 3 ||
        response.status == 4
      ) {
        message.textContent = response.message;
        message.style.color = "red";
      }
    }
  };
}

function loadcountryPage() {
    var bodyPart = document.getElementById("ajaxContent");
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
}

function hideCModal() {
  const modal = document.getElementsByClassName("modal-container")[0];
  modal.classList.add("hidden");
}

// edit ------------------------------------------------------------------------------------------------------>

function edit_country(e) {
  e.preventDefault();
  let country_name = e.target.getAttribute("data-country-name");
  let input_element = document.getElementById("inputCountry");
  let country_id = e.target.getAttribute("data-country-id");
  input_element.value = country_name;
  modalshow();
  input_element.focus();

  let insertCountryBtn = document.getElementById("insertCountryBtn")
  insertCountryBtn.textContent = 'Update';

  insertCountryBtn.replaceWith(insertCountryBtn.cloneNode(true));
  
  insertCountryBtn = document.getElementById('insertCountryBtn');

  insertCountryBtn.addEventListener("click", function () {
    console.info('update clicked');

      const xhr = new XMLHttpRequest();
      xhr.open("post", "../backend/edit_update_country.php", true);
      xhr.setRequestHeader("content-type", "application/json");
      xhr.send(
        JSON.stringify({ country_id: country_id, country_name: input_element.value })
      );
      xhr.onload = function () {
        if (this.status === 200 && this.readyState === 4) {
          const response = JSON.parse(this.responseText)
            ? JSON.parse(this.responseText)
            : "error in parsing json_data :- ";
          if (response.status === 1) {
            alert(response.message);
            loadcountryPage();
          }
        }
      };

    });
}


//delete country ---------------------------------------------------------------------------------->
function delete_country(e) {
  console.debug('delete btn clicked');
  e.preventDefault();
  
  let id = e.target.getAttribute('data-country-id');
  let  name = e.target.getAttribute('data-country-name');

  let result =  confirm("Are you sure you want to delete : " + name + "?");
  
  if (result === true) {
    const xhr = new XMLHttpRequest();
    xhr.open("post", "../backend/delete_script/delete_country.php", true);
    xhr.setRequestHeader("Content-type", "application/json");
    xhr.send(JSON.stringify({ id: id , name : name  }));
    xhr.onload = function () {
      if (this.status === 200 && this.readyState === 4) {
        console.debug('response :'+ this.responseText);
        const response = JSON.parse(this.responseText)
         ? JSON.parse(this.responseText)
          : "error in parsing json_data :- ";
        if (response.status === 1) {
          alert(response.message);
          loadcountryPage();
        }else if(response.status === 2 || response.status === 3 || response.status === 4) {
          alert(response.message);
        }
      }
    };
  }
}