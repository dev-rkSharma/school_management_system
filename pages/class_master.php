<?php
session_start();
require "../backend/config.php";
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
      header("location:../pages/login.php");
      exit();
}
$name = "Class";
$tableHeading = "Class list";


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
                                    <input type="text" name="" id="" placeholder="enter class">

                                    <button type="button" name="" id="" >
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
                              <th> class </th>
                              <th> total sections</th>
                              <th>action</th>
                        </tr>
                  </thead>
                  <tbody>


                        <?php

                        $query = "SELECT c.class_id,c.class_name,count(s.section_name) as sections 
                                    FROM class_master c 
                                    left JOIN section_master s ON c.class_id = s.class_id WHERE c.removed = 'n'
                                     GROUP BY c.class_id
                                     order by c.class_name
                                    ";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result)) {
                            $counter = 0;
                              while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" .++$counter . "</td>";
                                    echo "<td>" . $row['class_name'] . "</td>";
                                    echo "<td>" . $row['sections'] . "</td>";
                                    echo "<td>
                                     <a href='' class='edit-country' data-country-id='{$row['class_id']}' data-country-name='{$row['class_name']}'>
                                          <span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-green' data-country-id='{$row['class_id']}' data-country-name='{$row['class_name']}'>
                                                edit
                                          </span>
                                    </a>
                                    <a href='' class='delete-country' data-country-id='{$row['class_id']}' data-country-name='{$row['class_name']}'>
                                          <span id='up_arrow'  class='material-symbols-outlined action-icons-buttons c-red' data-country-id='{$row['class_id']}' data-country-name='{$row['class_name']}'>
                                                delete
                                          </span>
                                    </a>      
                                    </td>";

                                    echo "</tr>";
                              }
                        }

                        ?>
                  </tbody>
            </table>

      </div>
</div>