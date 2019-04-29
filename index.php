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

// CONSUMER_KEY = 'm6ZfomtQ8LS9RLv8etLVdzAQm'
// CONSUMER_SECRET = 'FtOfh4EShIAwgoUxYatDpi8FNe1ksdK4W1n126MMFfHQ1NJXW2'
// ACCESS_KEY = '1116904069975511041-fiofco3IeWw5KDYcSyyBwimPQCEvPm'
// ACCESS_SECRET = '8fNbO0LpZ22PSRFvg7gDrbesw3yPJhxiWtoi1Qq6qP9zD'

 // mengambil tweet dari akun bandung
 $conn = new TwitterOAuth($key, $secret_key, $token, $secret_token);
 $response = $conn->get('statuses/mentions_timeline');

 // jika button kirim di klik
 if (isset($_POST['update'])) {

  // mengambil varibale dari POST
  $usname = $_POST['usname'];
  $text = $_POST['text'];

  // set tweet yang akan di kirim
  $tweet = $usname.' '.$text;

  // kirim status ke twitter
  $conn->post('statuses/update', array('status'=>$tweet));
 }
?>
<!DOCTYPE html>
<html>
<head>
<title>REPLY TWEET DENGAN PHP</title>
<script type="text/javascript">
 function show_form(number) {
  _('text-'+ number).value = '';

  var el = _('form-'+ number);
  var data = el.getAttribute('data-show');

  if (data == 'false') {
   el.style.display = 'block';
   el.setAttribute('data-show', 'true');
  } else {
   el.style.display = 'none';
   el.setAttribute('data-show', 'false');
  }
 }

 function _(element) {
  return document.getElementById(element);
 }
</script>
</head>
<body>
<h3>REPLY TWEET DENGAN PHP</h3>
<a href="bot.php">Pindah</a>
<a href="bot1.php">Pindah</a>

<hr />
<?php
 $i = 1;
 foreach ($response as $status) {

  //set variable
  $usname = $status->user->screen_name;
  $date = date('d M Y H:i A', strtotime($status->created_at));
  $text = $status->text;
  
?>
<b>@<?php echo $usname; ?></b> <small><?php echo $date; ?></small><br />
<p><?php echo $text; ?></p>
<p><a href="javascript:show_form(<?php echo $i; ?>);">balas tweet</a></p>
<form action="index.php" method="POST" id="form-<?php echo $i; ?>" style="display: none" data-show="false">
<input type="hidden" name="usname" value="@<?php echo $usname; ?>">
<textarea placehlder="Masukan pesan" name="text" id="text-<?php echo $i; ?>"></textarea><br />
<button name="update">KIRIM</button>
</form>
<hr />
<?php $i++; } ?>
</body>
