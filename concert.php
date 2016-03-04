<?php include("./Util/DButil.php");
$sum = $_GET["sum"];
$page = $_GET["page"];
// echo "sum is ".$sum." "."page is ".$page;
?>
<html5>
<html xmlns="http://www.w3.org/1999/xhtml">
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
<style type="text/css">
.concert_time {
	padding-left: 0%;
	margin-bottom: 70px;
}

.searchfield {
	margin-bottom: -50px;
}

.searchconcert {
	padding-bottom: 20%;
}
</style>

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
				<li><a href=""
					onClick="window.open('login.php','','height=550,width=620,scrollbars=yes,status =yes')">Log
						In</a></li>
				<li><a href="create-account.php">Sign Up</a></li>
				<?php 
				}else if($_SESSION[level] == 0){
					?>
				<li><a href="recommend.php">Recommend</a></li>
				<li><a href="personal.php">Personal</a></li>
				<li><a href="./Service/logout_cfg.php">Log Out</a></li>
				<?php
				}else if($_SESSION[level] == 3){
					?>
				<li><a href="personal2.php">Personal</a></li>
				<li><a href="./Service/logout_cfg.php">Log Out</a></li>
				<?php
				}else if($_SESSION[level] == 1){
					?>
				<li><a href="manage.php">Manage</a></li>
				<li><a href="./Service/logout_cfg.php">Log Out</a></li>
				<?php
				}
				?>


				<li class="last"><a href="contact.html" class="last">Contact</a></li>

			</ul>
			<br style="clear: left" />
		</div>
		<!-- end of templatemo_menu -->

		<div id="templatemo_main">
			<h2>Concerts Page</h2>
			<br> <br>
			<!-- <p>Nullam odio elit, malesuada eget adipiscing sed, mollis sed tortor. Aliquam id sollicitudin dui. Sed volutpat libero lectus, nec pulvinar tellus dictum eu. Praesent luctus feugiat mattis. Pellentesque ut diam vehicula, mattis nisi at, convallis neque. Curabitur non faucibus ante. Vestibulum placerat purus vitae risus pretium lobortis in ac lacus. <a href="#">Cum sociis natoque</a> penatibus et magnis dis parturient montes, nascetur ridiculus mus. Validate <a href="#" >XHTML</a> &amp; <a href="#" >CSS</a>.</p><br /> -->

			<div id="searchconcert" class="search_concert">
				<table border=0>

					<form class="searchconcert" action="./Service/sconcert_cfg.php"
						method="post">
						<tr>


							<td><h4>
									Concert Name:<input type="text" size="15"
										name="keyword_concertname" x-webkit-speech />
								</h4></td>
							<td><h4>
									Style: <input type="text" size="10" name="keyword_concertstyle" />
								</h4></td>
							<td><h4>
									Artist: <input type="text" size="13" name="keyword_artists" />
								</h4></td>


						</tr>

						<tr>

							<!--                     <input type="radio" name="timeradio" value="radiotimerange"/> -->
							<h4>
								Time Select:<input type="text" name="timerange1" size="10"> - <input
									type="text" name="timerange2" size="10">&nbsp;&nbsp;
							</h4>
							<h4>
								Location : &nbsp;State: <input type='text' name="state"
									size="10">&nbsp;City:&nbsp;<input type='text' name="city"
									size="10">
							</h4>
							<h4>
								Keyword :&nbsp;<input type='text' name="keyword" size="10">
							</h4>
							<input name="submit" type="image" src="./images/search.jpg"
								align="right" style="margin-top: 8px;"
								onclick="javascript:document.this.form.submit();" />


						</tr>







					</form>



				</table>
			</div>
			<hr>

			<?php
			try{
				// echo $_SESSION["concert".$i][0];
				$i = ($page - 1) * 8 + 1;
				$amount = 0;



				if($_SESSION["concert".$i] == null){
					// echo "SESSION is null"."<br>";
					// echo $_SESSION[concertname]." ".$_SESSION[concertStyle]." ".$_SESSION[artist]." ".$_SESSION[timerange1]." ".$_SESSION[timerange2];
					if($_SESSION[concertname]=="" && $_SESSION[concertStyle]=="" && $_SESSION[artist]=="" && $_SESSION[timerange1]==""&&$_SESSION[timerange2]=="" && $_SESSION[state] == "" && $_SESSION[city] == "" && $_SESSION[keyword] == ""){
						// echo "SESSION CONTENT IS NULL";
						?>
			<h2>Here are Recent Concerts</h2>
			<?php
					}else{
						?>
			<center>
				<img
					src="http://unbxd.com/blog/wp-content/uploads/2014/02/No-results-found.jpg"
					alt="notfound" />
			</center>
			<br>

			<h2>Here are Recent Concerts</h2>
			<?php   
					}
					?>


			<?php
			$sql = "SELECT * FROM concert GROUP BY concerttime desc LIMIT 8";
			$stmt = $dbh -> prepare($sql);
			$stmt -> execute();

			while($row = $stmt->fetch()){
				$datetime = new datetime($row[concerttime]);
				$date = $datetime -> format('Y-m-d');
				$time_list = explode('-', $date);
				// echo $time_list[0]." ".$time_list[1]." ".$time_list[2];

				$dateObj   = DateTime::createFromFormat('!m', $time_list[1]);
				$monthName = $dateObj->format('F');
				$amount++;

				// echo  $_SESSION["concert".$i][0];

				?>

			<div class="post_list col_4">
				<a
					href="concert_detail.php?concertname=<?=$row[concertname] ?>&page=1"><img
					src="<?=$row[cimgurl]?>" alt="image 1" width='180px' height='110px'
					class="img_border img_border_b img_nom" /> </a> <strong><?=$monthName." ".$time_list[2]." ".$time_list[0]?>
				</strong>
				<h2>
					<a href="news_detail.html"><?=$row[concertname]?> </a>
				</h2>
				<p>
					<?=$row[info]?>
				</p>
				<a
					href="concert_detail.php?concertname=<?=$row[concertname] ?>&page=1"
					class="more">More</a>
				<div class="clear"></div>
			</div>


			<?php

			}
				}
				if($_SESSION["concert".$i] != null && $_SESSION["concert".$i] != ""){

					// echo "amount is ".$amount."<br>";

					if($_SESSION[concertname]==null && $_SESSION[concertStyle]==null && $_SESSION[artist]==null && $_SESSION[timerange1]==null && $_SESSION[timerange2]==null && $_SESSION[state] == null && $_SESSION[city] == null && $_SESSION[keyword] == null){
						echo "SESSION ARE ALL NULL";
						?>

			<center>
				<img
					src="http://unbxd.com/blog/wp-content/uploads/2014/02/No-results-found.jpg"
					alt="notfound" />
			</center>
			<br>

			<h2>Here are Recent Concerts</h2>



			<?php
			$sql = "SELECT * FROM concert GROUP BY concerttime desc LIMIT 8";
			$stmt = $dbh -> prepare($sql);
			$stmt -> execute();

			while($row = $stmt->fetch()){
				$datetime = new datetime($row[concerttime]);
				$date = $datetime -> format('Y-m-d');
				$time_list = explode('-', $date);
				// echo $time_list[0]." ".$time_list[1]." ".$time_list[2];

				$dateObj   = DateTime::createFromFormat('!m', $time_list[1]);
				$monthName = $dateObj->format('F');
				$amount++;

				// echo $row[concertname];

				?>

			<div class="post_list col_4">
				<a
					href="concert_detail.php?concertname=<?=$row[concertname]?>&page=1"
					class="img_more"><img src="<?=$row[cimgurl]?>" alt="image 1"
					width='164px' heiht='82px' class="img_border img_border_b img_nom" />
				</a> <strong><?=$monthName." ".$time_list[2]." ".$time_list[0]?> </strong>
				<h2>
					<a href="news_detail.html"><?=$row[concertname]?> </a>
				</h2>
				<p>
					<?=$row[info]?>
				</p>
				<a
					href="concert_detail.php?concertname=<?=$row[concertname]?>&page=1"
					class="more">More</a>
				<div class="clear"></div>
			</div>


			<?php

			}

					}else{



						//         if($amount == $sum){

						//





						while ($_SESSION["concert".$i] != null && $_SESSION["concert".$i] != " " && $i < $page * 8){

							// echo "SESSION[CONCERT] IS NOT NULL";
							// echo $row2[concertname];
							$row2 = $_SESSION["concert".$i];
							$datetime = new datetime($row2[concerttime]);
							$date = $datetime -> format('Y-m-d');
							$time_list = explode('-', $date);
							// echo $time_list[0]." ".$time_list[1]." ".$time_list[2];

							$dateObj   = DateTime::createFromFormat('!m', $time_list[1]);
							$monthName = $dateObj->format('F');
							// echo $row2[cimgurl];

							?>


			<img src="">
			<div class="post_list col_4">
				<a
					href="concert_detail.php?concertname=<?=$row2[concertname] ?>&page=1"><img
					src="<?=$row2[cimgurl]?>" alt="image 1" width='164px' heiht='82px'
					class="img_border img_border_b img_nom" /> </a> <strong><?=$monthName." ".$time_list[2]." ".$time_list[0]?>
				</strong>
				<h2>
					<a href="news_detail.html"><?=$row2[concertname]?> </a>
				</h2>
				<p>
					<?=$row2[info]?>
				</p>
				<a
					href="concert_detail.php?concertname=<?=$row2[concertname] ?>&page=1"
					class="more">More</a>
				<div class="clear"></div>
			</div>

			<?php   
			$i++;

						}
						$_SESSION[concertname] = null;
						$_SESSION[concertStyle] = null;
						$_SESSION[artist] = null;
						$_SESSION[timerange1] = null;
						$_SESSION[timerange2] = null;
						$_SESSION[state] = null;
						$_SESSION[city] = null;
						$_SESSION[keyword] = null;
					}
				}

					








			}catch(PDOException $e){
				print "ERROR: ".$e->getMessage()."<br>";
				die();
			}

			?>


			<!--         <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/01.jpg" alt="image 1" class="img_border img_border_b img_nom" /></a>
            <strong>21 October 2072</strong>
            <h2><a href="news_detail.html">Lorem Ipsum Dolor Sit Amet Consectetur</a></h2>
            <p>Aliquam id ipsum aliquam, vestibulum felis eu, suscipit magna. Donec eget est laoreet, porta nisi at.</p>
      		<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/02.jpg" alt="image 2" class="img_border img_border_b img_nom" /></a>
            <strong>19 October 2072</strong>
            <h2><a href="news_detail.html">Nunc Iaculis Leo Et Arcu Auctor Gravida</a></h2>
            <p>Donec viverra sollicitudin sem, rutrum hendrerit lorem placerat ac. Nullam nec molestie quam.</p>
      		<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/03.jpg" alt="image 3" class="img_border img_border_b img_nom" /></a>
            <strong>18 October 2072</strong>
            <h2><a href="news_detail.html">Nam Accumsan Vulputate Massa Euismod</a></h2>
            <p>Vivamus hendrerit commodo justo, non mattis arcu hendrerit nec. Nullam euismod massa et porta luctus.</p>
      		<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4 no_margin_right">
        	<a href="news_detail.html"><img src="images/news/04.jpg" alt="image 4" class="img_border img_border_b img_nom" /></a>
            <strong>15 October 2072</strong>
            <h2><a href="news_detail.html">Aenean Viverra Facilisis Porttitor</a></h2>
            <p>Sed quis rutrum ipsum. Suspendisse ullamcorper augue sit amet arcu malesuada, a lacinia.</p>
      		<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/05.jpg" alt="image 5" class="img_border img_border_b img_nom" /></a>
            <strong>14 October 2072</strong>
            <h2><a href="news_detail.html">Integer Dapibus Dictum Magna Nec</a></h2>
            <p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam odio elit, malesuada eget.</p>
      		<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/06.jpg" alt="image 6" class="img_border img_border_b img_nom" /></a>
            <strong>13 October 2072</strong>
            <h2><a href="news_detail.html">Ligula Varius Tempor Laoreet Ligula</a></h2>
            <p>Proin nec nunc magna, eu blandit massa. Sed elementum nisi ut quam vehicula eu egestas nisi varius.</p>
        	<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4">
        	<a href="news_detail.html"><img src="images/news/07.jpg" alt="image 7" class="img_border img_border_b img_nom" /></a>
            <strong>12 October 2072</strong>
            <h2><a href="news_detail.html">Pellentesque fringilla condimentum</a></h2>
          	<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus. Validate <a href="#" >XHTML</a> &amp; <a href="#" >CSS</a>.</p>
            <a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	
        
        <div class="post_list col_4 no_margin_right">
        	<a href="news_detail.html"><img src="images/news/08.jpg" alt="image 8" class="img_border img_border_b img_nom" /></a>
            <strong>11 October 2072</strong>
            <h2><a href="news_detail.html">Ttristique Ante Nunc Iaculis Leo</a></h2>
            <p>Donec odio leo, rhoncus mattis sodales vitae, tempor ac nibh. Donec vel nibh vitae massa semper auctor.</p>
        	<a href="news_detail.html" class="more">More</a>
            <div class="clear"></div>
        </div>	 -->
			<div class="clear"></div>
			<div class="templatemo_paging">
				<ul>
					<li><a href="#" target="_parent">Previous</a></li>
					<!--                 <li><a href="#" target="_parent">1</a></li>
                <li><a href="#" target="_parent">2</a></li>
                <li><a href="#" target="_parent">3</a></li>
                <li><a  href="http://www.cssmoban.com/" target="_parent">4</a></li>
                <li><a  href="http://www.cssmoban.com/" target="_parent">5</a></li>
                <li><a  href="http://www.cssmoban.com/page/6" target="_parent">6</a></li>
                <li><a  href="http://www.cssmoban.com/page/7" target="_parent">7</a></li>
                <li><a  href="http://www.cssmoban.com/page/8" target="_parent">8</a></li> -->
					<?php 
					$n = 1;

					while (($n-1)*8 < $sum){

						?>
					<li><a href="./concert.php?sum=<?=$sum ?>&page=<?=$n ?>"
						target="_parent"><?=$n ?> </a></li>
					<?php
					$n++;
					}

					?>
					<li><a href="http://www.cssmoban.com/page/9" target="_parent">Next</a>
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
					<li><a href="index.php">Home</a></li>
					<li><a href="concert.php">News</a></li>
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

</html5>
