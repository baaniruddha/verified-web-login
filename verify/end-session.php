<?php
session_start();
session_destroy();
header("Location: /index.php");
# Make sure to make this redirect where you want it to, preferably the verification page. To prevent unnecessary redirects.
?>
