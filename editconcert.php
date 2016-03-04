<?php 
include ("./Util/DButil.php");

$stmt = $dbh->prepare("SELECT * FROM concert where concertID = ?");
$stmt->bindParam(1, $_GET["concertID"]);
$stmt->execute();
$row = $stmt->fetch();


if (is_uploaded_file($_FILES['upfile']['tmp_name'])){

	$upfile=$_FILES["upfile"];
	$name = $_SESSION[username]."_".$upfile["name"];
	$type = $upfile["type"];
	$size = $upfile["size"];
	$tmp_name = $upfile["tmp_name"];
	$error = $upfile["error"];
	switch ($type) {
		case 'image/pjpeg' : $ok=1;
		break;
		case 'image/jpeg' : $ok=1;
		break;
		case 'image/gif' : $ok=1;
		break;
		case 'image/png' : $ok=1;
		break;
		case 'image/jpg' : $ok=1;
	}
	if($ok && $error=='0'){
		move_uploaded_file($tmp_name,'album/'.$name);
		$stmt = $dbh->prepare("Update concert set cimgurl= ? where concertID = ?");
		$name='album/'.$name;
		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $_GET["concertID"]);
		$stmt->execute();
		echo "<script language=\"javascript\">location.href='editconcert.php?concertID=$_GET[concertID]';</script>";
	}
}
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
	<h1 class="margin-bottom-15">Edit Concert</h1>
	<div class="container">
		<div class="col-md-12">

				<div class="form-inner">
					<div class="form-group">
							<div class="col-md-6">
							<label for="username" class="control-label">Concert Image</label> 
							<?php if($row[cimgurl] != null){ ?>
							<p>
								<img src="<?=$row[cimgurl] ?>" style="width: 180px; height: 110px;"></img>
							</p>
							<?php 
							}else{
							?>
							<p>
								<img src="./userface/3_17.png"></img>
							</p>
							<?php
							}
							?>
							<form name="form1" action="" method="post"
								onsubmit="return CheckPost()" enctype="multipart/form-data">
								<input name="upfile" type="file"><br> <input type="submit"
									value="Upload">
							</form>
						    </div>
						    </br>
							<form
				class="form-horizontal templatemo-create-account templatemo-container"
				role="form" action="./Service/editconcert_cfg.php?concertID=<?=$_GET["concertID"] ?>" method="post">
						<div class="col-md-6">
							<label for="username" class="control-label">Concert Name</label>
							<input type="text" name="concertname" class="form-control"
								id="concertname" placeholder="" value="<?=$row[concertname] ?>">
						</div>
						<div class="col-md-6">
							<label for="username" class="control-label">Info</label> <input
								type="text" name="info" class="form-control" id="info"
								placeholder="" value="<?=$row[info] ?>">
						</div>
						<div class="col-md-6">
							<label for="username" class="control-label">Concert Time</label>
							<input type="text" name="concerttime" class="form-control"
								id="concerttime" placeholder="" value="<?=$row[concerttime] ?>">
						</div>
						<div class="col-md-6">
							<label for="price" class="control-label">Price</label> <input
								type="text" name="price" class="form-control" id="price"
								placeholder="" value="<?=$row[price] ?>">
						</div>
						<div class="col-md-6">
							<label for="username" class="control-label">Availability</label>
							<input type="text" name="availability" class="form-control"
								id="availability" placeholder=""
								value="<?=$row[availability] ?>">
						</div>
						<div class="col-md-6">
							<label for="username" class="control-label">Ticket Link</label> <input
								type="text" name="ticketlink" class="form-control" id="ticketlink"
								placeholder="" value="<?=$row[ticketlink] ?>">
						</div>
			
						<div class="col-md-6">
							<label for="username" class="control-label">Location</label> 
						<select name="venueid">
							<?php 
								$stmt2 = $dbh->prepare("SELECT * FROM venue where venueid = ?");
								$stmt2->bindParam(1, $row[venueid]);
								$stmt2->execute();
								$row2 = $stmt2->fetch();
							?>
							<option value="<?=$row2[venueid] ?>"><?=$row2[address] ?>,<?=$row2[city] ?>,<?=$row2[state] ?></option>
							<?php 
								$stmt3 = $dbh->prepare("SELECT * FROM venue");
								$stmt3->execute();
								while ($row3 = $stmt3->fetch()){
							?>
	  						 <option value="<?=$row3[venueid] ?>"><?=$row3[address] ?>,<?=$row3[city] ?>,<?=$row3[state] ?></option>
	  						 <?php 
								}
	  						 ?>
						</select>
						</div>

					</div>
				</div>

				<div class="form-group">
					<div class="col-md-12">
						<input type="submit" value="Apply" class="btn btn-info"> <a
							href="login.php" class="pull-right">Cancel</a>
					</div>
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
