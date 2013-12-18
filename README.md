instagallery
============

Build.com - Build-a-thon (aka Hack-a-thon) project. Proof of concept for an instagram gallery based on unique hash codes.

Colde for linking from satalatte

// <![CDATA[
    (function($) {
        if(dataLayer.page == "product:display"){
        var site_url = "http://buildinstagallery.gopagoda.com/";
        var instagalleryStyle = "<link rel=\"stylesheet\" type=\"text/css\" href=\""+site_url+"css/instagallery.css\" media=\"all\">";
          var instagalleryStruct = "<div id=\"instagallery\" style=\"border-style:solid hidden hidden hidden;\"><div id=\"instagallery_info\"><div id=\"instagallery_hash_tag\"></div><div id=\"instagallery_logo\"></div></div><div id=\"instagallery_grams\"></div></div>";
        var instaGalleryAPI = site_url + "api/index.php?a=getPhotos&k=" + dataLayer.id + "=j&l=4&callback=?";
        $.getJSON( instaGalleryAPI, {
            format: "jsonp"
        })
            .done(function(data){
                $( instagalleryStyle).appendTo('#productImageContainer');
                $( instagalleryStruct ).appendTo('#productImageContainer');
                $( '#instagallery_hash_tag' ).html( "#"+ data.tag +"<div id=\"instagallery_hash_tag_helper\">Show us your goodies! Upload your photo of this product to Instagram with the tag: <span style=\"font-weight:bold; color: #336699;\">#"+ data.tag +" </span>and we will add it to our page.</div>" );
                if( data.results != "" ){
                    $.each( data.results , function( i, item ){
                        $( "<img>" ).attr( "src", item.thumb ).attr( "height", "50px" ).attr( "width", "50px" ).attr( "border", "0" ).attr( "style", "cursor:pointer" ).appendTo( "#instagallery_grams" );
                        if ( i === 3 ) {
                            return false;
                        }
                    });
                 $('#instagallery').click(
                    function() {
                        openMyModal(site_url+"gallery.php?filter="+ data.tag, 900, 700);
                    }
                 );
                }
                else{
                    $('#instagallery_grams').html("<div style=\"line-height: 50px; text-align:center;\">No images have been approved yet</div>");
                }
 
            });
        }
        
 
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
