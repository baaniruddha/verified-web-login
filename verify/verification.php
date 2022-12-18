<?php
session_start();
$hashedkey = '$2y$10$jLuhWLlCRXeq2WE3ujgBqOe6w4aeE0MWoAzbUXtTdNonW/EmTcG6m';
# Create a hash for a password with hashgenerator.php; in this case, I used "aniruddha.info"
if (isset($_SESSION["verified"]) && $_SESSION["verified"]) {
  header("Location: ../index.php");
  # Check if a user has been previously verified first, in order to redirect them as quickly as possible.
}

if (isset($_POST["key"])) {
  $key = trim($_POST["key"]);
  $verifiedpassword = password_verify(
    base64_encode(
      hash("sha256", $key, true)
    ),
    $hashedkey
  );
  # Sanitized input to make it easier the enter in the password; it is very easy to strengthen these restrictions, or lessen them.
  if ($verifiedpassword) {
    $_SESSION["verified"] = true;
    $whitelist = ["../index.php"];
    # Add any other pages you wish to be accessible through the continue param.
    $nextpage = $_GET["continue"];
    if (isset($nextpage) && in_array($nextpage, $whitelist)) {
      header("Location: $nextpage");
    } else {
      header("Location: ../");
    }
  } else {
    $error = "🔏 ইনপুটে দেয়া কি সঠিক নয়।<br>পুনরায় চেষ্টা করুন!";
  }
}
?>

<!DOCTYPE HTML>
<html>
  <head>

    <title>সুরক্ষিত ওয়েবসাইট</title>
    <link rel="stylesheet" type="text/css" href="verification.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="shortcut icon" href="#">
    <meta name="author" content="#" />
    <meta name="description" content="#">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta property="og:image" content="#">
    <meta property="og:title" content="#">
    <meta property="og:description" content="#">
    <meta name="og:image" content="#">
    <link rel="image_src" href="#"> 
  </head>
  <body>
    <div class="login">
        <h1>
            <font color="yellow">প্রবেশাধিকার সংরক্ষিত</font>
        </h1>
        <h2>
            <font color="#d9d4af">মূল ওয়েবসাইটে প্রবেশের জন্য<br>সঠিক কি ইনপুট দিয়ে এগিয়ে চলুন</font>
        </h2>
    <form action="verification.php<?php if (isset($_GET["continue"])) echo "?continue=" . htmlentities($_GET["continue"]); ?>" method="post" autocomplete="on">
<font color="cyan">               
                <div class="error">     
                    <p>
                        <?php if (isset($error)) echo "    <p>$error</p>\n"; ?>
                    </p>               
                </div>     
            </font>
            <div class="input-box">
                <br>
                <input type="password" name="key" id="key" required/>
                <label>🔐 কি?</label>
            </div>

            <br><button type="submit" name="login">এগিয়ে চলুন 🔓</button><br>
<hr size=2 noshade>
                   <marquee behavior="slide" direction="left" scrollamount="50">
                    <center>
            <font color="#BFFF00">ওয়েবসাইট কি? দ্বারা সুরক্ষিত এবং <br>প্রবেশাধিকার সংরক্ষিত ও সীমিত</font><br>
            <span><a style="text-decoration: none; color: #d9d4af;" href="mailto:mail@aniruddha.info?cc=mail@web-view.xyz">mail[at]aniruddha.info</a></span>
                   </marquee>
                    </center>
    </form>
</div>
<div class="footer">
        <p><font color="#004821"><a style="text-decoration:none" href="/"><font color="navy">Website is currently under construction and almost ready!</font><br></a><p>We'll be back very soon. Thank you for your patience.</p></font></p>
    </div>
  </body>
</html>
