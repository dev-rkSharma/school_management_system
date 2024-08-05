      <?php
      session_start();
      require "../backend/config.php";
      if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
            header("location:../pages/login.php");
            exit();
      }
      $name = "state";
      $tableHeading = "state list";
      ?>

      <div class="main-container">
      <div class="table">
            <div class="head">
                  <p><?php echo $tableHeading ?></p>
            </div>
            <div class="table-container">
                  <div class="filter-section">
                        <!-- filter section -->
                        <div class="filter-box">
                              <select name="country-filter" id="country-filter">
                              <!-- fetching data from filter.js -->
                              </select>
                        </div>
                        <!-- filter section ends -->
                        <!-- search box -->
                        <div class="search">

                              <input type="search" id="search" name="search" placeholder="search state" onkeyup="searchbox()">
                              <button id="modal-btn" onclick="modalStateShow()">
                                    <span id='up_arrow' class='material-symbols-outlined'>add</span>
                                    add
                              </button>

                        </div>
                        <!-- search box ends -->

                        <!-- modal container -->
                        <div class="modal-container-state hidden" id="modal">
                              <div class="modal-content">
                                    <section class="modal-head">
                                          <i class="fa-solid fa-circle-xmark cross-icon" id="crossbtn" onclick="modalhide()"></i>
                                          <p> add <?php echo $name
                                                      ?></p>
                                    </section>
                                    <section class="modal-body">

                                          <form id="insert_country" method="get">
                                                <div class="form-content">
                                                      <select name="stateDropdown" id="stateDropdown" onload="insertState()">
                                                            <option value="nothing">nothing</option>
                                                      </select>
                                                      <input type="text" name="inputState" id="inputState" placeholder="enter state name...">
                                                </div>

                                                <div class="btn">
                                                      <button type="button" name="insertStateBtn" id="insertStateBtn" class='insertbtn'>
                                                            <i class="fa-solid fa-plus"></i>
                                                            add
                                                      </button>
                                                </div>

                                          </form>

                                    </section>
                                    <section class="modal-foot">
                                          <p class="insert-message">

                                          </p>


                                    </section>
                              </div>
                        </div>
                        <!-- modal container ends... -->

                  </div>

                  <table id="mytabel" class="data-table">
                        <thead>
                              <tr>
                                    <th> s.no. </th>
                                    <th> state name </th>
                                    <th> cities</th>
                                    <th>action</th>
                              </tr>
                        </thead>
                        <tbody>
                              <?php

                              $query = "SELECT
                                         
                                          s.state_name,
                                          s.state_id,
                                          COUNT(DISTINCT ci.city_id) AS number_of_cities
                                    FROM
                                    (SELECT @rownum := 0) r, state_master s
                                   
                                    LEFT JOIN
                                          city_master ci ON s.state_id = ci.state_id
                                    GROUP BY
                                          s.state_id
                                    ORDER BY
                                          s.state_name
                                          ";
                              $result = mysqli_query($conn, $query);
                              if (mysqli_num_rows($result)) {
                                    $counter = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                          echo "<tr>";
                                          echo "<td>" . ++$counter . "</td>";
                                          echo "<td>" . $row['state_name'] . "</td>";
                                          echo "<td>" . $row['number_of_cities'] . "</td>";
                                          echo "<td> <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-green'>
                                          edit</span></a>
                                          <a href=''><span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-red'>delete</span></a>      
                                    </td>";

                                          echo "</tr>";
                                    }
                              }
                              ?>
                        </tbody>
                  </table>
            </div>
      </div>