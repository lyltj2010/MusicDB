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

    $sql = "SELECT name, mbid_album AS mbid FROM album WHERE name=\"{$_GET['album']}\"";
    $results = getRecords($sql);
    $row = mysqli_fetch_assoc($results);
  ?>

  <div class="container">
    <?php include 'includes/header.php' ?>
    <div class="col-md-2"></div>

    <div class="col-md-10">
      <div class="col-md-10 thumbnail">
        <img class="cover" src="/assets/img/coldplay.png">
      </div>
      
      <div class="col-md-6">
        <?php
          $sql_track = "SELECT name FROM track WHERE mbid_album='{$row['mbid']}'";
          $rst_track = getRecords($sql_track);
        ?>
        <?php foreach(mysqli_fetch_all($rst_track,MYSQL_ASSOC) as $row_track): ?>
          <?php echo $row_track['name'] ?>
          <?php echo "<br>" ?>
        <?php endforeach ?>
      </div>
    </div>
    <?php include 'includes/footer.php' ?>
  </div>
</body>
</html>
