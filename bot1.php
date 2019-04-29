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

 $connection = new TwitterOAuth($key, $secret_key, $token, $secret_token);
 $statuses = $connection->get("statuses/home_timeline", ["count" => 25, "exclude_replies" => true]);

 foreach ($statuses as $status){

    $usname = $status->user->screen_name;
    $location = $status->user->created_at;
    $text = $status->text;
    $text1 = "halo juga";
    if(strcmp($text,"halo")){
        $tweet = $usname.' '.$text1;
        $connection->post('statuses/update', array('status'=>$tweet));
    }
    ?>
 <b>@<?php echo $usname; ?></b><br>
 <b><?php echo $location; ?></b><br>
 <p><?php echo $text; ?></p>
 <hr>


 <?php } ?>
