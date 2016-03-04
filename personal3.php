<?php 
include ("./Util/DButil.php");
$stmt = $dbh->prepare("SELECT * FROM user where username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
$score = $row[score];



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
		$stmt = $dbh->prepare("Update user set imgurl= ? where username = ?");
		$name='album/'.$name;
		$stmt->bindParam(1, $name);
		$stmt->bindParam(2, $_GET["username"]);
		$stmt->execute();
		echo "<script language=\"javascript\">location.href='personal.php';</script>";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About, Secured Theme</title>
<meta name="keywords" content="about page, 4 columns, secured theme, free template, templatemo, red layout" />
<meta name="description" content="About Page, 4-column fixed layout, Secured Theme by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>

<link rel="stylesheet" type="text/css" href="css/ddsmoothmenu.css" />

<script type="text/javascript" src="js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "templatemo_menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}

</script>

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 


</head>
<body>

<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><a  href="http://www.cssmoban.com/">模板之家</a></div>
        <div id="templatemo_search">
            <form action="#" method="get">
              <input type="text" value="Enter a keyword" name="keyword" id="keyword" title="keyword" 
              		onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" />
            </form>
            <ul id="social">
                <li><a href="#" title="照片" class="social_other"  target="_blank"></a></li>
            	<li><a href="#"><img src="images/rss.png" alt="RSS" /></a></li>
                <li><a href="#/templatemo"><img src="images/facebook.png" alt="facebook" /></a></li>
                <li><a href="#"><img src="images/twitter.png" alt="twitter" /></a></li>
                <li><a href="#"><img src="images/flickr.png" alt="flickr" /></a></li>
                <li><a href="#"><img src="images/skype.png" alt="skype" /></a></li>
			</ul>
        </div>
    </div> <!-- END of header -->

         <div id="templatemo_menu" class="ddsmoothmenu">
<ul>
                 <li><a href="index.php" class="selected">Home</a></li>
                 <?php if ($_SESSION[level] != 1 && $_SESSION[level] != 3){?>
                <li><a href="concert.php">Concert</a></li>
                <li><a href="artists.php">Artist</a></li>
                <li><a href="recommend.php">Recommend</a></li>
                <?php }?>
                <?php 
                if ($_SESSION[username]==null){
                ?>
                	<li><a href="" onClick="window.open('login.php','','height=550,width=620,scrollbars=yes,status =yes')">Log In</a></li>
                	<li><a href="create-account.php">Sign Up</a></li>
                <?php 
                }else if($_SESSION[level] == 0){
                ?>
                	<li><a href="personal.php">Personal</a></li>
                	<li><a href="./Service/logout_cfg.php" >Log Out</a></li>
               	<?php
                }else if($_SESSION[level] == 3){
               	?>
                	<li><a href="personal2.php">Personal</a></li>
                	<li><a href="./Service/logout_cfg.php" >Log Out</a></li>
               	<?php
                }else if($_SESSION[level] == 1){
               	?>
                	<li><a href="manage.php">Manage</a></li>
                	<li><a href="./Service/logout_cfg.php" >Log Out</a></li>
               	<?php
                }
                ?>
                
              
                <li class="last"><a href="contact.html" class="last">Contact</a></li>
                 
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_main">
		<div class="content_wrapper content_mb_60">
            <div class="col_2">
                <h2><?=$row[username] ?></h2>
                <p>Name: <?=$row[name] ?></p>
                <p>Birth: <?=$row[birth] ?></br>City: <?=$row[city] ?></br>Email: <?=$row[email] ?></p>
                <p>Create Time: <?=$row[createtime] ?></br>Login Time: <?=$row[logintime] ?></p>
            </div>        
            <div class="col_2 no_margin_right">
                <h2>Face</h2>
                <?php if($row[imgurl] != null){ ?>
                <p><img src="<?=$row[imgurl] ?>" width="150px;"></img> </p>
		 		<?php 
				}else{
				?>
				<p><img src="./userface/3_17.png"></img> </p>
				<?php
				}
		 		?>
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="content_wrapper content_mb_60">
            <div class="col_4">
                <h3>Taste</h3>
                <ul class="list_bullet">
                <?php 
                $stmt = $dbh->prepare("SELECT * FROM taste, type where taste.username = ? and type.typeid = taste.typeid limit 0,3");
                $stmt->bindParam(1, $_GET["username"]);
                $stmt->execute();
                while($row = $stmt->fetch()){
                	echo "<li>";
 					echo $row["typename"];
 					echo "</li>";
                }
                ?>
                </ul>
            </div>  
            <form action="" method="post">
            <div class="col_34 no_margin_right">
                <h3>Recommend</h3>
                <p>
				   <a href="recommend3.php?username=<?=$_GET[username] ?>" class="more" >Go</a>
                </p>
            </div>
            </form>
            <div class="clear"></div>
        </div>
        
        <div class="content_wrapper">
            <div class="col_3">
                <h2>Favorite Artist</h2>
                <ul class="list_bullet">
                <?php 
                $stmt = $dbh->prepare("SELECT * FROM fan, artist where fan.username = ? and fan.fausername = artist.username limit 0,3");
                $stmt->bindParam(1, $_GET["username"]);
                $stmt->execute();
                while($row = $stmt->fetch()){
                	echo "<li>";
 					echo $row["name"];
 					echo "</li>";
                }
                ?>
                </ul>
            </div>
            
            <div class="col_3">
                <h2>Follow</h2>
                <ul class="list_bullet">
                <?php 
                $stmt = $dbh->prepare("SELECT * FROM follow where username = ? limit 0,3");
                $stmt->bindParam(1, $_GET["username"]);
                $stmt->execute();
                while($row = $stmt->fetch()){
                	echo "<li>";
 					echo $row["fousername"];
 					echo "&nbsp;&nbsp;&nbsp;";
 					echo $row["followtime"];
 					echo "</li>";
                }
                ?>
                </ul>
            </div>
            
            <div class="col_3 no_margin_right">
                <h2>Score: <?=$score ?></h2>
          		<div class="testimonial">
                	<blockquote>
                        <p>"Earn more score, you will have more fun"</p>
                        <p class="name"><a href="#">Mzone</a> <span> - music website</span></p>
					</blockquote>
                </div>            
            </div>	
            
            <div class="clear"></div>
        </div>  
        <div class="clear"></div>
    </div> <!-- END of templatemo_main -->

	<div id="templatemo_footer">
    	<div class="col_4">
        	<h4>Pages</h4>
            <ul class="nobullet bottom_list">
            	<li><a href="index.html">Home</a></li>
                <li><a href="news.html">News</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </div>
        
        <div class="col_4">
        	<h4>Partners</h4>
            <ul class="nobullet bottom_list">
                <li><a href="#">Morbi eget lacus sem</a></li>
                <li><a href="#">Vivamus dolor dolor</a></li>
                <li><a href="#">Nunc auctor viverra</a></li>
                <li><a href="#">Phasellus eget blandit</a></li>
                <li><a href="#">Sed id tincidunt ipsum</a></li>
            </ul>
        </div>
        
        <div class="col_4">
        	<h4>Links</h4>
            <ul class="nobullet bottom_list">
            	<li><a  href="#">Flash Templates</a></li>
                <li><a href="#">Phasellus eget blandit</a></li>
                <li><a href="#">Vestibulum laoreet</a></li>
                <li><a href="#">Sed placerat est sit</a></li>
                <li><a href="#">Class aptent taciti</a></li>
            </ul>
        </div>
        
        <div class="col_4 no_margin_right">
        	<h4>Twitter</h4>
            <p>"Lorem ipsum dolor sit amet consectetur adipiscing elit <a href="#">#Donec</a> ante nibh sagittis ut lobortis a, posuere vel sem"</p>
            <a href="#">Follow us on Twitter</a>
        </div>
        <div class="clear"></div>
    </div> <!-- END of templatemo_footer -->
</div> <!-- END of templatemo_wrapper -->
<div id="templatemo_copyright_wrapper">
    <div id="templatemo_copyright">
        Copyright © 2072 <a href="#">Company Name</a> | <a  href="http://www.cssmoban.com/">模板之家</a> Collect from <a href="http://www.cssmoban.com">网页模板</a>
    </div>
</div>
</body>
</html>