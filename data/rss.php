<?php
require_once(str_replace("/data","",dirname(__FILE__))."/lib/functions.php");
$tag = $_GET['tag'];
$mysql_query = 'SELECT * FROM hashdetail where hash = "'.$tag.'" and approved=1';

$mysql_results = mysql_fetchAll($mysql_query);
?>
<?php echo '<?'; ?>xml version="1.0" encoding="utf-8" standalone="yes"<?php echo '?>'; ?>
<rss version="2.0" xmlns:media="http://search.yahoo.com/mrss/" xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>HELLO THERE</title>
        <description>TAG WALL</description>
        <link>http://local.instagallery.com/</link>
        <?php foreach($mysql_results as $key => $result):
                $imgSm = $result['image_thumb'];
                $imgLg = $result['image_full'];
            ?>
            <item>
                <title><?php echo htmlspecialchars($result['username']); ?></title>
                <media:description><?php echo htmlspecialchars($result['text']); ?></media:description>

                <media:thumbnail url="<?php echo $imgSm; ?>"/>
                <media:content url="<?php echo $imgLg; ?>"/>
            </item>
        <?php endforeach; ?>
    </channel>
</rss>