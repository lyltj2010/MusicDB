<!DOCTYPE html>
<html>
<head>
  <title>Tracks</title>
  <?php include 'includes/head.html' ?>
</head>
<body>
  <div class="container">
    <?php include 'includes/header.php' ?>
    <?php include 'utils/tracks_util.php' ?>

    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <b class="list-group-item">All Tags</b>
          <ul class="side-bar-list">
          <?php foreach(mysqli_fetch_all($rst_tag,MYSQL_ASSOC) as $row_tag): ?>
            <li>
              <a href="artist.php?artist=<?=$row_tag['tag']?>" class="list-group-item">
                <?= ucfirst($row_tag['tag'])?> 
              </a>
            </li>
          <?php endforeach ?>
          <button id="show-button">Show More...</button>
          </ul>
        </div>
      </div>

      <div class="col-md-10">
        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading">Rock</div>
            <ul class="list-group">
              <?php foreach(mysqli_fetch_all($rst_rock,MYSQL_ASSOC) as $row_rock): ?>
                <li class="list-group-item">
                  <a href="track.php?track=<?=$row_rock['track']?>">
                    <?=$row_rock['track']?>
                    <span class="badge pull-right">
                      <?=getTrack($row_rock['track'])['listeners']?>
                    </span>
                  </a> 
                </li>
              <?php endforeach ?>  
            </ul>
          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading">Pop</div>
            <ul class="list-group">
              <?php foreach(mysqli_fetch_all($rst_pop,MYSQL_ASSOC) as $row_pop): ?>
                <li class="list-group-item">
                  <a href="track.php?track=<?=$row_pop['track']?>">
                    <?=$row_pop['track']?>
                    <span class="badge pull-right">
                      <?=getTrack($row_pop['track'])['listeners']?>
                    </span>
                  </a> 
                </li>
              <?php endforeach ?>  
            </ul>
          </div>
        </div>

        <div class="col-md-4">
          <div class="panel panel-info">
            <div class="panel-heading">Indie</div>
            <ul class="list-group">
              <?php foreach(mysqli_fetch_all($rst_indie,MYSQL_ASSOC) as $row_indie): ?>
                <li class="list-group-item">
                  <a href="track.php?track=<?=$row_indie['track']?>">
                    <?=$row_indie['track']?>
                    <span class="badge pull-right">
                      <?=getTrack($row_indie['track'])['listeners']?>
                    </span>
                  </a> 
                </li>
              <?php endforeach ?>  
            </ul>
          </div>
        </div>
  </div>
<?php include 'includes/footer.php' ?>
</body>
</html>