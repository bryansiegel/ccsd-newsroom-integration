<?php require_once('fetch/featured-news.php') ?>


<div id="news_box">
    <a href="<?php echo $featured[0]['link']; ?>" id="news_item_1" data-item="1" class="current news-item-wrap clearfix"
        style="top: 0; opacity: 1;text-decoration:none !important;">
        <!-- <div style="position: relative;width:960px;height:425px;"> -->
        <div style="position: relative;">
            <img class="news-img" style="top: 0;" src="<?php echo $featured[0]['jetpack_featured_media_url']; ?>"
                alt="<?php echo $featured[0]['title']['rendered']; ?>" />
            <div class="news-copy-wrap" style="top: 320px !important;">
                <div class="news-copy">
                    <h3 style="text-decoration:none !important; top:-50px;font-size: 38px !important;">
                        <?php echo $featured[0]['title']['rendered']; ?>
                    </h3>
                </div>
            </div>
            <div class="news-shadow"></div>
        </div>
    </a>
</div>
</div>