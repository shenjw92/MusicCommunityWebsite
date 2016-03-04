<!DOCTYPE html>
<?php 
session_start();
$error = $_GET["error"];

echo $_COOKIE['UserName'];
?>
<head>
	<title>Login One</title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
	<link href="css/templatemo_style.css" rel="stylesheet" type="text/css">	
</head>
<body class="templatemo-bg-gray">
	<div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Mzone Login</h1>
			<form class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form" action="./Service/login_cfg.php?error=<?=$error ?>" method="post">				
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="username" class="control-label fa-label"><i class="fa fa-user fa-medium"></i></label>
		            	<input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?=$_COOKIE['UserName'] ?>">
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fa fa-lock fa-medium"></i></label>
		            	<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?=$_COOKIE['Password'] ?>">
		            </div>
		          </div>
		        </div>
		        <?php if ($_GET[error]!=null){?>
	        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<input type="text"  name='yzm' id='yzm' style="width:50px;"/>
              <img src="code.php" style="position:absmiddle;top:5px;cursor:pointer;height:20px;" onclick="javascript:this.src='code.php?tm='+Math.random()" />
		            </div>
		          </div>
		        </div>		        
		        <?php }?>
		        
		        
		        <?php 
		        if($error!=null){
		        ?>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<?php 
		            	if ($error== 0){
		            	?>
		            		Username Exist
		            	<?php 
		            	}else if($error == 3){
		            		echo "<script language=\"javascript\">window.close();</script>";
		            	}else{
		            	?>
		            		The username or password you entered is incorrect.
		            	<?php 
		            	}
		            	?>
		            </div>
		          </div>
		        </div>
		        <?php } ?>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
	                	<label>
	                  		<input type="checkbox" name="checkbox" id="checkbox" checked="checked"> Remember me
                		</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Log in" class="btn btn-info">
		          		<a href="forgot-password.html" class="text-right pull-right">Forgot password?</a>
		          	</div>
		          </div>
		        </div>
		        <hr>
		        <div class="form-group">
		        	<div class="col-md-12">
		        		<label>Login with: </label>
		        		<div class="inline-block">
		        			<a href="#"><i class="fa fa-facebook-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-twitter-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-google-plus-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-tumblr-square login-with"></i></a>
			        		<a href="#"><i class="fa fa-github-square login-with"></i></a>
		        		</div>		        		
		        	</div>
		        </div>
		      </form>
		      <div class="text-center">
		      	<a href="create-account.php" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>
</body>
</html>