<?php

//
if(!function_exists("pr") && !function_exists("pre")) { 
	//print formatted array
	function pr($str){
		echo "<pre>";
		print_r($str);
		echo "</pre>";
	}
	//print formatted array and exit
	function pre($str){
		pr($str);
		exit(0);
	}
}

function hideErrors(){
	error_reporting(0);
}

//
function createPageHeader($page){
	hideErrors();
	//
	$page_arr=array(
		"Home"=>"index.php",
		"Chi Siamo"=>"chi_siamo.php",
		"News"=>"news.php",
		"Eventi"=>"eventi.php",
		"Galleria"=>"galleria.php",
		"Contattaci"=>"contattaci.php",
	);
	//
	echo "
	<!DOCTYPE HTML>
	<html>
	<head>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=ISO-8859-1\">
		<title>Amici di Carola</title>
		<link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\"/>
		<link href=\"css/bootstrap.css\" rel='stylesheet' type='text/css' />
		
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src=\"js/jquery.min.js\"></script>
		
		<!-- Custom Theme files -->
		<link href=\"css/style.css\" rel='stylesheet' type='text/css' />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"css/magnific-popup.css\">
		
		<!-- Custom Theme files -->
		<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
		
		<script type=\"application/x-javascript\">
			addEventListener(\"load\", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		
		<!--start-smoth-scrolling-->
		<script type=\"text/javascript\" src=\"js/move-top.js\"></script>
		<script type=\"text/javascript\" src=\"js/easing.js\"></script>
		
		<script type=\"text/javascript\">
			jQuery(document).ready(function($) {
				$(\".scroll\").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
		
		<link href='http://fonts.googleapis.com/css?family=Arimo:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700|Open+Sans:400italic,600italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	</head>
	
	
	<body>
		<div class=\"main bg-effect\">
		</div>

		<div style=\"position:absolute; left:0; right:0; z-index:9999; overflow-x:hidden;\">
			<div>
				<div class=\"header\">
					<div class=\"container\">
						<!-- logo -->
						<div class=\"logo\">
							<a href=\"index.php\">
								<img src=\"images/logo.png\" title=\"Amici di Carola\" />
								<h1>Amici di Carola</h1>
								<span>ONLUS</span>
							</a>
						</div>
						<!-- /logo -->
						<!-- top-nav -->
						<div class=\"top-nav\">
							<span class=\"menu\">
							</span>
							<ul>";
	//menu
	foreach($page_arr as $pa_k=>$pa_v){
		echo "						<li class=\"".($pa_v==$page?"active":"")."\">
									<a class=\"top-nav-item\" href=\"".$pa_v."\">".$pa_k."</a>
								</li>";
	}
	//
	echo "							
								<div class=\"clearfix\"> </div>
							</ul>
						</div>
					</div>
					
					<!-- script-for-nav -->
					<script>
						$(document).ready(function(){
							$(\"span.menu\").click(function(){
								$(\".top-nav ul\").slideToggle(300);
							});
						});
					</script>
					<!-- script-for-nav -->
					
					<!-- /top-nav -->
					<div class=\"clearfix\">
					</div>
					
				</div>
			</div>
	";
}

function createPageFooter(){
	echo"			
					<!--//End-foote-->
					<script type=\"text/javascript\">
						$(document).ready(function() {
						/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear' 
						};
						*/
						$().UItoTop({ easingType: 'easeOutQuart' });
					});
					</script>
					<a href=\"#\" id=\"toTop\" style=\"display: block;\"> <span id=\"toTopHover\" style=\"opacity: 1;\"> </span></a>
				</div>
			</div>
		</div>
	</body>
	</html>";
}

//
function getFbArr(){
	$fb_arr=array(
		"app_id"=>"798693420200388",
		"app_pw"=>"65dc2b21fdfe05505752f2045be7c4ec",
		//"access_token"=>"798693420200388|WkUYM6V5l4xMkwVHsBWEhaVFyrU",
		"access_token"=>"CAACEdEose0cBABIRE0k1Mhk9Yghvpnirofwjh2YJ5CulO1KpmPmPh8QYIqURMkuAQNIGFpxoQAOdiua9XaFGPzCV3h1PUUT4JqdsPvcWLH1R6O7fGNcQbZAnyNxraQVGR7UFEjGXpvBeRZCsOJE3oNxz5g0aoIdMK6FFQdfOLomvV9p7xmEuvY0DqOZAjm5ZCfOilSAlhP2Tj4wOJOU6",
		//
		//"page_id"=>"228231327239925", //Ovas Logistix
		//"page_id"=>"1580758738847218", //Pagina a caso
		"page_id"=>"246776938837029", //Amici di Carola
	);
	//
	return $fb_arr;
}

//
function getFbJsonEvents(){
	$fb_arr=getFbArr();
	//
	$fb_arr["year_range"]="4";
	$fb_arr["fields"]="id,name,description,location,venue,timezone,start_time,cover";
	$fb_arr["since_date"] = date('Y-01-01', strtotime('-' . $fb_arr["year_range"] . ' years'));
	$fb_arr["until_date"] = date('Y-01-01', strtotime('+' . $fb_arr["year_range"] . ' years'));
	$fb_arr["since_unix_timestamp"] = strtotime($fb_arr["since_date"]);
	$fb_arr["until_unix_timestamp"] = strtotime($fb_arr["until_date"]);
	//
	$json_link="https://graph.facebook.com/".$fb_arr["page_id"]."/events/attending/?fields=".$fb_arr["fields"]."&access_token=".$fb_arr["access_token"]."&since=".$fb_arr["since_unix_timestamp"]."&until=".$fb_arr["until_unix_timestamp"];
	//
	$json = file_get_contents($json_link);
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	//
	return $obj;
}
//
function createFbEventsTable($obj){
	$fb_arr=getFbArr();
	//echo "<table class='table table-responsive table-bordered' style=\"background-color:rgba(240, 163, 109, 0.85);\">";
	//
	// count the number of events
	$event_count = count($obj['data']);
	
	for($x=0; $x<$event_count; $x++){
		//date
		$start_date = 	getDayName(date("w",strtotime($obj['data'][$x]['start_time'])))." ".
				date("d", strtotime($obj['data'][$x]['start_time']))." ".
				getMonthName(date("n",strtotime($obj['data'][$x]['start_time'])))." ".
				date("Y", strtotime($obj['data'][$x]['start_time']));
		//hour
		$start_time = date('H:i', strtotime($obj['data'][$x]['start_time']) - 60 * 60 * 0);
		//
		//img
		$pic_big = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/".$fb_arr["page_id"]."/picture?type=large";
		//
		$eid = $obj['data'][$x]['id'];
		$name = $obj['data'][$x]['name'];
		$location = isset($obj['data'][$x]['location']) ? $obj['data'][$x]['location'] : "";
		$description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
		//
		/*echo "
			<tr><td rowspan='3' style='width:20em;'><img src='{$pic_big}' width='200px' /></td></tr>
			
			<tr><td style=\"font-size:155%;vertical-align:middle;\"><b><div>{$name}</div></b></td></tr>
			<tr><td style=\"font-size:120%;vertical-align:middle;\">
				<div style=\"margin-bottom:10px;\">{$start_date} alle ore {$start_time}</div>
				<div style=\"margin-bottom:10px;\">{$location}</div>
				<div style=\"margin-bottom:10px;\">-</div>
				<div style=\"margin-bottom:10px;\">{$description}</div>
				<div style=\"margin-bottom:10px;\"><a style=\"color:blue;text-decoration:underline;\" href='https://www.facebook.com/events/{$eid}/' target='_blank'>Vai a Facebook</a></div>
			</td></tr>
		";*/
		
		echo "<table class='table table-hover table-responsive table-bordered shadow-effect' style=\"background-color:rgba(200, 200, 200, 0.70);margin-bottom:40px;\">";
		echo "<tr>";
		echo "<td rowspan='6' style='width:20em;'>";
		echo "<img src='{$pic_big}' width='200px' />";
		echo "</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td style='width:15em;'>Cosa:</td>";
		echo "<td><b>{$name}</b></td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Quando:</td>";
		echo "<td>{$start_date} alle {$start_time}</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Dove:</td>";
		echo "<td>{$location}</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Descrizione:</td>";
		echo "<td>{$description}</td>";
		echo "</tr>";
		
		echo "<tr>";
		echo "<td>Link Facebook:</td>";
		echo "<td>";
		echo "<a style=\"color:blue;text-decoration:underline;\" href='https://www.facebook.com/events/{$eid}/' target='_blank'>Vai a Facebook</a>";
		echo "</td>";
		echo "</tr>";
		echo"</table>";
	}
}
//
function getDayName($num){
	$day_arr=array(
		"0"=>"Domenica",
		"1"=>"Lunedì",
		"2"=>"Martedì",
		"3"=>"Mercoledì",
		"4"=>"Giovedì",
		"5"=>"Venerdì",
		"6"=>"Sabato",
	);
	//
	return $day_arr[$num];
}
//
function getMonthName($num){
	$month_arr=array(
		"1"=>"Gennaio",
		"2"=>"Febbraio",
		"3"=>"Marzo",
		"4"=>"Aprile",
		"5"=>"Maggio",
		"6"=>"Giugno",
		"7"=>"Luglio",
		"8"=>"Agosto",
		"9"=>"Settembre",
		"10"=>"Ottobre",
		"11"=>"Novembre",
		"12"=>"Dicembre",
	);
	//
	return $month_arr[$num];
}

//
function getFbJsonAlbums(){
	$fb_arr=getFbArr();
	//
	$json_link = "http://graph.facebook.com/".$fb_arr["page_id"]."/albums?fields=id,name,description,link,cover_photo,count";
	//
	$json = file_get_contents($json_link);
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	//
	return $obj;
}
//
function createFbAlbumsGallery($obj){
	$album_count = count($obj['data']);
	//
	for($x=0; $x<$album_count; $x++){
		$id = $obj['data'][$x]['id'];
		$name = $obj['data'][$x]['name'];
		$description = $obj['data'][$x]['description'];
		$link = $obj['data'][$x]['link'];
		$cover_photo = $obj['data'][$x]['cover_photo'];
		$count = $obj['data'][$x]['count'];
		//
		// if you want to exclude an album, just add the name on the if statement
		if($name!="Profile Pictures" && $name!="Cover Photos" && $name!="Timeline Photos"){
			$show_pictures_link = "foto.php?album_id={$id}&album_name={$name}";
			//
			echo "<div class='col-md-4'>";
			echo "<a href='{$show_pictures_link}'>";
			echo "<img class='img-responsive shadow-effect' src='https://graph.facebook.com/{$cover_photo}/picture' alt=''>";
			echo "</a>";
			echo "<h3>";
			echo "<a href='{$show_pictures_link}'>{$name}</a>";
			echo "</h3>";
			//
			$count_text="Photo";
			if($count>1){
				$count_text="Foto";
			}
			//
			echo "<p>";
			echo "<div style='color:#888;'>{$count} {$count_text} / <a style=\"color:blue;text-decoration:underline;\" href='{$link}' target='_blank'>Vai a Facebook</a></div>";
			echo $description;
			echo "</p>";
			echo "</div>";
		}
	}
}
//
function getFbJsonPhotos($album_id){
	$fb_arr=getFbArr();
	//
	$json_link = "http://graph.facebook.com/".$album_id."/photos?fields=source";
	//
	$json = file_get_contents($json_link);
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	//
	return $obj;
}
//
function createFbPhotosGallery($obj){
	$photo_count = count($obj['data']);
	//
	for($x=0; $x<$photo_count; $x++){
		$source = $obj['data'][$x]['source'];
		//
		echo "<a href='{$source}' data-gallery>";
		echo "<div class='photo-thumb shadow-effect3' style='margin: 0 1em 1em 0;background: url({$source}) 50% 50% no-repeat;'>";
		//
		echo "</div>";
		echo "</a>";
	}
}

//
function getFbJsonFeeds(){
	$fb_arr=getFbArr();
	$fb_arr["limit"] = 10;
	$fb_arr["fields"] = "id,message,picture,link,name,description,type,icon,created_time,from,object_id";
	//
	//aggiungere il parametro per la lingua&locale=it_IT
	$json_link = "https://graph.facebook.com/".$fb_arr["page_id"]."/feed?access_token=".$fb_arr["access_token"]."&fields=".$fb_arr["fields"]."&limit=".$fb_arr["limit"];
	//
	$json = file_get_contents($json_link);
	$obj = json_decode($json, true);
	
	return $obj;
}
//
function createFbFeedsTable($obj){
	$fb_arr=getFbArr();
	$fb_arr["photo_src"] = "https://graph.facebook.com/".$fb_arr["page_id"]."/picture?type=square";
	//
	$feed_item_count = count($obj['data']);
	//
	echo "	<style>
		.profile-info{
		    overflow:hidden;
		}
		 
		.profile-photo{
		    float:left;
		}
		 
		.profile-photo img{
		    width:40px; height:40px;
		}
		 
		.profile-name{
		    float:left; margin:0 0 0 .5em;
		}
		 
		.time-ago{
		    color:#999;
		}
		 
		.profile-message{
		    margin:1em 0;
		}
		 
		.post-link{
		    text-decoration:none;
		}
		 
		.post-content{
		    background: #f6f7f9; border: 1px solid #d3dae8; overflow:hidden;
		}
		 
		.post-content img{
		    width:100%;
		}
		 
		.post-status{
		    margin:.5em; font-weight:bold;
		}
		 
		.post-picture{
		    width:25%; float:left;
		}
		 
		.post-info{
		    width:70%; float:left; margin:.5em;
		}
		 
		.post-info-name{
		    font-weight:bold;
		}
		 
		.post-info-description{
		    color:#999;
		}
		</style>";
	//
	echo "	<div class='col-lg-12'>";
	//
	for($x=0; $x<$feed_item_count; $x++){
		// to get the post id
		$id = $obj['data'][$x]['id'];
		$post_id_arr = explode('_', $id);
		$post_id = $post_id_arr[1];
		//
		// user's custom message
		$message = $obj['data'][$x]['message'];
		//
		// picture from the link
		$picture = $obj['data'][$x]['picture'];
		$picture_url_arr = explode('&url=', $picture);
		$picture_url = isset($picture_url_arr[1]) ? urldecode($picture_url_arr[1]) : $picture_url_arr[0];
		//
		// link posted
		$link = $obj['data'][$x]['link'];
		//
		// name or title of the link posted
		$name = $obj['data'][$x]['name'];
		//
		$description = $obj['data'][$x]['description'];
		$type = $obj['data'][$x]['type'];
		//
		// when it was posted
		$created_time = $obj['data'][$x]['created_time'];
		$converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
		$ago_value = time_elapsed_string($converted_date_time);
		//
		// from
		$page_name = $obj['data'][$x]['from']['name'];
		//
		// useful for photo
		$object_id = $obj['data'][$x]['object_id'];
		//
		//
		//
		echo "
			<div class='row shadow-effect' style='background-color:rgba(200, 200, 200, 0.50);margin-bottom:40px;padding:10px 0px 10px 10px;'>
				<div class='col-md-4'>
					<div class='profile-info'>
						<div class='profile-photo'>
							<img src='".$fb_arr["photo_src"]."' />
						</div>
						<div class='profile-name'>
							<div>
								<a href='https://fb.com/".$fb_arr["page_id"]."' target='_blank'>{$page_name}</a> 
								ha condiviso 
		";
		//
		if($type=="status"){
			$link="https://www.facebook.com/".$fb_arr["page_id"]."/posts/{$post_id}";
		}
		else if($type=="event"){
			$link="https://www.facebook.com".$link;
		}
		//
		switch($type){
			case "status":
			echo "uno ";
			$type_fix="stato";
			break;
			
			case "event":
			echo "un ";
			$type_fix="evento";
			break;
			
			case "photo":
			echo "una ";
			$type_fix="foto";
			break;
			
			case "link":
			echo "un ";
			$type_fix="link";
			break;
			
			case "video":
			echo "un ";
			$type_fix="video";
			break;
		}
		//
		echo "
								<a href='{$link}' target='_blank'>{$type_fix}</a>
							</div>
							<div class='time-ago'>".$ago_value."</div>
						</div>
					</div>
					
					<div class='profile-message'>{$message}</div>
				</div>
				
				<div class='col-md-8'>
					<a href='{$link}' target='_blank' class='post-link'>
						<div class='post-content'>
		";
		//
		if($type=="status"){
			echo "
							<div class='post-status'>
							Vai a Facebook
							</div>
			";
		}
		else if($type=="photo"){
			echo "				<img src='https://graph.facebook.com/{$object_id}/picture' />";
		}
		else{
			if($picture_url){
				echo "
							<div class='post-picture'>
								<img src='{$picture_url}' />
							</div>
				";
			}
			echo "
							<div class='post-info'>
								<div class='post-info-name'>{$name}</div>
								<div class='post-info-description'>{$description}</div>
							</div>
			";
		}
		echo "
						</div>
					</a>
				</div>
			</div>
		";
	}
	//
	echo "	</div>";
}

// to get 'time ago' text
function time_elapsed_string($datetime, $full = false) {
 
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
 
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
 
    $string = array(
        'y' => array('anno','anni'),
        'm' => array('mese','mesi'),
        'w' => array('settimana','settimane'),
        'd' => array('giorno','giorni'),
        'h' => array('ora','ore'),
        'i' => array('minuto','minuti'),
        's' => array('secondo','secondi'),
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . ($diff->$k > 1 ? $v[1] : $v[0]);
        } else {
            unset($string[$k]);
        }
    }
 
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' fa' : 'just now';
}

?>

