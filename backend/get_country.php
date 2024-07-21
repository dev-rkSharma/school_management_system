<?php
require "./config.php";

echo "<option value='0' selected>-- All --</option>";

$sql =
      "SELECT country_master.country_id, country_master.country_name FROM 
            country_master
           ";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {

      while ($row = mysqli_fetch_assoc($result)) {
            $cnm = ucwords(strtolower(trim($row['country_name'])));
            echo "<option value='{$row['country_id']}'>{$cnm}</option>";
      }
} else {
      echo "<option value=''>No country found</option>";
}

mysqli_close($conn);

// echo json_encode();
