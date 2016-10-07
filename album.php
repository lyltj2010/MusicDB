<!DOCTYPE html>
<html>
<head>
  <title>Album</title>
  <?php include 'includes/head.html' ?>
</head>
<body>

<div class="container">
  <?php include 'includes/header.php' ?>
  <?php include 'utils/album_util.php' ?>
  <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <img src="<?=$album[image]?>">
        </div>
        <div class="col-md-7">
          <br>
          <h4><?=$album['name']?></h4>
          <span><b>Artist:&nbsp;</b>
            <a href="artist.php?artist=<?=$album['artist']?>"><?=$album['artist']?></a>
          </span><br>
          <span><b>Published:&nbsp;</b>
            <?=$album['date(published)']?>
          </span><br>
          <span><b>Listeners:&nbsp;</b><?=$album['listeners']?></span><br>
          <span><b>Playcount:&nbsp;</b><?=$album['playcount']?></span><br>
        </div>
      </div>
    </div>
    <div class="col-md-1"></div>
  </div>

  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7">
      <table class="table">
        <thead>
          <th>Name</th>
          <th>Duration</th>
          <th>Playcount</th>
        </thead>
        <tbody>
          <?php foreach(get_tracks($album['name']) as $track): ?>
            <tr>
              <td>
                <a href="track.php?track=<?=get_track($track['name'])['name']?>">
                  <?=get_track($track['name'])['name']?>
                </a>
              </td>
              <td><?=gmdate("i:s",get_track($track['name'])['duration']/1000)?></td>
              <td><?=get_track($track['name'])['playcount']?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="col-md-3"></div>
  </div>
  
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
