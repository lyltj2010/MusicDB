<!DOCTYPE html>
<html>
<body>
<div class="container">
	<div class="head-bar">
	</div>
	<?php
		$sql1 = "SELECT name, image FROM album 
						ORDER BY listeners DESC LIMIT 4";
		$results1 = mysqli_query($conn, $sql1);
	?>

	<div class="row">
		<div class="col-md-2"></div>
		<?php foreach(mysqli_fetch_all($results1,MYSQL_ASSOC) as $row1) { ?>
			<div class="col-md-2">
				<div class="thumbnail">
					<a href='#'> <img src=<?=$row1['image']?>> </a>
					<div class="caption">
						<span style="width:10px"> <?=$row1['name']?> </span>
					</div>
				</div>
			</div>	
		<?php } ?>
	</div>
</div>	
</body>
</html>