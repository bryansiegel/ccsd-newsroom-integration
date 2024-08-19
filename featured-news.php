<?php

//API endpoint
$api_url = 'https://comi1.dream.press/wp-json/wp/v2/posts?categories=183';

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $api_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPGET, true);

// Add authentication header (Basic Auth)
// $username = 'staging_kx7bw2';
// $password = 'q8pNzMKdVEcH';
// curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");

// Execute the request and store the response
$response = curl_exec($curl);

// Check if the request was successful
if ($response === false) {
    echo 'cURL Error: ' . curl_error($curl);
} else {
    // Decode the JSON response into a PHP array
    $posts = json_decode($response, true);

    // Check if decoding was successful
    if (json_last_error() === JSON_ERROR_NONE) {
        // Process the posts

        // var_dump($posts); ?>
        <div id="news_box">

            <?php

            foreach ($posts as $post) { ?>

                <a href="<?php echo $post['link']; ?>" id="news_item_1" data-item="1" class="current news-item-wrap clearfix"
                    style="top: 0; opacity: 1;text-decoration:none !important;">
                    <!-- <div style="position: relative;width:960px;height:425px;"> -->
                    <div style="position: relative;">
                        <img class="news-img" style="top: 0;" src="<?php echo $post['jetpack_featured_media_url']; ?>"
                            alt="News Image" />
                        <div class="news-copy-wrap" style="top: 255px !important;">
                            <div class="news-copy">
                                <h3 style="text-decoration:none !important; top:-50px;"><?php echo $post['title']['rendered']; ?>
                                </h3>
                            </div>
                            <div>
                                <a href="<?php echo $post['link']; ?>" class="more-link"
                                    style="margin-top:65px;margin-left:20px">Read more</a>
                            </div>
                        </div>
                        <div class="news-shadow"></div>
                    </div>
                </a>
            </div>
            </div>

            <?php
            //loop only once
            break;
            }
    } else {
        echo 'JSON Decode Error: ' . json_last_error_msg();
    }
    // Close the cURL session
    curl_close($curl);
}
?>