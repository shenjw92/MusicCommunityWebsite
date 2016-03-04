<?php 
include ("./Util/DButil.php");
$stmt = $dbh->prepare("SELECT * FROM artist where username = ?");
$stmt->bindParam(1, $_GET["username"]);
$stmt->execute();
$row = $stmt->fetch();
$aimgurl = $row["aimgurl"];
$name = $row["name"];
$weblink = $row["weblink"];
$verfication = $row["verfication"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Full News, Secured Theme</title>
<meta name="keywords" content="news page, multi-level comments, secured theme, free css template, templatemo, red layout" />
<meta name="description" content="News Page, 4-column fixed layout, multi-level comments, Secured Theme by templatemo.com" />
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
                <li><a href="#" title="#" class="social_other"  target="_blank"></a></li>
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
                <li><a href="concert.php">Concert</a></li>
                <li><a href="artists.php">Artist</a></li>
          
           
                <?php 
                if ($_SESSION[username]==null){
                ?>
                	<li><a href="" onClick="window.open('login.php','','height=550,width=620,scrollbars=yes,status =yes')">Log In</a></li>
                	<li><a href="create-account.php">Sign Up</a></li>
                <?php 
                }else{
                ?>
                	<li><a href="recommend.php">Recommend</a></li>
                	<li><a href="personal.php">Personal</a></li>
                	<li><a href="./Service/logout_cfg.php" >Log Out</a></li>
               	<?php
                }
                ?>
                
              
                <li class="last"><a href="contact.php" class="last">Contact</a></li>
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->

    <div id="templatemo_main">
        <div id="templatemo_content" class="left">
            <div class="post">
                <img src="<?=$aimgurl ?>" alt="image 1" class="img_fl img_border img_border_b" />
                <div><?=$weblink ?></div>
                <h2><?=$name ?></h2>
                <p>Playing Type: 
                <?php 
		            $stmt = $dbh->prepare("SELECT type.typename FROM play,type where username = ? and type.typeid = play.typeid");
		            $stmt->bindParam(1, $_GET["username"]);
		            $stmt->execute();
		            while($row = $stmt->fetch()){
		            	echo $row[0];
		            }
                ?>
                
                </p>
                <p align="justify">Verfication: 
                <?php 
                if ($verfication = 0){
                	echo "No";
                }else{
                	echo "Yes";
                }
                
                ?>
                
                </p>
                <p align="justify">
                <?php 
                $stmt = $dbh->prepare("SELECT * from fan where username = ? and fausername = ?");
                $stmt->bindParam(1, $_SESSION[username]);
                $stmt->bindParam(2, $_GET["username"]);
                $stmt->execute();
                if ($row = $stmt->fetch()){
               	?>
               	<img src="./images/30.png" style="width: 18px;"></img>
                You are a fan of this band. &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="Service/fan_cfg.php?fausername2=<?=$_GET["username"] ?>">Not like? </a>
                <?php 
                }else{
                ?>
                <img src="./images/50.png" style="width: 18px;"></img>
                <a href="Service/fan_cfg.php?fausername=<?=$_GET["username"] ?>">Become a Fan</a>
                <?php
                }
                ?>

                
                </p>
</div>	
            <ol class="comment_list">
            <?php 
            $m = ($_GET["page"]-1)*4;
            $n = $_GET["page"]*4;
            $stmt = $dbh->prepare("SELECT * FROM comment where ausername = ? limit $m,$n");
            $stmt->bindParam(1, $_GET["username"]);
            $stmt->execute();
            while($row = $stmt->fetch()){
            ?>
            	<li>
            	<div class="comment_box">
            	<img src="images/avator.jpg" alt="person 1" class="img_fl img_border" />
            	<div class="comment_content">
            	<div class="comment_meta"><strong><a href="#"><?=$row["username"] ?></a></strong><?=$row["ctime"] ?></div>
            	<p><?=$row["cmcontent"] ?></p>
            	</div>
            	<div class="clear"></div>
            	</div>
            	</li>
            <?php
            }
            ?>
        </ol>
        
        <div class="clear"></div>
            
            <div class="templatemo_paging">
                <ul>
                    <li><a href="#" target="_parent">Previous</a></li>
                    <?php 
                    $stmt = $dbh->prepare("SELECT count(*) FROM comment where ausername = ?");
                    $stmt->bindParam(1, $_GET["username"]);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    for ($i =0; $i*4< $row[0]; $i++){
                    ?>
                    <li><a href="artist_detail.php?username=bandari&page=<?=($i+1) ?>" target="_parent"><?=($i+1) ?></a></li>
                    <?php 
                    }
                    ?>
                    <li><a  href="http://www.cssmoban.com/page/9" target="_parent">Next</a></li>
                </ul>
                <div class="clear"></div>
            </div>
            
            <hr/>
            
            <div id="comment_form">
            <h3>Leave your comment</h3>
            <?php if ($_SESSION[username] != null){?>
            <form action="./Service/addcomment_cfg.php?ausername=<?=$_GET["username"] ?>" method="post">
                <label>Comment</label>
                <textarea  name="comment" rows="" cols=""></textarea>
                <input type="submit" name="Submit" value="Submit" class="submit_btn" />
            </form>
			<?php }else{
				echo "Please login.";
			}?>
        </div>
		</div>
        <div id="templatemo_sidebar" class="right">
       		<div class="sidebar_section">
                <h3>Recent Concert</h3>
                <ul class="nobullet sidebar_link">
                <?php 
		            $stmt = $dbh->prepare("SELECT concert.concertname FROM concert,attend where attend.username = ? and concert.concertID = attend.concertID");
		            $stmt->bindParam(1, $_GET["username"]);
		            $stmt->execute();
		            while($row = $stmt->fetch()){
		            	
		            	echo "&nbsp;&nbsp;&nbsp;";
            	?>
            		<li><a href="#"><?=$row[0] ?> </a></li>
            	<?php
		            }
                ?>
                    
                </ul>
            </div>
            		
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
                <li><a href="contact.html">Contact</a></li>
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