<!DOCTYPE html>
<html>
<head>
  <title>Tracks</title>
  <?php include 'includes/head.html' ?>
</head>
<body>
  <?php
    include 'resources/config.php';
    $conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);

    $sql_tag = "SELECT DISTINCT tag, ROUND(avg(listeners)) FROM track_tag
    			GROUP BY tag ORDER BY AVG(listeners) DESC";
    $rst_tag = mysqli_query($conn, $sql_tag);
    
    $sql_rock = "SELECT track FROM track_tag 
    			WHERE tag='rock' ORDER BY listeners DESC LIMIT 25";
    $rst_rock = mysqli_query($conn, $sql_rock);

    $sql_pop = "SELECT track FROM track_tag 
    			WHERE tag='pop' ORDER BY listeners DESC LIMIT 25";
    $rst_pop = mysqli_query($conn, $sql_pop);

    $sql_indie = "SELECT track FROM track_tag 
    			WHERE tag='indie' ORDER BY listeners DESC LIMIT 25";
    $rst_indie = mysqli_query($conn, $sql_indie);
  ?>
  
  <div class="container">
    <?php include 'includes/header.php' ?>
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <b class="list-group-item">All Artists</b>
          <?php foreach(mysqli_fetch_all($rst_tag,MYSQL_ASSOC) as $row_tag): ?>
            <a href="artist.php?artist=<?=$row_tag['tag']?>" class="list-group-item">
              <?= ucfirst($row_tag['tag'])?> 
            </a>
          <?php endforeach ?>
        </div>
      </div>

      <div class="col-md-10">
		  <div class="col-md-4">
		    <div class="panel panel-info">
		      <div class="panel-heading">Rock</div>
		      <?php foreach(mysqli_fetch_all($rst_rock,MYSQL_ASSOC) as $row_rock): ?>
		        <li class="list-group-item"><?=$row_rock['track']?></li>
		      <?php endforeach ?>
		    </div>
		  </div>

		  <div class="col-md-4">
		    <div class="panel panel-info">
		      <div class="panel-heading">Pop</div>
		      <?php foreach(mysqli_fetch_all($rst_pop,MYSQL_ASSOC) as $row_pop): ?>
		        <li class="list-group-item"><?=$row_pop['track']?></li>
		      <?php endforeach ?>
		    </div>
		  </div>

		  <div class="col-md-4">
		    <div class="panel panel-info">
		      <div class="panel-heading">Indie</div>
		      <?php foreach(mysqli_fetch_all($rst_indie,MYSQL_ASSOC) as $row_indie): ?>
		        <li class="list-group-item"><?=$row_indie['track']?></li>
		      <?php endforeach ?>
		    </div>
		  </div>
      </div>

    <?php include 'includes/footer.php' ?>
  </div>

  <?php mysqli_close($conn) ?>
</body>
</html>