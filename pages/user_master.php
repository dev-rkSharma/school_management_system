<?php
session_start();
$name = "user";
$tableHeading = "user list";
@include "../pages/_data_table_head.php" ?>

<div class="table">
    <div class="head">
        <p><?php echo $tableHeading ?></p>
    </div>
    <div class="table-container">
        <div class="filter-section">
            <!-- search bar -->
            <div class="search">

                <input type="search" id="search" name="search" placeholder="search name" onkeyup="searchbox()">
                <button id="modal-btn" onclick="">
                    <span id='up_arrow' class='material-symbols-outlined'>add</span>
                    add
                </button>

            </div>

        </div>
        <!-- modal container -->
        <div class="modal-container-user hidden" id="modal">
            <div class="modal-content">
                <section class="modal-head">
                    <i class="fa-solid fa-circle-xmark cross-icon" id="crossbtn" onclick="hide()"></i>
                    <p> add <?php echo $name ?></p>
                </section>
                <section class="modal-body">

                    <form id="insert_country" method="get">
                        <div class="input-section">
                            <input type="text" name="user_id" id="user_id" placeholder="user_id" readonly disabled>
                            <input type="text" name="name" id="name" placeholder="enter name">
                            <input type="text" name="username" id="_username" placeholder="enter username">
                            <input type="email" name="email" id="email" placeholder="enter email">
                            <input type="text" name="password" id="password" placeholder="* * * *">
                        </div>
                        <div class="btn-section">
                            <button type="button" name="submit_btn" id="submit_btn" onclick="">
                                <i class="fa-solid fa-plus"></i>
                                add
                            </button>
                        </div>

                    </form>

                </section>
                <section class="modal-foot">
                    <div id="process-loader"></div>
                    <p class="insert-message" id='message'>

                    </p>


                </section>
            </div>
        </div>
        <!-- modal container ends.................... -->
         
        <!-- table -->
        <table id="mytabel" class='data-table'>
            <tr>
                <th> user id </th>
                <th> name </th>
                <th> user name</th>
                <th> email </th>
                <th> actions </th>
            </tr>


            <?php
            require "../backend/config.php";


            if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
                header("location:loginpage.php");
                exit();
            }

            $alldata = "select * from user_master where removed = 'n';";
            $result = mysqli_query($conn, $alldata);

            if (mysqli_affected_rows($conn) > 0) {
                if ($result) {

                    $counter = 0;
                    // returns  all rows from database
                    while ($row = mysqli_fetch_assoc($result)) {
                        
                        echo "<tr>";
                        
                        echo "<td>" . ++$counter . "</td>
                            <td>{$row['full_name']}</td>
                            <td>{$row['username']}</td>
                            <td>{$row['email']}</td>";

                        echo "<td>
                                <a href='javascript:void(0);' class='edit_usr' data-id='{$row['user_id']}' data-name='{$row['full_name']}' data-username='{$row['username']}' data-email='{$row['email']}'>
                                    <span class='material-symbols-outlined action-icons-buttons c-green' data-id='{$row['user_id']}' data-name='{$row['full_name']}' data-username='{$row['username']}' data-email='{$row['email']}'>
                                        edit
                                    </span>
                                </a>
                                <a href='javascript:void(0);'  class='delete_usr' data-id='{$row['user_id']}' data-name='{$row['full_name']}'>
                                    <span class='material-symbols-outlined action-icons-buttons c-red' data-id='{$row['user_id']}' data-name='{$row['full_name']}'>delete</span>
                                </a>      
                            </td>";
                        
                        echo "</tr>";
                    }
                }
            }

            ?>


        </table>
    </div>
</div>
<!-- table ends......... -->
<?php @include "../pages/_data_table_foot.php" ?>