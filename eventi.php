<?php

require_once("utils.php");
//
createPageHeader("eventi.php");
//
echo "	
			<!--start-parts-->
			<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
				<div class=\"container\">
					
					<div style=\"height:75px;\">
						<h3>Eventi</h3>
					</div>";

$fb_events=getFbJsonEvents();
createFbEventsTable($fb_events);
//
createPageFooter();

?>
