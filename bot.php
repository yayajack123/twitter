<?php
 // load library twitteroauth
 require_once __DIR__.'/twitteroauth/autoload.php';
 use Abraham\TwitterOAuth\TwitterOAuth;

 // API key
 // ganti dengan API key anda
 $key = '1sCfXmheY1o4BwyVe0KkQqbGr';
 $secret_key = '5ZLBDg8TmbvhLu4rlm5X5r4WsLZrL5mKVv1CM9VDqOdmSOoenM';
 $token = '1112930097189683201-WpT5xdEmiFKRgnG0mzP7RRDI5xSoen';
 $secret_token = 'SzGgACE6WeGS0rVG2gfeCL9TrY6aqWxKNKueoqWCHvl9y';

 function randomline( $filename )
{
    $lines = file( $filename );
    return $lines[array_rand( $lines )];
}
$tweet = "Om swastyastu";

// Posting Tweet
$connection = new TwitterOAuth($key, $secret_key, $token, $secret_token);
$eksekusi = $connection->post('statuses/update', array('status' => $tweet));
if($eksekusi=0) {
echo "<center>Gagal</center>";
}
else {
echo "<center>Berhasil. Silahkan cek Timeline</center>";
}

?>