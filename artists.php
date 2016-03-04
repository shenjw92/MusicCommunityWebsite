<?php 
include ("./Util/DButil.php");
$sum = $_GET["sum"];
$page = $_GET["page"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html5>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News, Secured Theme</title>
<meta name="keywords"
	content="news page, 4 columns, secured theme, free template, templatemo, red layout" />
<meta name="description"
	content="News Page, 4-column fixed layout, Secured Theme by templatemo.com" />
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
					<li><a href="#" title="StockVector" class="social_other"></a></li>
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
		</div>
		<!-- end of templatemo_menu -->

		<div id="templatemo_main">
			<h2>Search</h2>
			<form action="./Service/sartist_cfg.php" method="post">
				<h4>
					Artist Name <input name="artistname" type="text" id="artistname"
						x-webkit-speech="x-webkit-speech" />&nbsp;&nbsp; Artist Play <input name="typename"
						type="text" id="typename" />&nbsp;&nbsp; <input name="submit"
						type="image" src="./images/search.jpg" align="absmiddle"
						style="margin-top: 8px;"
						onclick="javascript:document.this.form.submit();" />
				</h4>
			</form>
			</br>
			<?php
			if ($page != null){
				$i = ($page-1)*8 + 1;
				while ($_SESSION["artist".$i] != null && $i <$page*8){
					?>
			<div class="post_list col_4">
				<a href="news_detail.html"><img
					src="<?=$_SESSION["artist".$i][3] ?>" alt="image 1" 
					 class="img_border img_border_b img_nom"/> </a>
				<h2>
					<a href="news_detail.html"><?=$_SESSION["artist".$i][1] ?> </a>
				</h2>
				<p>
					Play type:
					<?php 
					$stmt = $dbh->prepare("SELECT type.typename FROM play,type where username = ? and type.typeid = play.typeid");
					$stmt->bindParam(1, $_SESSION["artist".$i][0]);
					$stmt->execute();
					while($row = $stmt->fetch()){
						echo $row[0];
						echo "&nbsp;&nbsp;";
					}

					?>
				</p>
				<a
					href="artist_detail.php?username=<?=$_SESSION["artist".$i][0] ?>&page=1"
					class="more">More</a>
				<div class="clear"></div>
			</div>
			<?php  

			$i++;
				}
			}else{
				$sartist_sql = "SELECT artist.username, artist.name, artist.verification, artist.aimgurl FROM artist";
				$sartist_sql = $sartist_sql." Limit 0,8";
				$stmt = $dbh->prepare($sartist_sql);
				$stmt->execute();
				
				while ($row = $stmt->fetch()){
			?>
			<div class="post_list col_4">
				<a href="news_detail.html">
				<img src="<?=$row[3] ?>" alt="image 1"  class="img_border img_border_b img_nom" /> 
				</a>
				<h2>
					<a href="news_detail.html"><?=$row[1] ?> </a>
				</h2>
				<p>
					Play type:
					<?php 
					$stmt2 = $dbh->prepare("SELECT type.typename FROM play,type where username = ? and type.typeid = play.typeid");
					$stmt2->bindParam(1, $row[0]);
					$stmt2->execute();
					while($row2 = $stmt2->fetch()){
						echo $row2[0];
						echo "&nbsp;&nbsp;";
					}
				
					?>
				</p>
				<a	href="artist_detail.php?username=<?=$row[0] ?>&page=1"
					class="more">More</a>
				<div class="clear"></div>
				</div>
				<?php
					}
				} 
				?>
				<div class="clear"></div>
				<div class="templatemo_paging">
					<ul>
						<li><a href="#" target="_parent">Previous</a></li>
						<?php 
						$n = 1;

						while (($n-1)*8 < $sum){

							?>
						<li><a href="./artists.php?sum=<?=$sum ?>&page=<?=$n ?>"
							target="_parent"><?=$n ?> </a></li>
						<?php
						$n++;
						}

						?>

						<li><a href="" target="_parent">Next</a>
						</li>
					</ul>
					<div class="clear"></div>
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
						"Lorem ipsum dolor sit amet consectetur adipiscing elit <a
							href="#">#Donec</a> ante nibh sagittis ut lobortis a, posuere vel
						sem"
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
				Copyright © 2072 <a href="#">Company Name</a> | Mzone
			</div>
		</div>

</body>
</html5>
