<!DOCTYPE html>
<html>
<head>
  <title>Artists</title>
  <?php include 'includes/head.html' ?>
</head>
<body>
  <?php
    include 'resources/config.php';
    $conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
    $sql_list = "SELECT name FROM artist ORDER BY name";
    $sql_img = "SELECT name, image FROM artist ORDER BY listeners DESC";
    $rst_list = mysqli_query($conn, $sql_list);
    $rst_img = mysqli_query($conn, $sql_img);
  ?>
  
  <div class="container">
    <?php include 'includes/header.php' ?>
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <b class="list-group-item">All Artists</b>
          <?php foreach(mysqli_fetch_all($rst_list,MYSQL_ASSOC) as $row_list): ?>
            <a href="artist.php?artist=<?=$row_list['name']?>" class="list-group-item">
              <?= $row_list['name']?> 
            </a>
          <?php endforeach ?>
        </div>
      </div>

      <div class="col-md-10">
        <?php foreach (mysqli_fetch_all($rst_img,MYSQL_ASSOC) as $row_img): ?>
        <div class="col-md-2">
          <div class="thumbnail">
            <a href="artist.php?artist=<?=$row_img['name']?>">
              <img src=<?=$row_img['image']?>>
            </a>   
          </div>
        </div> 
        <?php endforeach ?> 
      </div>
    </div>
    <?php include 'includes/footer.php' ?>
  </div>

  <?php mysqli_close($conn) ?>
</body>
</html>