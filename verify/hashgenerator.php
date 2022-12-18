<?php
if (isset($_POST["key"])) {
  $key = trim($_POST["key"]);
  $hashedkey = password_hash(
    base64_encode(
      hash("sha256", $key, true)
    ),
    PASSWORD_DEFAULT
  );
  if (strlen($key) >= 8 && strlen($key) <= 32) {
    $message = "🏷 Your BCRYPT hashed password is<br><br><span style=\"background-color:white;color:navy;overflow-wrap:break-word;font-weight:bold\">$hashedkey</span>";
  } else {
    $message = "🔖 enter in a password that is at least 8 characters, but no more than 32.";
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
            <font color="yellow">BCRYPT Hash Generator</font>
        </h1>
        <h2>
            <font color="#d9d4af">Please enter a key to be hashed<br> for use in the verification system.</font>
        </h2>
    <form action="hashgenerator.php" method="post" autocomplete="off">
            <div class="input-box">
                <br>
                <input type="password" name="key" id="key" maxlength="32" required/>
                <label>📌 Key</label>
            </div>
            <br><button type="submit" name="login">Generate 🗜</button><br>
          <font color="cyan">               
                <div class="error">     
                    <p>
                        <?php if (isset($message)) echo "    <p>$message</p>\n"; ?>
                    </p>               
                </div>     
            </font>
<hr size=2 noshade>
                   <marquee behavior="slide" direction="left" scrollamount="50">
                    <center>
            <font color="#BFFF00">Website is protected by password and<br>access is guarded and restricted</font>
                   </marquee>
                    </center>
    </form>
</div>
<div class="footer">
        <p><font color="#004821"><a style="text-decoration:none" href="/"><font color="navy">Website is currently under construction and almost ready!</font><br></a><p>We'll be back very soon. Thank you for your patience.</p></font></p>
    </div>
  </body>
</html>
