<!DOCTYPE html>
<html>
<body>
<div class="head-bar">
  <a href="/albums"><h3>Top Albums</h3></a>
  <hr>
</div>
<?php
  $sql1 = "SELECT name, artist, image FROM album 
          ORDER BY listeners DESC LIMIT 6";
  $results1 = mysqli_query($conn, $sql1);
?>

<div class="row">
  <?php foreach(mysqli_fetch_all($results1,MYSQL_ASSOC) as $row1) { ?>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href='#'> <img src=<?=$row1['image']?>> </a>
        <div class="caption">
          <div class="name-inline"> <?=$row1['name']?> </div>
          <i><div class="name-inline"> <?=$row1['artist']?> </div></i>
        </div>
      </div>
    </div>  
  <?php } ?>
</div>
</body>
</html>