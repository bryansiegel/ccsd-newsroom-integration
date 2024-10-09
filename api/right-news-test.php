<?php require_once('fetch/right-news.php'); ?>

            <div id="news_story_3">
                <a href="<?php echo $post['link']; ?>">
                    <div class="story-img">
                        <img src="<?php echo $post['jetpack_featured_media_url']; ?>" alt="<?php echo $post['title']['rendered']; ?>" height="169" width="310">
                    </div>
                    <div class="story-headline">
                        <?php echo $post['title']['rendered']; ?>
                    </div>
                </a>
            </div>

