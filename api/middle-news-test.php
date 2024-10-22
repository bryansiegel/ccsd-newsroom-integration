<?php //require_once('fetch/middle-news.php'); ?>

<?php 
//newsroom.ccsd.net Middle CCSD Category
$jsonFile = file_get_contents('/www/apache/htdocs/ccsd/_includes/api/json/middle-news.json');

$post = json_decode($jsonFile, true);
?>

            <div id="news_story_2">
                <a href="<?php echo $post[0]['link']; ?>">
                    <div class="story-img">
                        <img src="<?php echo $post[0]['jetpack_featured_media_url']; ?>" alt="<?php echo $post[0]['title']['rendered']; ?>" height="169" width="310">
                    </div>
                    <div class="story-headline">
                        <?php echo $post[0]['title']['rendered']; ?>
                    </div>
                </a>
            </div>
