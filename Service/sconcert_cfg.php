<?php include("../Util/DButil.php");

        // $_SESSION[concertname] = $_GET[keyword_concertname];
        // $_SESSION[style] = $_GET[keyword_concertstyle];
        // $_SESSION[artist] = $_GET[keyword_artists];
    // echo $_POST["keyword_concertname"];
        $concertname = $_POST["keyword_concertname"];
        $concertStyle = $_POST["keyword_concertstyle"];
        $artist = $_POST["keyword_artists"];
        $timeradio = $_POST["timeradio"];
        $timerange1 = $_POST["timerange1"];
        $timerange2 = $_POST["timerange2"];
        $state = $_POST["state"];      
        $city = $_POST["city"];
        $keyword = $_POST["keyword"];
        echo "STATE ".$state;
        echo "CITY ".$city;
        echo "keyword".$keyword;


        $_SESSION[concertname] = $concertname;
        $_SESSION[concertStyle] = $concertStyle;
        $_SESSION[artist] = $keyword_artists;
        $_SESSION[timeradio] = $timeradio;
        $_SESSION[timerange1] =  $timerange1;
        $_SESSION[timerange2] = $timerange2;
        $_SESSION[state] = $state;
        $_SESSION[city] =  $city;
        $_SESSION[keyword] = $keyword;
        echo "keyword is ".$_SESSION[keyword];



        for($i = 1 ; $i < 41 ; $i++){
            unset($_SESSION['concert'.$i]);
        }

        // echo $concertname." ".$concertStyle." ".$timerange2;
        try{

            // $concert_sql = "SELECT * FROM concert WHERE 1=1";
            // if($concertname !=null){
            //     $concert_sql = $concert_sql." "."concertname = ?";
            // }
                echo $concertStyle;
                $sql = "SELECT distinct concert.concertname, concert.info, concert.concerttime, concert.cimgurl FROM concert, ctype, type, attend, artist, venue, review WHERE 1=1";
                if($concertname!=null&&$concertname!=""){
                    echo $concertname;
                    $sql = $sql." AND concert.concertname LIKE ?";
                    // $stmt = $dbh -> prepare("SELECT * FROM concert WHERE concertname LIKE :term1");

                    }
                if($concertStyle!=null&&$concertStyle!=""){
                        $sql = $sql." AND concert.concertID = ctype.concertID AND ctype.typeid = type.typeid AND type.typename LIKE ?";
                       
                        
                    }
                if($artist !=null&&$artist!=""){
                        $sql = $sql." AND attend.username = artist.username AND attend.concertID = concert.concertID AND artist.name LIKE ?";
                        
                    } 

                        // if($timeradio !=null){

                            if($timerange1!=null && $timerange1!=""){
                                    echo $timerange1;
                                if($timerange2 ==null||$timerange2 == ""){
                                    // echo $timerange1;

                                    $sql = $sql." AND concert.concerttime > STR_TO_DATE(?,'%Y-%m-%d') ";
                                }
                                if($timerange2!=null && $timerange2 !=""){
                                    echo $timerange2;
                                    if($timerange1 == $timerange2){
                                        echo $timerange1;
                                        echo $timerange2;
                                        $sql = $sql." AND DATE(concert.concerttime) =  STR_TO_DATE(?,'%Y-%m-%d')";
                                    }else if($timerange1 != $timerange2){
                                        
                                    $sql = $sql." AND concert.concerttime BETWEEN STR_TO_DATE(?,'%Y-%m-%d' ) AND STR_TO_DATE(?,'%Y-%m-%d')";
                                    }
                                }
                        }else{
                                if($timerange2!=null && $timerange2!=""){
                                    $sql = $sql." AND concert.concerttime < STR_TO_DATE(?, '%Y-%m-%d')";
                                }
                            }
                        // } 

                        if($state!=null && $state != ""){
                            echo "get state".$state;
                            $sql = $sql." AND concert.venueid = venue.venueid AND venue.state LIKE ?";
                            echo $sql;

                        }

                        if($city!=null && $city != ""){
                            echo "get city".$city;
                            $sql = $sql." AND concert.venueid = venue.venueid AND venue.city LIKE ? ";
                            echo $sql;
                        } 

                        if($keyword != null && $keyword != ""){
                            $sql = $sql." AND concert.concertID = review.concertID AND review.rwcontent LIKE ?";
                            echo "get keyword: ".$keyword;
                            echo $sql;
                        }

                        $sql = $sql." LIMIT 0,40";
                        $stmt = $dbh -> prepare($sql);
                        $i = 1;


                    // *******************************************************************************************************

                    if($concertname!=null&&$concertname!=""){
                        echo "sql_concertname";
                        $p_concertname  = "%".$concertname."%";
                        $stmt -> bindParam($i, $p_concertname);
                        echo $i;
                        $i++;

                    }

                     if($concertStyle != null && $concertStyle != ""){
                        $p_concertStyle = "%".$concertStyle."%";
                        $stmt -> bindParam($i, $p_concertStyle);

                        $i++;
                     }

                     if($artist !=null && $artist != ""){
                        echo "looking for artist ".$artist;
                        $p_artistname = "%".$artist."%";
                        $stmt -> bindParam($i, $p_artistname);

                        $i++;
                        
                    } 

                             // if($timeradio !=null){
                                if($timerange1!=null && $timerange1!=""){
                                    if($timerange2 == null||$timerange2 ==""){
                                        $stmt -> bindParam($i, $timerange1);
                                        $i++;
                                    }
                                    
                                    if($timerange2!=null && $timerange2 !=""){
                                    if($timerange1 == $timerange2){
                                        echo "timerange1 = timerange2";
                                        $stmt -> bindparam($i,$timerange1);
                                        $i++;
                                    }else if($timerange1 != $timerange2){ 
                                        echo "timerange1 != timerange2 ";
                                        $stmt -> bindParam($i, $timerange1);
                                        $i++;
                                        $stmt -> bindParam($i, $timerange2);
                                        $i++;
                                    }
                                    }

                                }else{
                                     if($timerange2!=null && $timerange2!=""){
                                        $stmt -> bindParam($i, $timerange2);
                                        $i++;
                                    }
                                }

                            if($state!=null && $state != ""){
                                $p_state = "%".$state."%";
                                $stmt -> bindParam ($i, $p_state);
                                $i++;

                            }

                            if($city!=null && $city != ""){
                                $p_city = "%".$city."%";
                                $stmt -> bindParam ($i, $p_city);
                                $i++;
                            } 

                            if($keyword != null && $keyword != ""){
                                $p_keyword = "%".$keyword."%";
                                $stmt -> bindParam ($i, $p_keyword);
                                $i++;

                            }

                            // }
                    // echo $sql;
                    // print_r(mysql_fetch_array(mysql_query($sql)));


                    // $row_test = mysql_fetch_array($result);
                    // echo $row_test[concert.concertname];

                $stmt->execute();
                $j = 0;
               
                while($row = $stmt -> fetch()){
                    $j ++ ;
                    $_SESSION['concert'.$j] = $row;
                    echo "row is".$row[0];
                    // echo $row[concertname]." ";
                    // echo $row[concertStyle]." ";
                    // echo $row[concerttime]." ";
                    // echo $row[info];   

                    // // echo $row[concertID]." ";
                    // // echo $row[concert.concertname]." ";
                    // // echo $row[concert.concerttime]." ";
                    // // echo $row[concert.info];
                    // // echo $row[venueid]." ";
                    // // echo $row[price]." ";
                    // // echo $row[availability]." ";
                    // // echo $row[posttime]." ";
                    // // echo $row[ticketlink]." ";
                    // // echo $row[username]." ";
                    // // echo $row[cimgurl];

                 // $datetime = new datetime($row[concerttime]);
                 // $date = $datetime -> format('Y-m-d');
                 // $time_list = explode('-', $date);
                 // // echo $time_list[0]." ".$time_list[1]." ".$time_list[2];
                
                 // $dateObj   = DateTime::createFromFormat('!m', $time_list[1]);
                 // $monthName = $dateObj->format('F');

                // echo $monthName;
              

     }   
    }catch(PDOException $e){
            print "ERROR!:".$e->getMessage()."<br/>";
            die();

        }

        echo "<script language=\"javascript\">location.href='../concert.php?sum=$j&page=1';</script>";
    

        
    ?>
            
           <!--  <div class="post_list col_4">
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
            </div>  
            <div class="clear"></div> -->
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
        </div>   -->
      