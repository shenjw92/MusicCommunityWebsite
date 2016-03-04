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
	
	<script>
function showHint(str) {
     if (str.length == 0) { 
         document.getElementById("txtHint").innerHTML = "";
         return;
     } else {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
             }
         }
         xmlhttp.open("GET", "gethint.php?q="+str, true);
         xmlhttp.send();
     }
}

function IfMixedCase(password)
{
if(password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
return true;
else
return false;
}


	function IfSpecialChars(password)
{
if(password.match(/.[!,@,#,$,%,^,&,*]/))
return true;
else
return false;
}
	
function IsEnoughSafe(password)
{
	if (password.length<6)
	{   
		password_verif= "<b><font style='color:red'>Too Short</font></b>";
	}
    else if (!IfMixedCase(password)&&password.length>=6)
	password_verif= "<b><font style='color:orange'>Fair</font></b>";
	else if (!IfSpecialChars(password)&&IfMixedCase(password)&&password.length>=6)
	password_verif= "<b><font style='color:blue'>Good</font></b>";
	else if (IfSpecialChars(password)&&IfMixedCase(password)&&password.length>=6)
	password_verif= "<b><font style='color:green'>Strong</font></b>";

	document.getElementById('password_veri').innerHTML = password_verif;
	
}

     var repassword_verif;
	function IfMatch(password, repassword)
{
	if (password != repassword)
	{   repassword_verif= "<b><font style='color:red'>Password doesn't match.</font></b>";
		}
    else 
	repassword_verif= "<b><font style='color:green'>Qulified</font></b>";
	
		document.getElementById('repassword_veri').innerHTML = repassword_verif;
}
  
</script>
</head>
<body class="templatemo-bg-gray">
	<h1 class="margin-bottom-15">Create Account</h1>
	<div class="container">
		<div class="col-md-12">			
			<form class="form-horizontal templatemo-create-account templatemo-container" role="form" action="./Service/signup_cfg.php" method="post">
				<div class="form-inner">
					<div class="form-group">
			          <div class="col-md-6">		          	
			            <label for="username" class="control-label">Username</label>
			            <input type="text" name="username" class="form-control" id="username" placeholder="" onkeyup="showHint(this.value)"><p><span id="txtHint"></span></p>		            		            		            
			          </div>  
			          <div class="col-md-6">		          	
			            <label for="nickname" class="control-label">Nickname</label>
			            <input type="text" name="nickname" class="form-control" id="nickname" placeholder="">		            		            		            
			          </div>             
			        </div>
			        <div class="col-md-6 templatemo-radio-group">
			          	<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios1" value="User"> User
		          		</label>
		          		<label class="radio-inline">
		          			<input type="radio" name="optionsRadios" id="optionsRadios2" value="Artist"> Artist
		          		</label>
			          </div>             
			        </div>			      		
			        <div class="form-group">
			          <div class="col-md-6">
			            <label for="password" class="control-label">Password</label>
			            <input type="password" name="password" class="form-control" id="password" placeholder="" onkeyup="IsEnoughSafe(this.value);">
			            <div id='password_veri'></div>
			          </div>
			          <div class="col-md-6">
			            <label for="password" class="control-label">Confirm Password</label>
			            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="" onkeyup="IfMatch(password.value, this.value);">
			            <div id='repassword_veri'></div>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <label><input type="checkbox" name="checkbox" id="checkbox">I agree to the <a href="javascript:;" data-toggle="modal" data-target="#templatemo_modal">Terms of Service</a> and <a href="#">Privacy Policy.</a></label>
			          </div>
			        </div>
			        <div class="form-group">
			          <div class="col-md-12">
			            <input type="submit" value="Create account" class="btn btn-info">
			            <a href="login.php" class="pull-right">Login</a>
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