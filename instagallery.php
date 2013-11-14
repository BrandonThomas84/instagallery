<?php
	//BUILD_A_THON IV instagallery 

	//makes call to api service and receives json rply for gallery to pass back to site via satellite injection. 

	//make the call
		//ajax call to api/index 
		// index.php?a=action&k=key&f=format

		// Actions (a):
		// 	getPhotos
		// 	getTag

		// Key (k):
		// 	Unique id passed to the service per product.

		// Fromat (f):
		// 	Return format
		// 	-j for json

		// Return:


	//build gallery object

	//send to site via sattellite

?>
<!DOCTYPE html>
<html>	
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="js/scripts.js"></script>
		<style type="text/css">
			#instagallery{
				width: 380px;
				padding: 3px;
				background: #f6f6f6;
				border: 1px solid #dfdfdf;
			}
			#info{
				float: left;
				height: 40px;
				width: 104px;
				margin-right: 5px;
			}
			#hash_tag{
				padding: 3px;
				border: 1px solid #cccccc;
				border-radius: 3px;
				display: inline-block;
				background-color: #fff;
				color: #336699;
				cursor: pointer;
				width: 96px;
				height: 17px;
				vertical-align: middle;
				float: left;
				margin-right: 5px;
				font-family: helvetica;
			}
			#hash_tag:hover{ 
				box-shadow: inset 0px 0px 3px rgba(90,90,90,.2);
			}
			#hash_tag_helper{
				position: relative;
				left: 20px;
				z-index: 1000;
				background: rgba(255,255,255,.95);
				color: #666;
				padding: 5px;
				border: 1px solid #fff;
				border-radius: 3px;
				float:left;
				width: 300px;
				box-shadow: 1px 1px 5px #aaa;
				display: none;
				font-size: 12px;
			}
			#hash_tag:hover #hash_tag_helper{
				display: block;
			}
			#logo{
				height: 20px;
				width: 102px;
				background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAARgAAABSCAYAAACPOssyAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2hpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMy1jMDExIDY2LjE0NTY2MSwgMjAxMi8wMi8wNi0xNDo1NjoyNyAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDowMTgwMTE3NDA3MjA2ODExODIyQTg5QzNGRUNGRDU2OSIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo2N0I0RDEwNDQ1NkExMUUzQkQxM0I0MjVCRTgzMzI2MiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo2N0I0RDEwMzQ1NkExMUUzQkQxM0I0MjVCRTgzMzI2MiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M2IChNYWNpbnRvc2gpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDI4MDExNzQwNzIwNjgxMTgyMkE4OUMzRkVDRkQ1NjkiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDE4MDExNzQwNzIwNjgxMTgyMkE4OUMzRkVDRkQ1NjkiLz4gPC9yZGY6RGVzY3Jp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);
				background-size: contain;
				background-position: center center;
				background-repeat: no-repeat;
				position: relative;
				float: left;
				margin-top: 5px;
				opacity: 0.3;
			}
			#grams{
				color: #ccc;
				height: 50px;
				/*border: 1px solid green;*/
			}
			#grams img{
				border-radius: 3px;
				float: left;
			}
			#grams div{
				float: left;
				height: 50px;
				width: 50px;
				background-color: #ccc;
				color: #fff;
				font-size: 10px;
			}
		</style>
	</head>
	<body>
		<script>
			(function() {
			  var instaGalleryAPI = site_url + "api/index.php?a=getPhotos&k=sam1234&f=j&l=5";
			  $.getJSON( instaGalleryAPI, {
			    format: "json"
			  })
			    .done(function(data){
			    	$( '#hash_tag' ).html( "#"+ data.tag +"<div id=\"hash_tag_helper\">Show us your goodies! Upload your photo of this product to Instagram with the tag: <span style=\"font-weight:bold; color: #336699;\">#"+ data.tag +" </span>and we will add it to our page.</div>" );
                    $('a#gallerylink').attr("href", site_url + "gallery.php?filter="+ data.tag)
			    	if( data.results != "" ){ 
			    		$.each( data.results , function( i, item ){
			    			$( "<img>" ).attr( "src", item.thumb ).attr( "height", "50px" ).attr( "width", "50px" ).attr( "border", "0" ).appendTo( "#grams" );
			    		    if ( i === 4 ) {
					          return false;	
					        }
						});
			    	}
			    	else{
			    		$('#grams').html("<div style=\"line-height: 50px; text-align:center;\">No images have been approved yet</div>");
			    	}

			    });
			})();
		</script>
		<a id="gallerylink" href="">
			<div id="instagallery">
				<div id="info">
					<div id="hash_tag"></div>
					<div id="logo"></div>
				</div>
				<div id="grams"></div>	
			</div>
		</a>
	</body>
</html>
