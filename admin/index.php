<?php

ini_set('display_errors',1); 
error_reporting(E_ALL);

require_once(str_replace("/admin","",dirname(__FILE__))."/lib/sql.php");

if(isset($_GET['filter'])){
    $query="SELECT hashtag.origin, hashdetail.id, hashdetail.hash, hashdetail.username, hashdetail.site_value, hashdetail.approved, hashdetail.image_full, hashdetail.image_thumb FROM hashdetail inner join hashtag on hashdetail.hash=hashtag.hash where hashdetail.hash='".$_GET['filter']."';";
}else{
    $query="SELECT hashtag.origin, hashdetail.id, hashdetail.hash, hashdetail.username, hashdetail.site_value, hashdetail.approved, hashdetail.image_full, hashdetail.image_thumb FROM hashdetail inner join hashtag on hashdetail.hash=hashtag.hash where hashdetail.approved=0;";
}
$result = mysql_fetchAll($query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Instagallery!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="../less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="../less/responsive.less" type="text/css" /-->
	<!--script src="../js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="../js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="../img/favicon.png">
  
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/bootbox.min.js"></script>
	<script type="text/javascript" src="../js/jquery.preview.js"></script>
	<script type="text/javascript" src="../js/scripts.js"></script>
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">

      <div class="logo">
        <img src="../img/InstaGalleryLogo.png" />
      </div>

			<div class="jumbotron well">
				<h1>
					Approve!
				</h1>
				<p>
					Please use the grid below to approve pending images.
				</p>
			</div>
      <form action="./" method="get">
        <label>Filter by Hashtag: </label><input name="filter" type="txt">
      </form>
      <a href="../cron/instaCron.php?refresh=Now">Refresh</a>
<?php

			echo '<table class="table table-hover table-condensed table-bordered" id="approvetable">';
			echo '<thead>';
			echo '<tr>';
			echo '<th>Actions</th>';
			echo '<th>Status</th>';
			echo '<th>Hash</th>';
			echo '<th>Site Value</th>';
			echo '<th>Thumbnail</th>';
			echo '</tr>';
			echo '</thead>';
			echo '<tbody>';
			foreach ($result as $row)
			{
			   echo '<tr id="ordrrow-'.$row["id"].'">';
			   echo '<td> <a class="btn btn-danger block-photo" href="" id="'.$row["id"].'">Block</a> <a class="btn btn-success approve-photo" href="" id="'.$row["id"].'">Approve</a> </td>';
			   echo '<td id="status_'.$row["id"].'">'.$statusvalue[$row["approved"]].'</td>';
			   echo "<td>".$row["hash"]."</td>";
			   echo '<td><a href="'.$row["origin"].'" target="_blank">'.$row["site_value"].'</a></td>';
			   echo '<td> <a rel="'.$row["image_full"].'" class="screenshot"><img src="'.$row["image_thumb"].'"></a></td>';

			   echo "</tr>";
			}
			echo '</tbody>';
			echo "</table>";

?>
		</div>
	</div>
</div>
</body>
</html>





<script type="text/javascript">
var isfilterset = "<?php if(isset($_GET['filter'])){ echo 'true'; } else { echo 'false';} ?>";


$('.block-photo').click(function(e) {
    var id = $(this).attr('id');
    e.preventDefault();
   // bootbox.confirm("Are you sure? ", function(r) {
       // if (r) {
            //sent request to delete order with given id
            $.ajax({
                type: 'post',
                url: 'approvephoto.php',
                data: {row_id: id, task: 'block'},
                success: function(b) {
                    if (b) {
                        //delete row
                        if (isfilterset == 'true')
                        {
                          $('td#status_'+id).html('Blocked');
                        }
                        else
                        {
                          $('tr#ordrrow-' + id).remove();
                        }
                    } else {
                        //failed to delete, sent noty in
                        noty({
                            text: "Failed to delete, please try again later",
                            layout: "topCenter",
                            type: "alert",
                            timeout: 3
                        });
                    }
                }
            });
        //}
    //});
});


$('.approve-photo').click(function(e) {
    var id = $(this).attr('id');
    e.preventDefault();
    //bootbox.confirm("Are you sure? ", function(r) {
    //    if (r) {
            //sent request to delete order with given id
            $.ajax({
                type: 'post',
                url: 'approvephoto.php',
                data: {row_id: id, task: "approve"},
                success: function(b) {
                    if (b) {
                        //delete row
                        if (isfilterset == 'true')
                        {
                          $('td#status_'+id).html('Approved');
                        }
                        else
                        {
                          $('tr#ordrrow-' + id).remove();
                        }
                    } else {
                        //failed to delete, sent noty in
                        noty({
                            text: "Failed to delete, please try again later",
                            layout: "topCenter",
                            type: "alert",
                            timeout: 3
                        });
                    }
                }
            });
       // }
    //});
});

</script>





