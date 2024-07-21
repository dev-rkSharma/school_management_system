<?php

session_start();

require "../backend/config.php";

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
      header("location:../pages/login.php");
      exit();
}

$name = "city";
$tableHeading = "city list";

?>


<div class="table">
      <div class="head">
            <p><?php echo $tableHeading ?></p>
      </div>
      <div class="table-container">
            <div class="filter-section">

                  <!-- filter section -->
                  <div class="filter-box">
                        <select name="city-country-filter" id="city-country-filter">


                        </select>
                        <select name="city-state-filter" id="city-state-filter">

                        </select>
                  </div>
                  <!-- filter section ends.............. -->


                  <!-- search bar -->
                  <div class="search">

                        <input type="search" id="search" name="search" placeholder="search city" onkeyup="searchbox()">
                        <button id="modal-btn" onclick="modalContainer()">
                              <span id='up_arrow' class='material-symbols-outlined'>add</span>
                              add
                        </button>

                  </div>
                  <!-- search bar ends........ -->

                  <!-- modal container -->
                  <div class="modal-container-city hidden" id="modal">
                        <div class="modal-content">
                              <section class="modal-head">
                                    <i class="fa-solid fa-circle-xmark cross-icon" id="crossbtn" onclick="modalcityhide()"></i>
                                    <p> add <?php //echo $name 
                                                ?></p>
                              </section>
                              <section class="modal-body">

                                    <form id="insert_country" method="get">
                                          <div class="input-section">
                                                <select name="country-dd" id="country-dd"></select>
                                                <select name="state-dd" id="state-dd"></select>
                                                <input type="text" name="inputCity" id="inputCity" placeholder="enter country name...">
                                          </div>

                                          <div class="btn-section">
                                                <button type="button" name="insertCityBtn" id="insertCityBtn" class='insertbtn' onclick="">
                                                      <i class="fa-solid fa-plus"></i>
                                                      add
                                                </button>
                                          </div>

                                    </form>
                                    <?php
                                    // require "../pages/countryModal.php";
                                    ?>
                              </section>
                              <section class="modal-foot hidden">
                                    <p class="insert-message">
                                          <?php
                                          // echo $insert_message;
                                          ?>
                                    </p>


                              </section>
                        </div>
                  </div>
            </div>
            <table id="mytabel" class="data-table">
                  <thead>
                        <tr>
                              <th> s.no. </th>
                              <th> city name </th>
                              <th>action</th>
                        </tr>
                  </thead>
                  <tbody>
                        <?php

                        $query = "SELECT
                              @rownum := @rownum + 1 AS sno,
                              ci.city_name, ci.city_id
                              FROM
                                    (SELECT @rownum := 0) AS r,
                                    city_master ci
                              LEFT JOIN
                                    state_master s ON ci.state_id = s.state_id
                              ORDER BY
                              ci.city_name";

                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result)) {
                              while ($row = mysqli_fetch_array($result)) {
                                    $city_id = $row['city_id'];

                                    echo "<tr>";
                                    echo "<td>" . $row['sno'] . "</td>";
                                    echo "<td>" . $row['city_name'] . "</td>";
                                    echo "<td> <a href=''><span id='' data-id='$city_id' class='material-symbols-outlined action-icons-buttons c-green'>
                                          edit</span></a>
                                          <a href=''><span id=''  class='material-symbols-outlined action-icons-buttons c-red'>delete</span></a>      
                                    </td>";

                                    echo "</tr>";
                              }
                        }
                        ?>
                  </tbody>
            </table>
      </div>
</div>