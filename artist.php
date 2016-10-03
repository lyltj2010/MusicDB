<!DOCTYPE html>
<html>
<head>
  <title>Artist</title>
  <?php include 'includes/head.html' ?>
</head>
<body>
  <?php
    function getRecords($sql) {
      include 'resources/config.php';
      $conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
      $results = mysqli_query($conn,$sql);
      return $results;
    }

    $sql = "SELECT name, mbid_artist AS mbid FROM artist WHERE name=\"{$_GET['artist']}\"";
    $results = getRecords($sql);
    $row = mysqli_fetch_assoc($results);
  ?>

  <div class="container">
    <?php include 'includes/header.php' ?>
    <div class="col-md-2">
      
    </div>

    <div class="col-md-10">
      <div class="col-md-10 thumbnail">
        <img class="cover" src="/assets/img/coldplay.png">
      </div>
      
      <div class="col-md-6 top-track">
        <?php
          $sql_track = "SELECT name FROM track WHERE mbid_artist='{$row['mbid']}' LIMIT 10";
          $rst_track = getRecords($sql_track);
        ?>
        <?php foreach(mysqli_fetch_all($rst_track,MYSQL_ASSOC) as $row_track): ?>
          <?php echo $row_track['name'] ?>
          <?php echo "<br>" ?>
        <?php endforeach ?>
      </div>

      <div class="col-md-6 top-album">
        <?php
          $sql_album = "SELECT name FROM album WHERE mbid_artist='{$row['mbid']}'";
          $rst_album = getRecords($sql_album);
        ?>
        <?php foreach(mysqli_fetch_all($rst_album,MYSQL_ASSOC) as $row_album): ?>
          <?php echo $row_album['name'] ?>
          <?php echo "<br>" ?>
        <?php endforeach ?>
      </div>

    </div>
    <?php include 'includes/footer.php' ?>
  </div>
</body>
</html>
