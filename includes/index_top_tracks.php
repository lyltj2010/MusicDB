<!DOCTYPE html>
<html>
<body>
<div class="head-bar">
  <a href="/tracks"><h3>Top Tracks</h3></a>
  <hr>
</div>
<?php
  $sql2 = "SELECT track FROM track_tag WHERE tag = 'rock' LIMIT 6";
  $sql3 = "SELECT track FROM track_tag WHERE tag = 'alternative' LIMIT 6";
  $sql4 = "SELECT track FROM track_tag WHERE tag = 'pop' LIMIT 6";
  $sql5 = "SELECT track FROM track_tag WHERE tag = 'indie' LIMIT 6";
  
  $results2 = mysqli_query($conn, $sql2);
  $results3 = mysqli_query($conn, $sql3);
  $results4 = mysqli_query($conn, $sql4);
  $results5 = mysqli_query($conn, $sql5);
?>
<div class="row">
  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Rock</div>
      <?php foreach(mysqli_fetch_all($results2,MYSQL_ASSOC) as $row2){ ?>
        <!-- <li class="list-group-item"> -->
          <!-- <span class="badge">14</span> Cras justo odio -->
        <!-- </li> -->
        <li class="list-group-item"><?=$row2['track']?></li>
      <?php } ?>
      <!-- <div class="pannel-footer">More</div> -->
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Alternative</div>
      <?php foreach(mysqli_fetch_all($results3,MYSQL_ASSOC) as $row3){ ?>
        <li class="list-group-item"><?=$row3['track']?></li>
      <?php } ?>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Pop</div>
      <?php foreach(mysqli_fetch_all($results4,MYSQL_ASSOC) as $row4){ ?>
        <li class="list-group-item"><?=$row4['track']?></li>
      <?php } ?>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Indie</div>
      <?php foreach(mysqli_fetch_all($results5,MYSQL_ASSOC) as $row5){ ?>
        <li class="list-group-item"><?=$row5['track']?></li>
      <?php } ?>
    </div>
  </div>
</div>
</body>
</html>