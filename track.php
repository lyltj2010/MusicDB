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
    <div class="col-md-1"></div>

    <div class="col-md-10">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
          <img src="<?=get_img($track['album'])['image']?>">
        </div>
        <div class="col-md-7">
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
    </div>

    <div class="col-md-1"></div>
  </div>

  <!-- comment -->
  <!-- <div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form>
          <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea class="form-control" rows="2" id="comment"></textarea>
          </div>
        </form>
      </div> 
    </div>
    <div class="col-md-1"></div>  
  </div> -->
</div>
<?php include 'includes/footer.php' ?>
</body>
</html>
