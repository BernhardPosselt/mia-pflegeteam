<?php

// root url, change this to /mia for instance to prefix every url with /mia
$siteRoot;
$tpls = array(
    "index" => "tpl/index.php"
);

if (isset($_GET["id"])) {
    $tpl = $tpls[ $_GET["id"] ];
} else {
    $tpl = $tpls["index"];    
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Mia Pflegeteam</title>
    <link rel="icon" href="<?php echo $siteRoot ?>style/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo $siteRoot ?>style/img/favicon.ico" type="image/x-icon"/> 
    <link rel="stylesheet" type="text/css" href="<?php echo $siteRoot ?>style/lib/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $siteRoot ?>style/style.css"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>

<body>
    <div id="site">
        <header></header>
        <nav></nav>
        <div id="content">
        <?php
        include_once($tpl);
        ?>
        </div>
        <footer></footer>
    </div>
</body>
    
</html>
