<?php 
include ("./Util/DButil.php");

if ($_GET["delete"] != null){
	$stmt = $dbh->prepare("Delete FROM attend where username = ? and concertID= ?");
	$stmt->bindParam(1, $_GET["delete"]);
	$stmt->bindParam(2, $_GET["concertID"]);
	$stmt->execute();

}

if ($_GET["add"] != null){
	if ($_GET["add"] == $_SESSION["username"]){
	
	}else{
	$stmt = $dbh->prepare("INSERT INTO attend(username,concertID) VALUES(?,?)");
	$stmt->bindParam(1, $_GET["add"]);
	$stmt->bindParam(2, $_GET["concertID"]);
	$stmt->execute();
	}
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
	<h1 class="margin-bottom-15">Artist Attend</h1>
	<div class="container">
		<div class="col-md-12">
			<form
				class="form-horizontal templatemo-create-account templatemo-container"
				role="form" action="./editconcerta.php?concertID=<?=$_GET[concertID]?>" method="post">
				<div class="form-inner">
					<div class="form-group">
						<div class="col-md-6">
							<label for="username" class="control-label">Artist ID</label></br>
							<?php 
			                $stmt = $dbh->prepare("SELECT * FROM attend where concertID = ?");
			                $stmt->bindParam(1, $_GET["concertID"]);
			                $stmt->execute();
							while($row = $stmt->fetch()){
								echo $row["username"];
								?>
							<img src="./images/error.gif"
								onclick="location='editconcerta.php?delete=<?=$row["username"] ?>&concertID=<?=$_GET["concertID"] ?>'"></img>
							<?php 
							echo "</br>";
							}
							?>
						</div>

						<div class="col-md-6">
							<label for="nickname" class="control-label">Artist Name</label> <input
								type="text" name="name" class="form-control" id="name"
								placeholder="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" value="Search" class="btn btn-info">
					</div>
				</div>

				<?php 
				
				if ($_POST["name"]!=null){
					$stmt = $dbh->prepare("SELECT * from artist where username = ?");
					$stmt->bindParam(1, $_SESSION[username]);
					$stmt->execute();
					while ($row = $stmt->fetch()){
						echo "Yourself: ";
						echo $row[0];
						?>
						<img src="./images/35.png" style="width:18px; height:18px;"
							onclick="location='editconcerta.php?add=<?=$row[0] ?>&concertID=<?=$_GET["concertID"] ?>'"></img>
						<?php 
						echo "</br>";
						echo "</br>";
 					}					
					
					$stmt = $dbh->prepare("SELECT * from artist where name like ? and permission = 1");
					$name ="%" . $_POST["name"]. "%";
					$stmt->bindParam(1, $name);
					$stmt->execute();
					while ($row = $stmt->fetch()){
						echo "User Name: ";
						echo $row[0];
						echo "&nbsp;&nbsp;Name: ";
						echo $row[1];
						?>
						<img src="./images/35.png" style="width:18px; height:18px;"
							onclick="location='editconcerta.php?add=<?=$row[0] ?>&concertID=<?=$_GET["concertID"] ?>'"></img>
						<?php 
						echo "</br>";
					}
				}
				?>
		
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
