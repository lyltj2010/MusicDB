<!DOCTYPE html>
<html>
<head>
  <title>Artist</title>
  <?php include 'includes/head.html' ?>
</head>
<body>

<div class="container">
  <?php include 'includes/header.php' ?>
  <?php include 'utils/artist_util.php' ?>
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <img src="<?=$artist['image']?>">
        </div>
        <div class="col-md-7">
          <br>
          <h4><?=$artist['name']?></h4>
          <span><b>Link:&nbsp;</b>
            <a href="<?=$artist['url']?>">More info</a>
          </span><br>
          <span><b>Listeners:&nbsp;</b><?=$artist['listeners']?></span><br>
          <span><b>Playcount:&nbsp;</b><?=$artist['playcount']?></span><br>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>
  <br>

  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-5">
      <table class="table">
        <thead>
          <th>Track Name</th>
          <th>Duration</th>
        </thead>
        <tbody>
          <?php foreach(get_top_tracks($artist['mbid_artist']) as $track): ?>
            <tr>
              <td>
                <a href="track.php?track=<?=$track['name']?>">
                  <?=$track['name']?>
                </a>
              </td>
              <td><?=gmdate("i:s",$track['duration']/1000)?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>

    <div class="col-md-5">
      <table class="table">
        <thead>
          <th>Album Name</th>
          <th>Published</th>
        </thead>
        <tbody>
          <?php foreach(get_albums($artist['mbid_artist']) as $album): ?>
            <tr>
              <td>
                <a href="album.php?album=<?=$album['name']?>">
                  <?=$album['name']?>
                </a>
              </td>
              <td><?=$album['date(published)']?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-1"></div>
  </div>
  
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
