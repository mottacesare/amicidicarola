<?php

require_once("utils.php");
//
createPageHeader("galleria.php");
//
echo "	
	<!--start-parts-->
	<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
		<div class=\"container\">
		
			<div style=\"height:75px;\">
				<h3>Galleria</h3>
			</div>";

$fb_albums=getFbJsonAlbums();
createFbAlbumsGallery($fb_albums);
//
createPageFooter();
?>
