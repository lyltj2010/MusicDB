<!DOCTYPE html>
<html>
<body>
<div class="head-bar">
  <a href="/artists"><h3>Top Artists</h3> </a>
  <hr>
</div>

<?php
  $sql = "SELECT name, url, image FROM artist 
          ORDER BY listeners DESC LIMIT 12";
  $results = mysqli_query($conn, $sql);
?>

<div class="row">
  <?php foreach(mysqli_fetch_all($results,MYSQL_ASSOC) as $row): ?>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href="artist.php?artist=<?=$row['name']?>">
          <img src=<?=$row['image']?>>
        </a>
        <div class="caption">
          <a href="artist.php?artist=<?=$row['name']?>"> 
            <?=$row['name']?> 
          </a>
        </div>
      </div>
    </div>  
  <?php endforeach ?>
</div>
</body>
</html>
