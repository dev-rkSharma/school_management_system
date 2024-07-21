<!-- checking for loged-in or not -->
<?php
session_start();
$username = @$_SESSION['username'];

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
      // echo "helo";
      header("location:login.php");
      
      exit();
}
?>
<!--  -->

<?php @include "../pages/header.php" ?>


<!-- body-cotent -->
<main class="mainContent">
      <!-- head-bar -->
      <div class="head-row">
            <span class="material-symbols-outlined" style="font-size: 2vw; color:orange; border:1px solid white;left:.4vw; top:.8vh; cursor:pointer; " id="menu_btn">menu</span>
      </div>
      <!-- head-bar-end -->

      <!-- ajax-container -->
      <div id="ajaxContent">
           










      </div>
      <!-- ajax-container-ends........ -->

</main>
<!-- body-content-ends.............. -->



<?php @include "footer.php" ?>