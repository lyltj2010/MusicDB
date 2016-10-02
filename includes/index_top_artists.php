<!DOCTYPE html>
<html>
<body>

<div class="container">
	<div class="head-bar">
	</div>
	
	<?php
		$sql = "SELECT name, url, image FROM artist 
						ORDER BY listeners DESC LIMIT 4";
		$results = mysqli_query($conn, $sql);
	?>

	<div class="row">
		<div class="col-md-2"></div>
		<?php foreach(mysqli_fetch_all($results,MYSQL_ASSOC) as $row) { ?>
			<div class="col-md-2">
				<div class="thumbnail">
					<a href=<?=$row['url']?>> <img src=<?=$row['image']?>> </a>
					<div class="caption">
						<p><a href=<?=$row['url']?>> <?=$row['name']?> </a></p>
					</div>
				</div>
			</div>	
		<?php } ?>
	</div>
</div>
</body>
</html>
