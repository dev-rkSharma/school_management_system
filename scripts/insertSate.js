/*
  ! adding states  
*/

function modalStateShow() {
  modalshow();
  //modal show contents to add to state
  // fetching countries in dropdown list to add state;
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "../backend/get_country.php", true);
  xhr.send();
  xhr.onload = function () {
    if (this.status == 200) {
      var countryDd = document.getElementById("stateDropdown");
      countryDd.innerHTML = this.responseText;
      //   console.log('country fetched');
    }
    // taking data from dropdown and adding new state to that perticular country
    document
      .getElementById("insertStateBtn") 
      .addEventListener("click", function () {
        var country_id = document.getElementById("stateDropdown").value;
        var state_name = document.getElementById("inputState").value;
        var data = {
          id: country_id,
          state_name: state_name,
        };
        const xhr = new XMLHttpRequest();
        xhr.open("post", "../backend/insertStateModal.php", true);
        xhr.setRequestHeader("content-type", "application/json");
        xhr.onload = function () {
          if (xhr.readyState == 4 && xhr.status == 200) {
            let response;
            try {
              response = JSON.parse(xhr.responseText);
            } catch (error) {
              console.error(error);
              console.error(this.responseText)
              response = null;
            }
            updateStateTable();
          }
        };
        var jsonData = JSON.stringify(data);
        xhr.send(jsonData);
      });
  };
}
function updateStateTable() {
  var bodyPart = document.getElementById("ajaxContent");
  var http = new XMLHttpRequest();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      bodyPart.innerHTML = this.responseText;
    }
  };
  http.open("GET", "../pages/state.php", true);
  http.send();
}

function modalhide() {
  const modal = document.getElementsByClassName("modal-container-state")[0];
  modal.classList.add("hidden");
}
