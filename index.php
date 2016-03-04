<?php session_start();
include("./Util/DButil.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mzone</title>
<meta name="keywords" content="secured theme, free template, templatemo, red layout" />
<meta name="description" content="Secured Theme is provided by templatemo.com" />
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
		
    	<div id="site_title"><a  href="http://www.cssmoban.com/">模板之家</a>
    	</div>
        <div id="templatemo_search">
            <form action="" method="get">
              <input type="text" value="Enter a keyword" name="keyword" id="keyword" title="keyword" 
              		onfocus="clearText(this)" onblur="clearText(this)" class="txt_field" />
              <input type="submit" name="Search" value="" alt="Search" id="searchbutton" title="Search" class="sub_btn" />
            </form>
            <ul id="social">
                <li><a href="#" title="cn.hdstockphoto.com" class="social_other"  ></a></li>
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
                <?php }?>
                <?php 
                if ($_SESSION[username]==null){
                ?>
                	<li><a href="" onClick="window.open('login.php','','height=550,width=620,scrollbars=yes,status =yes')">Log In</a></li>
                	<li><a href="create-account.php">Sign Up</a></li>
                <?php 
                }else if($_SESSION[level] == 0){
                ?>
                	<li><a href="recommend.php">Recommend</a></li>
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
                
              
                <li class="last"><a href="contact.php" class="last">Contact</a></li>
                 
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
        
    <div id="featured">
		  <ul class="ui-tabs-nav">
	        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-1"><a href="#fragment-1"><img src="images/featured_list/image1_small.jpg" alt="" /><span>Montreal Concert,go out night</span></a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-2"><a href="#fragment-2"><img src="images/featured_list/image2_small.jpg" alt="" /><span>DJARUM SUPER Guns N Roses - Live in concert 15 December 2012</span></a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-3"><a href="#fragment-3"><img src="images/featured_list/image3_small.jpg" alt="" /><span>Grand Operatie Concert</span></a></li>
	        <li class="ui-tabs-nav-item" id="nav-fragment-4"><a href="#fragment-4"><img src="images/featured_list/image4_small.jpg" alt="" /><span>Celebrate the holidays with the Judy Concert Band! </span></a></li>
	      </ul>

	    <!-- First Content -->
	    <div id="fragment-1" class="ui-tabs-panel" style="">
			<img src="images/featured_list/image1.jpg" alt="" />
			 <div class="info" >
				<h2><a href="#" >Montreal Concert</a></h2>
				<p>Christoph Waltz expected to play iconic villain Blofeld (the pussy-stroking bald dude) in next James Bond movie.<a href="#" >read more</a></p>
			 </div>
	    </div>
        
        <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >Website Template</a></div>

	    <!-- Second Content -->
	    <div id="fragment-2" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="images/featured_list/image2.jpg" alt="" />
			 <div class="info" >
				<h2><a href="#" >Coming</a></h2>
				<p>Join Songkick to track Guns N' Roses and get concert alerts when they play near you.<a href="#" >read more</a></p>
			 </div>
	    </div>

	    <!-- Third Content -->
	    <div id="fragment-3" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="images/featured_list/image3.jpg" alt="" />
			 <div class="info" >
				<h2><a href="#" >Grand? Classique</a></h2>
				<p>Obtain not just a classic experience <a href="#" >read more</a></p>
	         </div>
	    </div>

	    <!-- Fourth Content -->
	    <div id="fragment-4" class="ui-tabs-panel ui-tabs-hide" style="">
			<img src="images/featured_list/image4.jpg" alt="" />
			 <div class="info" >
				<h2><a href="#" ></a>Holiday! Why not!</h2>
				<p>The combination of familiar favorites, festive new music and the cheerfully decorated theater will leave you in the spirit of the season.<a href="#" >read more</a></p>
	         </div>
	    </div>

	</div>
    <div id="templatemo_main">
    	<div class="content_wrapper content_mb_30">
        	<div class="col_3 service_home">
            	<img src="images/onebit_24.png" alt="Image" />
                <h2>Diversification</h2>
                <p>You can become fans of bands, follow other users, post information about new bands and upcoming concerts,
like different genres, RSVP to concerts, rate and review concerts.</p>
            </div>
            <div class="col_3 service_home">
            	<img src="images/onebit_26.png" alt="Image" />
                <h2>Security</h2>
                <p>Our website will protect User Info. Our interface takes appropriate measures to guard against SQL injection and cross-site
scripting attacks.</p>
            </div>
            <div class="col_3 no_margin_right service_home">
            	<img src="images/onebit_16.png" alt="Image" />
                <h2>Recommend</h2>
                <p>You can make lists of recommended upcoming concerts. We also will recommend some concerts to you according to your taste.</p>
            </div>
        </div>
    	<div class="content_wrapper">
            <div class="col_2">
                <h2>Recent Concert</h2>
                <ul class="nobullet latest_work_home">
                <?php 
                $stmt=$dbh->prepare("SELECT * FROM concert Order BY posttime desc limit 0,4");
                $stmt->execute();
                	
                while($row=$stmt->fetch()){
                ?>
                	 <li><a href="#" rel="lightbox[portfolio]"><img src="<?=$row[cimgurl] ?>" alt="" class="img_border img_border_b" style="width: 180px;height: 110px"/></a></li>
   				<?php 
                }
   				?>
   				</ul>
                <div class="clear"></div>
                
            </div>
             <div class="col_2 no_margin_right">
                <h2>Interested Concerts</h2>
<?php        

          //  $stmt=$dbh->prepare("SELECT * FROM concert Order BY concerttime desc limit 0,3");
			$stmt=$dbh->prepare("SELECT * FROM concert,fan,attend where fan.fausername=attend.username and concert.concertID = attend.concertID and fan.username = ? Order BY concerttime limit 0,3");
			$stmt->bindParam(1, $_SESSION["username"]);
			$stmt->execute();
			
            while($row=$stmt->fetch()){


?>             
                <div class="news_list">
                    <img src="<?=$row[cimgurl] ?>" alt="Client 1"  class="img_fl img_border img_border_s" style="width:120px;height:70px;"/>
                    <a href="#"><?=$row[concertname]?></a>
                    <p><?=$row[info]?> </p>
                    <div class="clear"></div>
                </div>           
                

<?php            }
                

            
?>             
                </div>

<!-- <p></p>         <div class="col_2 no_margin_right">

                <h2>Recent Concerts</h2>
                <div class="news_list">
                    <img src="images/templatemo_image_01.jpg" alt="Client 1"  class="img_fl img_border img_border_s" />
                    <a href="#">Cras mi lectus tempus vitae</a>
                    <p>Ut vitae luctus mi. Donec ligula dolor, lobortis ac porttitor sed, aliquam non orci. </p>
                  	<div class="clear"></div>
                </div>           
                <div class="news_list">
                    <img src="images/templatemo_image_02.jpg" alt="Client 2" class="img_fl img_border img_border_s" />
                    <a href="#">Cras dignissim volutpat sem id</a>
                    <p>Donec vitae augue ut sem cursus aliquet rhoncus vel quam.</p>
                  <div class="clear"></div>
                </div>   
                 <div class="news_list">
                    <img src="images/templatemo_image_03.jpg" alt="Client 3" class="img_fl img_border img_border_s" />
                    <a href="#">Sed euismod dolor eu</a>
                    <p>Aliquam erat volutpat. Vestibulum urna libero, fringilla eu faucibus nec, fringilla eget elit.</p>
                    <div class="clear"></div>
                </div>             
                <div class="clear"></div>
                <a href="#" class="more">More</a>
            </div>	 -->
        </div>
        <div class="clear"></div>
    </div>

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
        Copyright © 2072 <a href="#">Company Name</a> | Mzone
    </div>
</div>
</body>
</html>