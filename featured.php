<?php

// Define the API endpoint
$api_url = 'https://https://comi1.dream.press/wp-json/wp/v2/posts?categories=183';

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

        // var_dump($posts);

        foreach ($posts as $post) {
            echo '<strong>Title:</strong> ' . $post['title']['rendered'] . '<br>';
            echo '<strong>Link:</strong> ' . $post['link'] . '<br><br>';
            echo '<strong>Featured Image:</strong> <img src="' . $post['jetpack_featured_media_url'] . '" height="169" width="310" alt="' .$post['title']['rendered'] . '"/><br><br>';
        }
    } else {
        echo 'JSON Decode Error: ' . json_last_error_msg();
    }

    // Close the cURL session
    curl_close($curl);
}
