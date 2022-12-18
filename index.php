<?php
session_start();
if ($_SESSION["verified"]) {
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Secret Content!</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="verify/verification.css">
  </head>
  <body>
    <center><h1><font color="white">স্বাগতম!</font></h1><h2><font color="#660033">এই ওয়েবসাইটটি এখনো নির্মাণাধীন। <br />আপডেটের কাজ চলমান রয়েছে।</font></h2> <br/>তাই চাইলে <a href="/verify/end-session.php">বের হয়ে যেতে পারেন</a>...</center>
  </body>
</html>
<?php
} else {
  header("Location: verify/verification.php?continue=" . $_SERVER["SCRIPT_NAME"]);
}
?>
