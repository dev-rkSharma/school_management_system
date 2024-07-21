//!--------------------------------------functions ate used in ajax page----------------------------------------


// state page ------------------------------------------------------------------------------------
function Country_filter() {
  var xhr = new XMLHttpRequest();
  xhr.open("post", "../backend/get_country.php", true);
  xhr.send();
  xhr.onload = function () {
    const country_filter = document.getElementById("country-filter");

    country_filter.innerHTML += this.responseText;
    //load_filtered_page("../backend/filterStates.php"); // Assuming this file exists and returns HTML content based
    document
      .getElementById("country-filter")
      .addEventListener("change", function () {
        load_filtered_page("../backend/filterStates.php"); // Assuming this file exists and returns HTML content based
      });
  };
}
function load_filtered_page(path) {
  var id = document.getElementById("country-filter").value;
  let data = {
    id: id,
  };
  let jsonData = JSON.stringify(data);
  const xhr = new XMLHttpRequest();
  xhr.open("post", path, true);
  xhr.setRequestHeader("content-type", "application/json");
  xhr.send(jsonData);
  var bodyPart = document.getElementById("ajaxContent");
  xhr.onload = function () {
    // console.log(this.responseText);
    // bodyPart.innerHTML = this.responseText;
    document.querySelector("tbody").innerHTML = this.responseText;
  };
}

// city page ------------------------------------------------------------------------------------
function city_country_filter() {
  //load country dropdown
  var xhr = new XMLHttpRequest();
  xhr.open("post", "../backend/get_country.php", true);
  xhr.send();
  xhr.onload = function () {
    const city_country_filter = document.getElementById("city-country-filter");
    city_country_filter.innerHTML += this.responseText;
    // city_load_filtered_page("../backend/filterCities.php");
    document
      .getElementById("city-country-filter")
      .addEventListener("change", function () {
        city_state_filter("../backend/filterCities.php");
      });
  };
}

function city_state_filter(path) {
  //load state dropdown
  var id = document.getElementById("city-country-filter").value;
  if (!id) {
    console.error("No country selected");
    return;
  }

  let data = {
    id: id,
  };
  let jsonData = JSON.stringify(data);

  const xhr = new XMLHttpRequest();
  xhr.open("POST", path, true);
  xhr.setRequestHeader("Content-Type", "application/json");
  xhr.send(jsonData);

  xhr.onload = function () {
    if (xhr.status === 200) {
      try {
        var response = JSON.parse(this.responseText);
        console.log(response);
        if (response && response.data) {
          let statedd = document.getElementById("city-state-filter");
          statedd.innerHTML = `<option value="" disabled selected>--Select State--</option>`;
          response.data.forEach(function (item) {
            statedd.innerHTML += `<option value="${item.id}">${item.name}</option>`;
            statedd.addEventListener("change", function () {
              city_load_filtered_page(
                "../backend/filterState2.php",
                this.value
              );
            });
          });
        } else {
          console.error("Invalid response format");
        }
      } catch (error) {
        console.error("Error parsing JSON response: ", error);
      }
    } else {
      console.error("Failed to fetch state data: ", xhr.statusText);
    }
  };

  xhr.onerror = function () {
    console.error("Request error");
  };
}

function city_load_filtered_page(path, id) {
  var state_id = id;
  if (!state_id) {
    console.error("No state selected");
    console.debug(state_id);
    // return;
  }

  let data = {
    state_id: id,
  };

  let jsonData = JSON.stringify(data);
  const xhr = new XMLHttpRequest();
  xhr.open("post", path, true);
  xhr.setRequestHeader("content-type", "application/json");
  xhr.send(jsonData);
  xhr.onload = function () {
    // console.log(this.responseText);
    // bodyPart.innerHTML = this.responseText;
    document.querySelector("tbody").innerHTML = this.responseText;
  };
}
