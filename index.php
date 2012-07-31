<?php

// root url, change this to /mia for instance to prefix every url with /mia
$siteRoot = "/";

$tpls = array(
    "index" => array(
        "tpl" => "tpl/index.php", 
        "link_name" => "Über uns", 
        "active" => false,
        "navigation" => true),
    "about" => array(
        "tpl" => "tpl/contact.php", 
        "link_name" => "Kontakt & Bewerbung", 
        "active" => false,
        "navigation" => true),
    "impressum" => array(
        "tpl" => "tpl/impressum.php", 
        "link_name" => "Impressum", 
        "active" => false,
        "navigation" => false),
    "agb" => array(
        "tpl" => "tpl/agb.php", 
        "link_name" => "AGB", 
        "active" => false,
        "navigation" => false),
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
    <link rel="shortcut icon" href="<?php echo $siteRoot ?>img/favicon.png" type="image/x-icon"/> 
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
                        // ignore non nav links
                        if(!$tplData["navigation"]){
                            continue;
                        }

                        echo "<li";

                        if($tplData["active"]){
                            echo " class=\"active\" ";
                        }

                        echo "><a href=\"?id=" . $tplId . "\"";
                        echo ">" . $tplData["link_name"] . "</a></li>";
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
                <li><a href="?id=agb"><?php echo $tpls["agb"]["link_name"]; ?></a></li>
                <li>·</li>
                <li><a href="?id=impressum"><?php echo $tpls["impressum"]["link_name"]; ?></a></li>
            </ul>
        </footer>

    </div>
</body>
    
</html>
