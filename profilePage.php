<?php 
//connect to database
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ProfilePage</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
  <?php 
  $haha = 1;
    if ($haha == 0) {
  ?>
    <div>
      <span class="noActivity">You have no activity yet...</span>
    </div>
  <?php 
    } else {
  ?>
<table>
  <thead>
    <tr>
       <th>No.</th>
       <th>Date</th>
       <th>Time</th>
       <th>Floor and Seat Number</th>
       <th>Cancellation</th>
    </tr>
  </thead>
  <tbody>

  <?php
    $va = 9;
    while ($va > 7) {
      $va = $va - 1;
  ?>
    <tr>
      <td><strong></strong></td>
      <td>15</td>
      <td>The speed of the show/reveal</td>
      <td></td>
      <td></td>
    </tr>
  <?php
    }
  ?>
  </tbody>
  
</table>
  <?php
    }
  ?>
</body>
