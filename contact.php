<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact, Secured Theme</title>
<meta name="keywords" content="contact form, maps, secured theme, templatemo, red color, free layout" />
<meta name="description" content="Contact Form, Maps, Secured Theme by templatemo.com" />
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
                <li><a href="#" title="/" class="social_other"  target="_blank"></a></li>
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
                
              
                <li class="last"><a href="contact.php" class="last">Contact</a></li>
                 
            </ul>
            <br style="clear: left" />
        </div> <!-- end of templatemo_menu -->
    
    <iframe width="980" height="320" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Central+Park,+New+York,+NY,+USA&amp;aq=0&amp;sll=14.093957,1.318359&amp;sspn=69.699334,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=Central+Park,+New+York,+NY,+USA&amp;ll=40.778265,-73.96988&amp;spn=0.033797,0.06403&amp;t=m&amp;output=embed"></iframe>
    <div id="templatemo_main">
			<h2>Contact Us</h2>
            <div id="contact_form" class="col_2">
                <h3>Send us a message...</h3>
                <form method="post" name="contact" action="#">
                    <div class="col_4">
                        <label for="author">Name:</label>
                        <input name="author" type="text" class="required input_field" id="author" maxlength="30" />
                    </div>
                    <div class="col_4 no_margin_right">
                        <label for="subject">Email:</label>
                        <input name="email" type="text" class="validate-email required input_field" id="email" maxlength="30" />
                    </div>
                    <div class="clear h10"></div>
                    <div class="col_4 left">
                        <label for="author">Phone:</label>
                        <input name="author" type="text" class="required input_field" id="author" maxlength="20" />
                    </div>
                    <div class="col_4 no_margin_right">
                        <label for="subject">Subject:</label>
                        <input name="subject" type="text" class="validate-email required input_field" id="subject" maxlength="40" />
                    </div>
                    <div class="clear"></div>
                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <input type="submit" name="Submit" value="Submit" class="submit_btn left" />
                    <input type="reset" name="Reset" value="Reset" class="submit_btn right" />
                </form>
            </div> 
            <div class="col_2 no_margin_right">
                <div class="col_4">
                    <h3>Xiao Zhang</h3>
                    N17191330<br />
  
                    
                    Tel: 090-020-9922<br />
 
                    
                  </div>
                <div class="col_4 no_margin_right">
                    <h3>He Zhong</h3>
                  	N16512940<br />              
                    Tel: 080-010-1188<br />
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