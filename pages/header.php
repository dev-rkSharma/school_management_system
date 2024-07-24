<?php 
      session_start();
      $username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <!-- seo -->
      <meta name="description" content="School Management System " />
      <meta name="keywords" content="dashboard, panel, users, location, country, state, city, logout" />
      <meta name="author" content="Roushan Kumar" />
      <meta name="robots" content="index, follow" />
      <!-- Favicon -->
      <link rel="icon" href="../images/favicon/Web/icons8-aclc-college-ios-17-outlined-32.png" type="image/x-icon" />
      <!-- title -->
      <title>School Management System</title>
      <!-- stylesheets -->
      <link rel="stylesheet" href="../sass/sidebar/sidebar.css" />
      <link rel="stylesheet" href="../sass/subPages/usermaster.css">
      <link rel="stylesheet" href="../sass/modal/modal.css">
      <link rel="stylesheet" href="../sass/myBootstrap/myBootstrap.css">
      <link rel="stylesheet" href="../sass/preloader/preloader.css">
      <!-- bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

      <!-- google-icons -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
      <!-- font awsome -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
      <!-- preloader -->
      <div id="preloader">
            <div class="loader"></div>
      </div>


      <!-- sidebar -->
      <div class="bodyContent" id="bodyContent">
            <!-- side contaienr -->
            <aside class="sideContent">
                  <div class="user">
                        <!-- person-logo -->
                        <span class="material-symbols-outlined person" style="font-size: 7vw;" id="person_logo">person</span>
                        <br>
                        <!-- user-name -->
                        <h1 id="username">
                              <?php

                              echo $username;
                              ?>
                        </h1>

                  </div>
                  <!-- list  -->
                  <ul id="list">

                        <li>
                              <a href="" id="click_on_users" class="<?php echo $currentpage == 'user_master.php' ? 'active' : ''; ?>  link">
                                    <i class="fa fa-users side-bar-icon" style="font-size: 2vw;"></i>
                                    Users
                              </a>
                        </li>
                        <!-- dropdown list -->
                        <li id="dd">

                              <div class="button-container">

                                    <button class="dropdown-btn">Masters <span id="down_arrow" class="material-symbols-outlined drop-down-logo ">
                                                stat_minus_1
                                          </span>

                                          <span id="up_arrow" class="material-symbols-outlined drop-down-logo ">
                                                stat_1
                                          </span>

                                    </button>

                                    <div class="dropdown-container">
                                          <a href="javascript:void(0);" id="country_page">country</a>
                                          <a href="javascript:void(0);" id="state_page">state</a>
                                          <a href="javascript:void(0);" id="city_page">city</a>
                                          <a href="javascript:void(0);" id="class_page">class</a>
                                          <a href="javascript:void(0);" id="section_page">section</a>

                                    </div>

                              </div>
                              <!-- drop-down-list-end... -->
                        </li>
                        <!-- log-out -->
                        <li>


                              <a href="../backend/code_logout.php" class="link">
                                    <i class="fa-solid fa-arrow-right-from-bracket side-bar-icon"></i>
                                    Logout
                              </a>

                        </li>
                  </ul>
                  <!-- list-end -->
            </aside>
            <!-- side-contaienr-end -->