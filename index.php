<?php

// root url, change this to /mia for instance to prefix every url with /mia
$siteRoot = "/";

$tpls = array(
    "index" => array(
        "tpl" => "tpl/index.php", 
        "nav_name" => "Menu1", 
        "active" => false),
    "about" => array(
        "tpl" => "tpl/about.php", 
        "nav_name" => "Über Uns", 
        "active" => false),
);

if (isset($_GET["id"])) {
    $tpl = $tpls[ $_GET["id"] ]["tpl"];
    $tpls[ $_GET["id"] ]["active"] = true;
} else {
    $tpl = $tpls["index"]["tpl"];   
    $tpls["index"]["active"] = true; 
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Pia Pflegeteam</title>
    <link rel="icon" href="<?php echo $siteRoot ?>style/img/favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" href="<?php echo $siteRoot ?>style/img/favicon.ico" type="image/x-icon"/> 
    <link rel="stylesheet" type="text/css" href="<?php echo $siteRoot ?>style/lib/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $siteRoot ?>style/style.css"/>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
</head>

<body>
    <div id="site">
        
        <header></header>
        
        <nav>
            <ul>
                <?php
                    foreach ($tpls as $tplId => $tplData) {
                        echo "<li";

                        if($tplData["active"]){
                            echo " class=\"active\" ";
                        }

                        echo "><a href=\"?id=" . $tplId . "\"";
                        echo ">" . $tplData["nav_name"] . "</a></li>";
                    }
                ?>
            </ul>
        </nav>
        
        <div id="content">
            <?php
            include_once($tpl);
            ?>
        </div>
        
        <footer>
            <ul>
                <li><a href="<?php echo $siteRoot ?>agb/">AGB</a></li>
                <li>·</li>
                <li><a href="<?php echo $siteRoot ?>agb/">Impressum</a></li>
            </ul>
        </footer>

    </div>
</body>
    
</html>
