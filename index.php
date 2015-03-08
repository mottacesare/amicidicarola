<?php

require_once("utils.php");
//
createPageHeader("index.php");

echo "	
	<!--start-parts-->
	<div class=\"parts-section\">
		<div class=\"container\">
			<div class=\"portfolio-top\">
				<div id=\"portfoliolist\">

					<div class=\"portfolio app mix_all\" data-cat=\"app\" style=\"display: inline-block; opacity: 1;\">
						<div class=\"portfolio-wrapper\">		
							<a href=\"chi_siamo.php\" class=\"b-link-stripe b-animate-go   swipebox\"  title=\"Image Title\">
								<img src=\"images/menu_chi_siamo2.jpg\" /><div class=\"b-wrapper\"><h2 class=\"b-animate b-from-left    b-delay03 \"><img src=\"images/search.png\" alt=\"\"/></h2>
							</div></a>
						</div>
						<div class =\"small-text\">
							<h5>Chi Siamo</h5>
							<!--<p>Lorem ipsum</p> -->
						</div>
					</div>

					<div class=\"portfolio photo mix_all\" data-cat=\"photo\" style=\"display: inline-block; opacity: 1;\">
						<div class=\"portfolio-wrapper\">		
							<a href=\"eventi.html\" class=\"b-link-stripe b-animate-go   swipebox\"  title=\"Image Title\">
								<img src=\"images/menu_eventi.jpg\" /><div class=\"b-wrapper\"><h2 class=\"b-animate b-from-left    b-delay03 \"><img src=\"images/search.png\" alt=\"\"/></h2>
							</div></a>
						</div>
						<div class =\"small-text\">
							<h5>Eventi</h5>
							<!--<p>Lorem ipsum</p> -->
						</div>
					</div>

					<div class=\"portfolio card mix_all\" data-cat=\"card\" style=\"display: inline-block; opacity: 1;\">
						<div class=\"portfolio-wrapper\">		
							<a href=\"news.html\" class=\"b-link-stripe b-animate-go   swipebox\"  title=\"Image Title\">
								<img src=\"images/menu_news.jpg\" /><div class=\"b-wrapper\"><h2 class=\"b-animate b-from-left    b-delay03 \"><img src=\"images/search.png\" alt=\"\"/></h2>
							</div></a>
						</div>
						<div class =\"small-text\">
							<h5>News</h5>
							<!--<p>Lorem ipsum</p> -->
						</div>
					</div>

					<div class=\"portfolio photo mix_all\" data-cat=\"photo\" style=\"display: inline-block; opacity: 1;\">
						<div class=\"portfolio-wrapper\">		
							<a href=\"galleria.html\" class=\"b-link-stripe b-animate-go   swipebox\"  title=\"Image Title\">
								<img src=\"images/menu_galleria.jpg\" /><div class=\"b-wrapper\"><h2 class=\"b-animate b-from-left    b-delay03 \"><img src=\"images/search.png\" alt=\"\"/></h2>
							</div></a>
						</div>
						<div class =\"small-text\">
							<h5>Galleria</h5>
							<!--<p>Lorem ipsum</p> -->
						</div>
					</div>

					<div class=\"portfolio photo mix_all\" data-cat=\"photo\" style=\"display: inline-block; opacity: 1;\">
						<div class=\"portfolio-wrapper\">		
							<a href=\"contattaci.html\" class=\"b-link-stripe b-animate-go   swipebox\"  title=\"Image Title\">
								<img src=\"images/menu_contattaci.jpg\" /><div class=\"b-wrapper\"><h2 class=\"b-animate b-from-left    b-delay03 \"><img src=\"images/search.png\" alt=\"\"/></h2>
							</div></a>
						</div>
						<div class =\"small-text\">
							<h5>Contattaci</h5>
							<!--<p>Lorem ipsum</p> -->
						</div>
					</div>

				</div>
			</div>
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
	</body>
	</html>";
?>

