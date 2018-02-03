<?php
session_start();
$PROPERTIES = parse_ini_file('configfiles/PROPERTIES.ini');
require_once('connect.php');
?>
<!DOCTYPE html5>
<html>
<head>
  <title><?php print $PROPERTIES['APPLICATION_TITLE'];?></title>
  <meta charset="UTF-8">
  <meta name="description" content="<?php print $PROPERTIES['APPLICATION_DESCRIPTION'];?>">
  <meta name="author" content="Maarten van der Heijden">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/main.js"></script>
</head>
<body>
</body>
</html>
