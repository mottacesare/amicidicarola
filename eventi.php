<?php

require_once("utils.php");
//
createPageHeader("eventi.php");

echo "	
	<!--start-parts-->
	<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
		<div class=\"container\">
		
			<div style=\"height:100px;\">
			</div>";

$fb_events=getFbJsonEvents();
createFbEventsTable($fb_events);

echo"			<!--//End-foote-->
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
	</body>
	</html>";
?>
