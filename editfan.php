<?php 
include ("./Util/DButil.php");

if ($_GET["delete"] != null){

	$stmt = $dbh->prepare("Delete FROM fan where username = ? and fausername= ?");
	$stmt->bindParam(1, $_SESSION["username"]);
	$stmt->bindParam(2, $_GET["delete"]);
	$stmt->execute();

}


$stmt = $dbh->prepare("SELECT * FROM user where username = ?");
$stmt->bindParam(1, $_SESSION["username"]);
$stmt->execute();
$row = $stmt->fetch();

?>
<!DOCTYPE html>
<head>
<title>Create Account</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-theme.min.css" rel="stylesheet"
	type="text/css">
<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Edit Your Favorite Artist</h1>
	<div class="container">
		<div class="col-md-12">
			<form
				class="form-horizontal templatemo-create-account templatemo-container"
				role="form" action="./editfan.php" method="post">
				<div class="form-inner">
					<div class="form-group">
						<div class="col-md-6">
							<label for="username" class="control-label">Your Favourite Artists</label></br>
							<?php 
             				$stmt = $dbh->prepare("SELECT * FROM fan, artist where fan.username = ? and fan.fausername = artist.username");
              				$stmt->bindParam(1, $_SESSION["username"]);
               				$stmt->execute();
							while($row = $stmt->fetch()){
								echo $row["name"];
								?>
							<img src="./images/error.gif"
								onclick="location='editfan.php?delete=<?=$row["username"] ?>'"></img>
							<?php 
							echo "</br>";
							}
							?>
						</div>

		
		</div>
		</form>
	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
				</div>
				<div class="modal-body">
					<p>
						This form is provided by <a rel="nofollow"
							href="http://www.cssmoban.com/page/1">Free HTML5 Templates</a>
						that can be used for your websites. Cras mattis consectetur purus
						sit amet fermentum. Cras justo odio, dapibus ac facilisis in,
						egestas eget quam. Morbi leo risus, porta ac consectetur ac,
						vestibulum at eros.
					</p>
					<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur
						et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
						auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent
						commodo cursus magna, vel scelerisque nisl consectetur et. Donec
						sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.
						Cras mattis consectetur purus sit amet fermentum. Cras justo odio,
						dapibus ac facilisis in, egestas eget quam.</p>
					<p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
						Praesent commodo cursus magna, vel scelerisque nisl consectetur
						et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor
						auctor.</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
