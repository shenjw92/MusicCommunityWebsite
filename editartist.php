<?php 
include ("./Util/DButil.php");

$stmt = $dbh->prepare("SELECT * FROM artist where username = ?");
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
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Edit Your Profile</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="./Service/editartist_cfg.php" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="username" class="control-label">Name</label>
			            <input type="text" name="Name" class="form-control" id="Name" placeholder="" value="<?=$row[name] ?>">		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="nickname" class="control-label">Weblink</label>
			            <input type="text" name="Weblink" class="form-control" id="Weblink" placeholder="" value="<?=$row[weblink] ?>">		            		            		            
			          </div> 
	 
			          <div class="col-md-6 templatemo-radio-group">
			          Permission</br>
			          	<?php 
			          	if ( $row[permission] == 1 ){
			          	?>
			          	<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios1" value="1" checked="checked"> Yes
		          		</label>
		          		<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios2" value="0"> No
		          		</label>
		          		<?php 
			          	}else{
			          	?>
			          	<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios1" value="1" > Yes
		          		</label>
		          		<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios2" value="0" checked="checked"> No
		          		</label>			          	
			          	<?php 
			          	}
		          		
		          		?>
			          </div>          
			        </div>           
			        </div>			      		

			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="Apply" class="btn btn-info">
			            <a href="login.php" class="pull-right" >Cancel</a>
			          </div>
			        </div>	
				</div>				    	
		      </form>		      
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="templatemo_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="myModalLabel">Terms of Service</h4>
	      </div>
	      <div class="modal-body">
	      	<p>This form is provided by <a rel="nofollow" href="http://www.cssmoban.com/page/1">Free HTML5 Templates</a> that can be used for your websites. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
	        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla. Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
	        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
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