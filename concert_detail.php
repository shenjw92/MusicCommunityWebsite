<?php 
include ("./Util/DButil.php");
$stmt = $dbh->prepare("SELECT * FROM concert,venue where concert.venueid = venue.venueid AND concertname = ?");
$stmt->bindParam(1, $_GET["concertname"]);
$stmt->execute();

$row = $stmt->fetch();
$concertID = $row[concertID];
$cimgurl = $row[cimgurl];
$info = $row[info];
$avalability = $row[avalability];
$price = $row[price];


// echo $cimgurl."<br>";
// echo "concertID is ".$concertID."<br>";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
.font {
	font-size: 85%;
	font-style: italic;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Full News, Secured Theme</title>
<meta name="keywords"
	content="news page, multi-level comments, secured theme, free css template, templatemo, red layout" />
<meta name="description"
	content="News Page, 4-column fixed layout, multi-level comments, Secured Theme by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
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

<link rel="stylesheet" href="css/slimbox2.css" type="text/css"
	media="screen" />
<script type="text/JavaScript" src="js/slimbox2.js"></script>


</head>
<body>

	<div id="templatemo_wrapper">
		<div id="templatemo_header">
			<div id="site_title">
				<a href="http://www.cssmoban.com/">模板之家</a>
			</div>
			<div id="templatemo_search">
				<form action="#" method="get">
					<input type="text" value="Enter a keyword" name="keyword"
						id="keyword" title="keyword" onfocus="clearText(this)"
						onblur="clearText(this)" class="txt_field" /> <input type="submit"
						name="Search" value="" alt="Search" id="searchbutton"
						title="Search" class="sub_btn" />
				</form>
				<ul id="social">
					<li><a href="#" title="#" class="social_other" target="_blank"></a>
					</li>
					<li><a href="#"><img src="images/rss.png" alt="RSS" /> </a></li>
					<li><a href="#/templatemo"><img src="images/facebook.png"
							alt="facebook" /> </a></li>
					<li><a href="#"><img src="images/twitter.png" alt="twitter" /> </a>
					</li>
					<li><a href="#"><img src="images/flickr.png" alt="flickr" /> </a></li>
					<li><a href="#"><img src="images/skype.png" alt="skype" /> </a></li>
				</ul>
			</div>
		</div>
		<!-- END of header -->

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
		</div>
		<!-- end of templatemo_menu -->

		<div id="templatemo_main">
			<div id="templatemo_content" class="left">
				<table>
					<tr>
						<br></br>
					</tr>
					<tr>
						<div class="post">
							<img src="<?=$cimgurl?>" alt="image 1" width='200px'
								height='250px' class="img_fl img_border img_border_b" />
							<?php
							$stmt = $dbh->prepare("SELECT AVG(star) FROM enroll WHERE concertID = $concertID");
							$stmt -> execute();
							function number_format_clean($number,$precision=0,$dec_point='.',$thousands_sep=',')
							{
								RETURN trim(number_format($number,$precision,$dec_point,$thousands_sep),'0'.$dec_point);
							}
							$score_raw = $stmt -> fetch();
							$score = number_format_clean($score_raw[0],1);
							// echo "score is ".$score;


							if($score != null){


								?>
							<h3>
								<?=$_GET["concertname"]?>
								&nbsp;&nbsp;
								<div class="font">
									<img
										src="http://i2.sinaimg.cn/ent/r/m/2009-02-09/d7680d5a3464592f1c0b27d9a430c890.jpg"
										width="35" height="45">&nbsp;&nbsp;<font color="#5D3586"><?=$score?>/
											5.0</font>
								
								</div>
							</h3>


							<p>
								<b><?=$info?> </b>
							</p>
							<?php

							}else{

								?>
							<h3>
								<?=$_GET["concertname"]?>
								&nbsp;&nbsp;&nbsp;&nbsp;
								<div class="font">
									<img
										src="http://i2.sinaimg.cn/ent/r/m/2009-02-09/d7680d5a3464592f1c0b27d9a430c890.jpg"
										width="35" height="45">&nbsp;&nbsp;&nbsp;<font color="#5D3586">.../
											5.0</font>
								
								</div>
							</h3>
							<p>
								<b>About :</b>
								<?=$info?>
								</
							</p>
							<?php 
							}
							$stmt = $dbh->prepare("SELECT concert.concerttime, concert.price, concert.availability, venue.city, venue.state, venue.address FROM concert,venue where concertID = ? and concert.venueid = venue.venueid");
							$stmt->bindParam(1, $concertID);
							$stmt->execute();

							while($row = $stmt->fetch()){
								?>
							<p>
								<strong>Time :</strong>

								<?php        
								$ctime=$row[0];
								echo $row[0];

								?>
							</p>

							<p>
								<strong>Prices :</strong>

								<?php
								echo "$".$row[1];
								?>
							</p>
							<p>
								<strong>Avalibility :</strong>

								<?php
								echo $row[2];
								?>
							</p>

							<p>
								<strong>Location : </strong>

								<?php
								echo $row[5].", ".$row[3].", ".$row[4];
								?>
							</p>
							<?php
							}
							?>






							</p>
							<p>
								<strong>Artists Cast: </strong>
								<?php 
								$stmt = $dbh->prepare("SELECT attend.username FROM concert,attend where concert.concertID = ? and concert.concertID = attend.concertID");
								$stmt->bindParam(1, $concertID);
								$stmt->execute();
								while($row = $stmt->fetch()){
									echo $row[0]." ";
									echo "&nbsp;&nbsp;&nbsp;";
								}
								?>

							</p>



							<?php
							$stmt = $dbh -> prepare("SELECT * FROM enroll WHERE concertID = ? AND username = ?");
							$stmt -> bindParam(1, $concertID);
							$stmt -> bindParam(2, $_SESSION[username]);
							$stmt -> execute();
							$row = $stmt -> fetch();
							if($row == null){
								?>
							<form
								action="./Service/Srsvp_cfg.php?concertID=<?= $concertID ?>"
								method="post" align="right">
								<!--                      <strong>RSVP</strong> -->
								<br> <input type="image" name="rsvp"
									src="http://utsnyc.edu/image/RSVP-Button.gif" width="105px"
									height="40px" align="right">
							
							</form>
							<input type="image"
								src="https://files.list.co.uk/assets/img/common/logo.gif"
								width="50" height="30"
								onClick="window.open('view_concertlist.php','','height=550,width=620,scrollbars=yes,status =yes')"
								align="left" />
							<p align="left">
								<b>&nbsp;View your list</b>
							</p>

							<?php
							}else{
								?>


							<form
								action="./Service/ScancelRsvp_cfg.php?concertID=<?= $concertID ?>"
								method="post">

								<input type="image" name="cancel"
									src="http://www.clker.com/cliparts/D/3/A/v/z/g/cancel-button-md.png"
									width="120px" height="50px" align="left"> <strong>Cancel your
										RSVP</strong>
							
							</form>


							<input type="image"
								src="https://files.list.co.uk/assets/img/common/logo.gif"
								width="50" height="30"
								onClick="window.open('view_concertlist.php','','height=550,width=620,scrollbars=yes,status =yes')"
								align="right" />
							<p align="right">
								<b>View your list&nbsp;&nbsp;</b>
							</p>


							<?php 
							}
							?>


						</div>


					</tr>
					<hr>
						<tr>
							<ol class="comment_list">
								<?php 
								$m = ($_GET["page"]-1)*4;
								$n = $_GET["page"]*4;
								$stmt = $dbh->prepare("SELECT * FROM review where concertID = ? limit $m,$n");
								$stmt->bindParam(1, $concertID);
								$stmt->execute();


								while($row = $stmt->fetch()){
									?>
								<li>
									<div class="comment_box">
										<img src="images/avator.jpg" alt="person 1" width="65px"
											height="65px" class="img_fl img_border" />
										<div class="comment_content">
											<div class="comment_meta">
												<strong><a href="#"><?=$row[username] ?> </a> </strong>
												<?=$row[reviewtime]?>
											</div>
											<p>
												<?=$row[rwcontent] ?>
											</p>
										</div>
										<div class="clear"></div>
									</div>
								</li>
								<?php
								}
								?>
							</ol>
						</tr>
						<div class="clear"></div>
				
				</table>

				<div class="templatemo_paging">
					<ul>
						<li><a href="#" target="_parent">Previous</a></li>
						<?php 
						$stmt = $dbh->prepare("SELECT count(*) FROM review where concertID = ?");
						$stmt->bindParam(1, $concertID);
						$stmt->execute();
						$row = $stmt->fetch();
						for ($i =0; $i*4< $row[0]; $i++){
							?>
						<li><a
							href="concert_detail.php?concertname=<?= $_GET["concertname"]?>&page=<?=($i+1) ?>"
							target="_parent"><?=($i+1) ?> </a></li>
						<?php 
						}
						?>
						<li><a href="http://www.cssmoban.com/page/9" target="_parent">Next</a>
						</li>
					</ul>
					<div class="clear"></div>
				</div>

				<!--             <hr> -->
				<br>

					<div id="comment_form">
						<h3>Leave your review</h3>
						<?php 
						$now_time=date("y-m-d h:i:s");
						if(strtotime($now_time)>strtotime($ctime)){
							?>
						<?php 

                if ($_SESSION[username] != null){?>

						<form action="./Service/rate_cfg.php?concertID=<?=$concertID?>"
							method="post">
							<label><b>Rating</b> </label>
							<ul>

								<li><input type="radio" name="score" value="5" />5 Stars -
									Excellent!</li>
								<li><input type="radio" name="score" value="4" />4 Stars -
									Pretty good</li>
								<li><input type="radio" name="score" value="3" />3 Stars - Just
									good</li>
								<li><input type="radio" name="score" value="2" />2 Stars - Not
									so bad</li>
								<li><input type="radio" name="score" value="1" />1 Stars - Poor</li>
								<li><input type="radio" name="score" value="0" />0 Stars - God
									Damn it!</li>

							</ul>
							<input align="left" type="submit" name="rate" value="Rate"
								class="submit_btn" />

						</form>
						<br>
							<form
								action="./Service/addreviewConcert_cfg.php?concertID=<?= $concertID?> "
								method="post">




								<label><b>Review</b> </label>
								<textarea name="review" rows="" cols=""></textarea>






								<input type="submit" name="Submit" value="Submit"
									class="submit_btn" />

							</form> <?php 
                }else{
                	echo "Please login.";
                }
                }else
                {
                	echo "Please wait for the concert begin!";
                }?>
					
					</div>
			
			</div>
			<div id="templatemo_sidebar" class="right">
				<div class="sidebar_section">
					<h3>Artists Cast</h3>
					<ul class="nobullet sidebar_link">
						<?php

						$stmt = $dbh->prepare("SELECT attend.username FROM concert,attend where concert.concertID = ? and concert.concertID = attend.concertID");
						$stmt->bindParam(1, $concertID);
						$stmt->execute();
						while($row = $stmt->fetch()){
							// echo $row[0]." ";
							// echo "&nbsp;&nbsp;&nbsp;";
							?>
						<li><a href="#"><?=$row[0]?> </a></li>
						<!--                     <li><a href="#">Eget lementum</a></li>
                    <li><a href="#">Justo lacinia</a></li>
                    <li><a href="#">Aenean tincidunt</a></li>
                    <li><a href="#">Sed ipsum erat</a></li>
                    <li><a href="#">Dignissim non</a></li>
                    <li><a href="#">Proin pretium</a></li> -->
						<?php
						}
						?>
					</ul>
				</div>


				<div class="sidebar_section">
					<h3>Recent Reviews</h3>
					<ul class="nobullet sidebar_link rc_comment">
						<?php
						$stmt = $dbh->prepare("SELECT * FROM review where concertID = ? limit 0,6");
						$stmt->bindParam(1, $concertID);
						$stmt->execute();


						while($row = $stmt->fetch()){

							?>
						<li><span><b><?=$row[username]?> </b> </span> says <a href="#"><?=$row[rwcontent]?>
						</a></li>
						<!--                     <li><span>James</span> on <a href="#">Aliquam Nisl Ligula</a></li>
                    <li><span>Admin</span> on <a href="#">Etiam Varius Lorem</a></li>
                    <li><span>Linda</span> on <a href="#">Donec Fringilla Laoreet</a></li> -->
						<?php
						}
						?>
					</ul>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<!-- END of templatemo_main -->

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
					<li><a href="#">Flash Templates</a></li>
					<li><a href="#">Phasellus eget blandit</a></li>
					<li><a href="#">Vestibulum laoreet</a></li>
					<li><a href="#">Sed placerat est sit</a></li>
					<li><a href="#">Class aptent taciti</a></li>
				</ul>
			</div>

			<div class="col_4 no_margin_right">
				<h4>Twitter</h4>
				<p>
					"Lorem ipsum dolor sit amet consectetur adipiscing elit <a href="#">#Donec</a>
					ante nibh sagittis ut lobortis a, posuere vel sem"
				</p>
				<a href="#">Follow us on Twitter</a>
			</div>
			<div class="clear"></div>
		</div>
		<!-- END of templatemo_footer -->
	</div>
	<!-- END of templatemo_wrapper -->
	<div id="templatemo_copyright_wrapper">
		<div id="templatemo_copyright">
			Copyright © 2072 <a href="#">Company Name</a> | <a
				href="http://www.cssmoban.com/">模板之家</a> Collect from <a
				href="http://www.cssmoban.com">网页模板</a>
		</div>
	</div>
</body>
</html>
