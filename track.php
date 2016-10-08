<!DOCTYPE html>
<html>
<head>
  <title>Track</title>
  <?php include 'includes/head.html' ?>
</head>
<body>

<div class="container">
  <?php include 'includes/header.php' ?>
  <?php include 'utils/track_util.php' ?>
  <div class="row">
        <div class="col-md-2 col-md-offset-2"></div>
        <div class="col-md-2">
          <img src="<?=get_img($track['album'])['image']?>">
        </div>

        <div class="col-md-4">
          <br>
          <h4><a href="<?=$track['url']?>"><?=$track['name']?></a></h4>
          <span><b>Artist:&nbsp;</b>
            <a href="artist.php?artist=<?=$track['artist']?>"><?=$track['artist']?></a>
          </span><br>
          <span><b>Album:&nbsp;</b>
            <a href="album.php?album=<?=$track['album']?>"><?=$track['album']?></a>
          </span><br>
          <span><b>Listeners:&nbsp;</b><?=$track['listeners']?></span><br>
          <span><b>Playcount:&nbsp;</b><?=$track['playcount']?></span><br>
        </div>

  </div>

  <div class="row">
    <div class="col-md-1 col-md-offset-2"></div>
    <div class="col-md-6">
      <form action="" method="POST">
        <div class="form-group">
          <label for="comment">Comment:</label>
          <textarea class="form-control" rows="2" name="comment"></textarea>
          <input type="hidden" name="mbid_track" value="<?=$track['mbid_track']?>">
          <input type="submit" name="submit" class="pull-right">
        </div>
      </form>
    </div>
  </div>

  <div class="row">
    <div class="col-md-1 col-md-offset-2"></div>
    <div class="col-md-6">
      <?php
      if(isset($_POST['submit'])){
        include 'resources/config.php';
        $comment = $_POST['comment'];
        $mbid_track = $_POST['mbid_track'];

        $conn = mysqli_connect($db_server, $db_user, $db_passwd, $db_name);
        $sql_insert = "INSERT INTO comment(content,track)
                       VALUES (\"$comment\",\"$mbid_track\")";
        mysqli_query($conn, $sql_insert);
        mysqli_close($conn);
      }
      ?>
      
      <?php $comments=get_comments($track['mbid_track']) ?>
      <?php foreach ($comments as $comment): ?>
        <p><?=$comment['content']?> </p>
      <?php endforeach ?>
    </div>
  </div>

</div>
</body>

</html>
