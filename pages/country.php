<?php
session_start();
require "../backend/config.php";
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
      header("location:../pages/login.php");
      exit();
}
$name = "country";
$tableHeading = "country list";

$_SESSION['counter'] = 1;
$counter = $_SESSION['counter'];
?>

<div class="table">
      <div class="head">
            <p><?php echo $tableHeading ?></p>
      </div>
      <div class="table-container">
            <div class="filter-section">
                  <!-- search bar -->
                  <div class="search">

                        <input type="search" id="search" name="search" placeholder="search country" onkeyup="searchbox()">
                        <button id="modal-btn" >
                              <span id='up_arrow' class='material-symbols-outlined' >add</span>
                        add
                        </button>

                  </div>

            </div>
            <!-- modal container -->
            <div class="modal-container hidden" id="modal">
                  <div class="modal-content">
                        <section class="modal-head">
                              <i class="fa-solid fa-circle-xmark cross-icon" id="crossbtn" onclick="hideCModal()"></i>
                              <p> add <?php echo $name ?></p>
                        </section>
                        <section class="modal-body">

                              <form id="insert_country" method="get">
                                    <input type="text" name="inputCountry" id="inputCountry" placeholder="enter country name...">

                                    <button type="button" name="insertCountryBtn" id="insertCountryBtn" >
                                          <i class="fa-solid fa-plus"></i>
                                          add
                                    </button>

                              </form>

                        </section>
                        <section class="modal-foot">
                              <div id="process-loader"></div>
                              <p class="insert-message" id='message'>

                              </p>


                        </section>
                  </div>
            </div>
            <!-- modal container endst -->
             

            <table id="mytabel" class='data-table'>
                  <thead>
                        <tr>
                              <th> s.no. </th>
                              <th> country name </th>
                              <th> total states</th>
                              <th>total cities</th>
                              <th>action</th>
                        </tr>
                  </thead>
                  <tbody>


                        <?php

                        $query = "SELECT
                                         c.country_id,
                                          c.country_name,
                                    COUNT(DISTINCT s.state_id) AS number_of_states,
                                          COUNT(DISTINCT ci.city_id) AS number_of_cities
                                    FROM
                                    (SELECT @rownum := 0) r, country_master c
                                    LEFT JOIN
                                          state_master s ON c.country_id = s.country_id
                                    LEFT JOIN
                                          city_master ci ON s.state_id = ci.state_id
                                    WHERE c.removed = 'n'  -- to remove deleted countries
                                    GROUP BY
                                          c.country_id
                                          
                                    ;
                                          ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result)) {
                              while ($row = mysqli_fetch_array($result)) {
                                    // echo "<tbody id='tbody'>";
                                    echo "<tr>";
                                    echo "<td>" . $GLOBALS['counter']++ . "</td>";
                                    echo "<td>" . $row['country_name'] . "</td>";
                                    echo "<td>" . $row['number_of_states'] . "</td>";
                                    echo "<td>" . $row['number_of_cities'] . "</td>";
                                    echo "<td>
                                     <a href='' class='edit-country' data-country-id='{$row['country_id']}' data-country-name='{$row['country_name']}'>
                                          <span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-green' data-country-id='{$row['country_id']}' data-country-name='{$row['country_name']}'>
                                                edit
                                          </span>
                                    </a>
                                    <a href='' class='delete-country' data-country-id='{$row['country_id']}' data-country-name='{$row['country_name']}'>
                                          <span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-red' data-country-id='{$row['country_id']}' data-country-name='{$row['country_name']}'>
                                                delete
                                          </span>
                                    </a>      
                                    </td>";

                                    echo "</tr>";
                                    // echo "</tbody>";
                              }
                        }
                        // echo $counter;
                        // $_SESSION['counter'] = $counter;

                        ?>
                  </tbody>
            </table>

      </div>
</div>