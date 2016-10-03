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
  <?php foreach(mysqli_fetch_all($results,MYSQL_ASSOC) as $row) { ?>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href=<?=$row['url']?>> <img src=<?=$row['image']?>> </a>
        <div class="caption">
          <p><a href=<?=$row['url']?>> <?=$row['name']?> </a></p>
        </div>
      </div>
    </div>  
  <?php } ?>
</div>
</body>
</html>
