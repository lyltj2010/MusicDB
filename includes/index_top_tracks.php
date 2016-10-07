<!DOCTYPE html>
<html>
<body>
<div class="head-bar">
  <a href="/tracks"><h3>Top Tracks</h3></a>
  <hr>
</div>
<?php
  $sql2 = "SELECT track FROM track_tag 
           WHERE tag = 'rock' ORDER BY listeners LIMIT 6";
  $sql3 = "SELECT track FROM track_tag 
           WHERE tag = 'alternative' ORDER BY listeners LIMIT 6";
  $sql4 = "SELECT track FROM track_tag 
           WHERE tag = 'pop' ORDER BY listeners LIMIT 6";
  $sql5 = "SELECT track FROM track_tag 
           WHERE tag = 'indie' ORDER BY listeners LIMIT 6";
  
  $results2 = mysqli_query($conn, $sql2);
  $results3 = mysqli_query($conn, $sql3);
  $results4 = mysqli_query($conn, $sql4);
  $results5 = mysqli_query($conn, $sql5);
?>
<div class="row">
  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Rock</div>
      <?php foreach(mysqli_fetch_all($results2,MYSQL_ASSOC) as $row2): ?>
        <a href="track.php?track=<?=$row2['track']?>">
          <li class="list-group-item"><?=$row2['track']?></li>
        </a>
      <?php endforeach ?>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Alternative</div>
      <?php foreach(mysqli_fetch_all($results3,MYSQL_ASSOC) as $row3): ?>
        <a href="track.php?track=<?=$row3['track']?>">
          <li class="list-group-item"><?=$row3['track']?></li>
        </a>
      <?php endforeach ?>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Pop</div>
      <?php foreach(mysqli_fetch_all($results4,MYSQL_ASSOC) as $row4): ?>
        <a href="track.php?track=<?=$row4['track']?>">
          <li class="list-group-item"><?=$row4['track']?></li>
        </a>
      <?php endforeach ?>
    </div>
  </div>

  <div class="col-md-3">
    <div class="panel panel-info">
      <div class="panel-heading">Indie</div>
      <?php foreach(mysqli_fetch_all($results5,MYSQL_ASSOC) as $row5): ?>
        <a href="track.php?track=<?=$row5['track']?>">
          <li class="list-group-item name-inline2"><?=$row5['track']?></li>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</div>
</body>
</html>