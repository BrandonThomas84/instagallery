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
    <link rel="stylesheet" type="text/css" href="/css/instagallery.css" media="all">

</head>
<body>
<script>
    // <![CDATA[
    (function($){
        //$(window).on("dataLayerLoaded", function() {
        //if(dataLayer.globals.pageType == "product"){
        var site_url = "http://buildinstagallery.gopagoda.com/";
        //var instagalleryStyle = "<link rel=\"stylesheet\" type=\"text/css\" href=\""+site_url+"css/instagallery.css\" media=\"all\">";
        var instagalleryStruct = "<div id=\"instagallery\"><div id=\"instagallery_info\"><div id=\"instagallery_hash_tag\"></div><div id=\"instagallery_logo\"></div></div><div id=\"instagallery_grams\"></div></div>";
        var instaGalleryAPI = site_url + "api/index.php?a=getPhotos&k=sam1234&f=j&l=4&callback=?";
        $.getJSON( instaGalleryAPI, {
            format: "jsonp"
        })
            .done(function(data){
                // $( instagalleryStyle).appendTo('.product-image');
                $( instagalleryStruct ).appendTo('.product-image');
                $( '#instagallery_hash_tag' ).html( "#"+ data.tag +"<div id=\"instagallery_hash_tag_helper\">Show us your goodies! Upload your photo of this product to Instagram with the tag: <span style=\"font-weight:bold; color: #336699;\">#"+ data.tag +" </span>and we will add it to our page.</div>" );
                // $('a#gallerylink').attr("href", site_url + "gallery.php?filter="+ data.tag)
                if( data.results != "" ){
                    $.each( data.results , function( i, item ){
                        $( "<img>" ).attr( "src", item.thumb ).attr( "height", "50px" ).attr( "width", "50px" ).attr( "border", "0" ).appendTo( "#instagallery_grams" );
                        if ( i === 3 ) {
                            return false;
                        }
                    });
                }
                else{
                    $('#instagallery_grams').html("<div style=\"line-height: 50px; text-align:center;\">No images have been approved yet</div>");
                }

                $('#instagallery').click(
                    function() {
                        openMyModal("gallery.php?filter="+ data.tag, 900, 700);
                    }
                );

            });
        //}
        //});

        var modalWindow = {
            parent:"body",
            windowId:null,
            content:null,
            width:null,
            height:null,
            close:function()
            {
                $(".modal-window").remove();
                $(".modal-overlay").remove();
            },
            open:function()
            {
                var modal = "";
                modal += "<div class=\"modal-overlay\"></div>";
                modal += "<div id=\"" + this.windowId + "\" class=\"modal-window\" style=\"width:" + this.width + "px; height:" + this.height + "px; margin-top:-" + (this.height / 2) + "px; margin-left:-" + (this.width / 2) + "px;\">";
                modal += this.content;
                modal += "</div>";

                /*if(BrowserDetect.browser == 'Explorer'){
                 $(".modal-window").height(document.getElementsByTagName("html").item(0).offsetHeight);
                 }*/

                $(this.parent).append(modal);

                $(".modal-window").append("<a class=\"close-window\"></a>");
                $(".close-window").click(function(){modalWindow.close();});
            }
        };

        var openMyModal = function(source, width, height)
        {
            modalWindow.windowId = "myModal";
            modalWindow.width = width;
            modalWindow.height = height;
            modalWindow.content = "<iframe width='"+ width +"' height='"+ height +"' id='modframe' frameborder='0' scrolling='no' allowtransparency='true' src='" + source + "'></iframe>";
            modalWindow.open();

        };




    })(jQuery);
    // ]]>
</script>
<div class="product-image"></div>
</body>
</html>
