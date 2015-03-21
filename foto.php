<?php

require_once("utils.php");
//
createPageHeader("foto.php");

echo "	
	<!--start-parts-->
	<div class=\"parts-section\" style=\"height:100%;background-color:rgba(255,255,255,0.75);\">
		<div class=\"container\">
		
			<div style=\"height:75px;\">
				<h3><a href=\"galleria.php\">Galleria</a> > Foto</h3>
			</div>";

$album_id = isset($_GET['album_id']) ? $_GET['album_id'] : die('Album ID not specified.');
$album_name = isset($_GET['album_name']) ? $_GET['album_name'] : die('Album name not specified.');
//
$page_title = "{$album_name} Foto";

echo '	<!DOCTYPE html>
	<html lang="en">
	<head>
	 
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	 
	    <title><?php echo $page_title; ?></title>
	 
	    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	 
	    <!-- blue imp gallery -->
	    <link rel="stylesheet" href="http://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
	    <link rel="stylesheet" href="Bootstrap-Image-Gallery-3.1.1/css/bootstrap-image-gallery.min.css">
	 
	    <style>
	    .photo-thumb{
		width:214px;
		height:214px;
		float:left;
		border: thin solid #d1d1d1;
		margin:0 1em 1em 0;
	    }
	 
	    div#blueimp-gallery div.modal {
		overflow: visible;
	    }
	    </style>
	</head>
	<body>
	 
	<div class="container">';
//
$fb_photos=getFbJsonPhotos($album_id);
createFbPhotosGallery($fb_photos);
//
echo '	</div>
	 
	<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
	<div id="blueimp-gallery" class="blueimp-gallery">
	    <!-- The container for the modal slides -->
	    <div class="slides"></div>
	    <!-- Controls for the borderless lightbox -->
	    <h3 class="title"></h3>
	    <a class="prev">‹</a>
	    <a class="next">›</a>
	    <a class="close">×</a>
	    <a class="play-pause"></a>
	    <ol class="indicator"></ol>
	    <!-- The modal dialog, which will be used to wrap the lightbox content -->
	    <div class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" aria-hidden="true">&times;</button>
		            <h4 class="modal-title"></h4>
		        </div>
		        <div class="modal-body next"></div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-default pull-left prev">
		                <i class="glyphicon glyphicon-chevron-left"></i>
		                Previous
		            </button>
		            <button type="button" class="btn btn-primary next">
		                Next
		                <i class="glyphicon glyphicon-chevron-right"></i>
		            </button>
		        </div>
		    </div>
		</div>
	    </div>
	</div>
	 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	 
	<script src="http://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="Bootstrap-Image-Gallery-3.1.1/js/bootstrap-image-gallery.min.js"></script>
	 
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<!--//End-foote-->
	<script type=\"text/javascript\">
		$(document).ready(function() {
		/*
		var defaults = {
		containerID: "toTop", // fading element id
		containerHoverID: "toTopHover", // fading element hover id
		scrollSpeed: 1200,
		easingType: "linear" 
		};
		*/
		$().UItoTop({ easingType: "easeOutQuart" });
	});
	</script>
	<a href=\"#\" id=\"toTop\" style=\"display: block;\"> <span id=\"toTopHover\" style=\"opacity: 1;\"> </span></a>
	 
	</body>
	</html>';

?>
