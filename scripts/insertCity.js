function modalContainer(){
      modalshow();

      //fetching countries to dropdown 
      var xhr = new XMLHttpRequest();
      xhr.open("GET", "../backend/countryForCity.php", true);
      xhr.send();
      xhr.onload = function() {
        if (this.status == 200) {
              var countryDd = document.getElementById("country-dd");
            //   console.log(this.responseText);
              // var response = JSON.parse(this.responseText)? JSON.parse(this.responseText): 'error in json-parse of empty data received';
              countryDd.innerHTML = '<option value="" disabled selected>--Select Country--</option>';
              var response = JSON.parse(this.responseText)? JSON.parse(this.responseText): 'error in json-parse of empty data received';
              response.forEach(function(item){
                    countryDd.innerHTML += `<option value="${item.country_id}">${item.country_name}</option>`;
              });
            
            }
      }

      //fetching stated on the basis of the country
      document.getElementById("country-dd").addEventListener("change", function() {
        var countryId = this.value;
        var data = {'country_id' : countryId};
        var jsonData = JSON.stringify(data);
        var xhr = new XMLHttpRequest();
        xhr.open("post", "../backend/stateForCity.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(jsonData);
        xhr.onload = function() {
          if (this.status == 200) {
                var stateDd = document.getElementById("state-dd");
                stateDd.innerHTML =  `<option value="" disabled selected>--Select State--</option>`;
                var response = JSON.parse(this.responseText)? JSON.parse(this.responseText): 'error in json-parse of empty data received';
                response.data.forEach(function(item){
                    stateDd.innerHTML += `<option value="${item.state_id}">${item.state_name}</option>`;
                });
            //     console.log(this.responseText);
          }
        }
      });

      //adding cities to the states of countries
      document.getElementById("insertCityBtn").addEventListener("click", function() {
            var state_id = document.getElementById('state-dd').value;
            var city_name = document.getElementById('inputCity').value;
            // console.log(state_id);
            // console.log(city_name);
            var data = {
                  'state_id' : state_id,
                  'city_name' : city_name
            }
            // console.log(data);
            var jsonData = JSON.stringify(data);
            // console.log(jsonData);
        var xhr = new XMLHttpRequest();
        xhr.open("post", "../backend/addCity.php", true);
        xhr.setRequestHeader("Content-type", "application/json");
        xhr.send(jsonData);
        xhr.onload = function() {
          if (this.status == 200) {
            //     console.log(this.responseText);
                var response = JSON.parse(this.responseText)? JSON.parse(this.responseText): 'error in json encodeing';
                console.log(response);
                console.log(response.status);
                console.log(response.message);
                console.log(response.output) ;   
                  if(response.status == 1){
                        console.log(response.message);
                        updateCityTable();
                        console.log('City added successfully');
                  }
                  else if(response.status == 2) {
                        console.log(response.status);
                        console.log(response.message);
                        console.log('else part executed');
                  }
                  
          }
        }
      });

      function updateCityTable(){
            var bodyPart = document.getElementById("ajaxContent");
            var http = new XMLHttpRequest();
            http.onreadystatechange = function () {
              if (this.readyState == 4 && this.status == 200) {
                bodyPart.innerHTML = this.responseText;
              }
            };
            http.open("GET", "../pages/city_master.php", true);
            http.send();
      }
 
}


function modalcityhide(){
      const modal = document.getElementsByClassName("modal-container-city")[0];
      modal.classList.add("hidden");
}