<?php 
      header('Content-Type: application/json');
      require "../backend/config.php";

      $sql = "select distinct c.country_id, c.country_name from country_master c INNER JOIN state_master s ON c.country_id = s.country_id";
                  

      // $query = 'select country_id, country_name from country_master';            
      $result = mysqli_query($conn, $sql);

      $data = [];

      if( mysqli_num_rows($result) > 0 ) {
            while($row = mysqli_fetch_assoc($result)) {
                $data[] = [
                  'country_id' => $row['country_id'],
                  'country_name' => ucwords(strtolower(trim($row['country_name'])))
                ];
            // echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
            }
      } else {
            $data[] = [
                  'country_id' => '',
                  'country_name' => 'No country found'
            ];
      }

      mysqli_close($conn);

      echo json_encode($data);

?>