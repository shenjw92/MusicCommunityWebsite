<?php include("./Util/DButil.php");
$sum = $_GET["sum"];
$page = $_GET["page"];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>News, Secured Theme</title>
<meta name="keywords" content="news page, 4 columns, secured theme, free template, templatemo, red layout" />
<meta name="description" content="News Page, 4-column fixed layout, Secured Theme by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery-ui.min.js" ></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>
<style type="text/css">
.concert_time{
    padding-left:0%;

    margin-bottom: 70px;


}
.searchfield{
    margin-bottom: -50px;
}
.searchconcert{
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

<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 


</head>
<body>


<div id="templatemo_wrapper">
	<div id="templatemo_header">
    	<div id="site_title"><a  href="http://www.cssmoban.com/">模板之家</a></div>
        <div id="templatemo_search">

        </div>
    </div> <!-- END of header -->

         

       
        <?php
            $delete = $_GET["delete"];

            try{ 
                echo $_SESSION["concert".$i][0];
                $i = ($page - 1) * 8 + 1;
                $amount = 0;

                if($delete != null){
                    $stmt = $dbh -> prepare("DELETE FROM enroll WHERE concertID = ?");
                    $stmt -> bindParam(1, $delete);
                    $stmt -> execute();
                }
 







                $stmt = $dbh ->prepare("SELECT * FROM concert, enroll WHERE concert.concertID = enroll.concertID AND enroll.username = ? ");
                $stmt -> bindParam(1, $_SESSION[username]);
                $stmt -> execute();
                
                while($row = $stmt->fetch()){
                     $datetime = new datetime($row[concerttime]);
                     $date = $datetime -> format('Y-m-d');
                     $time_list = explode('-', $date);
                     // echo $time_list[0]." ".$time_list[1]." ".$time_list[2];
                    
                     $dateObj   = DateTime::createFromFormat('!m', $time_list[1]);
                     $monthName = $dateObj->format('F'); 
                     $amount++;



                ?>

                <div class="post_list col_4">
                <a href="concert_detail.php?concertname=<?=$row[concertname]?>&page=1" class="img_more"><img src="<?=$row[cimgurl]?>" alt="image 1"  width='90px' height= '82px' class="img_border img_border_b img_nom" /></a>
                <strong><?=$monthName." ".$time_list[2]." ".$time_list[0]?></strong>
                <h2><a href="news_detail.html"><?=$row[concertname]?></a></h2>

                <a href="view_concertlist.php?delete=<?=$row[concertID]?>&page=1" class="remove">Remove</a>
                <div class="clear"></div>
                </div> 

                
                <?php
                
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
        <br>
        <br>
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
                    <li><a href=".view_concertlist.php?sum=<?=$sum ?>&page=<?=$n ?>" target="_parent"><?=$n ?></a></li>
                <?php
                $n++;
                }
          
                ?>
                <li><a  href="http://www.cssmoban.com/page/9" target="_parent">Next</a></li>
            </ul>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div> <!-- END of templatemo_main -->

	


</body>
</html>