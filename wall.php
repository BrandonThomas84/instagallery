<?php
if(isset($_REQUEST['tag'])){
    $tag = $_REQUEST['tag'];
}else{
    $tag = 'sam_1234';
}
?>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <title>Instagallery</title>
    <link rel="stylesheet" href="css/basic.css" type="text/css" />
    <link rel="stylesheet" href="css/galleriffic-2.css" type="text/css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.galleriffic.js"></script>
    <script type="text/javascript" src="js/jquery.opacityrollover.js"></script>
    <!-- We only want the thunbnails to display when javascript is disabled -->
    <script type="text/javascript">
        document.write('<style>.noscript { display: none; }</style>');
    </script>
</head>
<body>
<div id="page">
    <div id="container">
        <h1><div class="logo"><img src="img/InstaGalleryLogo.png" /></div></h1>
        <div id="cooliris-wall">
            <object id="ci_25733_o" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="100%" height="575">
                <param name="movie" value="http://apps.cooliris.com/embed/cooliris.swf"/>
                <param name="allowFullScreen" value="true"/>
                <param name="allowScriptAccess" value="always"/>
                <param name="bgColor" value="#000000" />
                <param name="flashvars" value="http://local.instagallery.com/data/rss.php?tag=<?php echo $tag ?>&amp;backgroundalpha=0.0&amp;numRows=3&amp;showEmbed=false&amp;showChrome=false&amp;showFullScreen=false" />
                <param name="wmode" value="transparent" />
                <embed id="ci_25733_e" type="application/x-shockwave-flash" src="http://apps.cooliris.com/embed/cooliris.swf" width="100%" height="575" allowFullScreen="true" allowScriptAccess="always" bgColor="#000000" flashvars="feed=http://local.instagallery.com/data/rss.php?tag=<?php echo $tag ?>&amp;backgroundalpha=0.0&amp;numRows=3&amp;showEmbed=false&amp;showChrome=false&amp;showFullScreen=false" wmode="transparent"></embed>
            </object>
        </div>

        <div style="clear: both;"></div>
    </div>
</div>
<div id="footer">Brad / Bones / Sam / Haas</div>
</body>
</html>