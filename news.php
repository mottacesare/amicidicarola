<?php

require_once("utils.php");
//
createPageHeader("news.php");
//
echo "	
	<!--start-parts-->
	<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
		<div class=\"container\">
		
			<div style=\"height:100px;\">
			</div>";

$fb_feeds=getFbJsonFeeds();
createFbFeedsTable($fb_feeds);
//
createPageFooter();
?>
