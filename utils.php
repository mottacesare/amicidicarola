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

//
function createPageHeader($page){
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
		<div class=\"main bg-effect\"></div>

		<div style=\"	position: fixed;
				left: 0;
				right: 0;
				z-index: 9999;\">
			<div>
				<div class=\"header\">
					<div class=\"container\">
						<!-- logo -->
						<div class=\"logo\">
							<a href=\"index.php\"><img src=\"images/logo.png\" title=\"Amici di Carola\" />
								<h1>Amici di Carola</h1><span>ONLUS</span></a>
							</div>
							<!-- /logo -->
							<!-- top-nav -->
							<div class=\"top-nav\">
								<span class=\"menu\"> </span>
								<ul>";
	//menu
	foreach($page_arr as $pa_k=>$pa_v){
		echo "<li class=\"".($pa_v==$page?"active":"")."\"><a class=\"top-nav-item\" href=\"".$pa_v."\">".$pa_k."</a></li>";
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
						<div class=\"clearfix\"> </div>
						</div>
					</div>
	";
}

//
function getFbArr(){
	$fb_arr=array(
		"app_id"=>"798693420200388",
		"app_pw"=>"65dc2b21fdfe05505752f2045be7c4ec",
		"access_token"=>"798693420200388|WkUYM6V5l4xMkwVHsBWEhaVFyrU",
		//
		"page_id"=>"1580758738847218",//Pagina a caso
		//"page_id"=>"228231327239925",//Ovas Logistix
	);
	//
	return $fb_arr;
}

//
function getFbJsonEvent(){
	$fb_arr=getFbArr();
	//
	$fb_arr["year_range"]="4";
	$fb_arr["fields"]="id,name,description,location,venue,timezone,start_time,cover";
	$fb_arr["since_date"] = date('Y-01-01', strtotime('-' . $fb_arr["year_range"] . ' years'));
	$fb_arr["until_date"] = date('Y-01-01', strtotime('+' . $fb_arr["year_range"] . ' years'));
	$fb_arr["since_unix_timestamp"] = strtotime($fb_arr["since_date"]);
	$fb_arr["until_unix_timestamp"] = strtotime($fb_arr["until_date"]);
	
	$json_link="https://graph.facebook.com/".$fb_arr["page_id"]."/events/attending/?fields=".$fb_arr["fields"]."&access_token=".$fb_arr["access_token"]."&since=".$fb_arr["since_unix_timestamp"]."&until=".$fb_arr["until_unix_timestamp"];
	//
	$json = file_get_contents($json_link);
	$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
	//
	return $obj;
}

//
function createFbEventTable($obj){
	echo "<table class='table table-responsive table-bordered' style=\"background-color:rgba(240, 163, 109, 0.85);\">";
	
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
		$pic_big = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/{$fb_page_id}/picture?type=large";
		//
		$eid = $obj['data'][$x]['id'];
		$name = $obj['data'][$x]['name'];
		$location = isset($obj['data'][$x]['location']) ? $obj['data'][$x]['location'] : "";
		$description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
		//
		echo "
			<tr><td rowspan='3' style='width:20em;'><img src='{$pic_big}' width='200px' /></td></tr>
			
			<tr><td style=\"font-size:155%;vertical-align:middle;\"><b><div>{$name}</div></b></td></tr>
			<tr><td style=\"font-size:120%;vertical-align:middle;\">
				<div style=\"margin-bottom:10px;\">{$start_date} alle ore {$start_time}</div>
				<div style=\"margin-bottom:10px;\">{$location}</div>
				<div style=\"margin-bottom:10px;\">-</div>
				<div style=\"margin-bottom:10px;\">{$description}</div>
				<div style=\"margin-bottom:10px;\"><a style=\"color:blue;text-decoration:underline;\" href='https://www.facebook.com/events/{$eid}/' target='_blank'>Vai a Facebook</a></div>
			</td></tr>
		";
	}
	echo"</table>";
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

?>

