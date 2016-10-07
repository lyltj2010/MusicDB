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
  <?php foreach(mysqli_fetch_all($results1,MYSQL_ASSOC) as $row1): ?>
    <div class="col-md-2">
      <div class="thumbnail">
        <a href="album.php?album=<?=$row1['name']?>">
          <img src="<?=$row1['image']?>"> 
        </a>
        <div class="caption">
          <div class="name-inline">
            <a href="album.php?album=<?=$row1['name']?>">
              <?=$row1['name']?>
            </a>
          </div>
          <i>
            <div class="name-inline">
              <a href="artist.php?artist=<?=$row1['artist']?>">
                <?=$row1['artist']?>
              </a>
            </div>
          </i>
        </div>
      </div>
    </div>  
  <?php endforeach ?>
</div>
</body>
</html>