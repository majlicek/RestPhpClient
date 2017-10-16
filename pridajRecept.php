<?php
/**
 * Created by PhpStorm.
 * User: chras
 * Date: 29.02.2016
 * Time: 10:50
 */
require_once "client.php";
$client  = new Client();

if (!empty($_POST)) {

    $recipe = array(
        "author" => $_POST['meno'],
        "ingrediencies" => explode(", ",$_POST["indgred"]),
        "name" => $_POST['nazov'],
        "process" => $_POST["priprava"]
    );
    $json = json_encode($recipe);
    $pole = $client->newRecipe($json);
    //    print_r($json);
    header('Location: index.php');
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">

<html>
<head>
    <title>Pridaj Recept</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="width: 500px; margin: auto auto">
<form class="form" method="post" action="<?php print $_SERVER['PHP_SELF']?>" styles="width: 50%; margin: 40px auto;">

    <fieldset>
        <legend>Pridaj recept</legend>
        <label for="meno">Meno:</label>
        <input style="width:80%" type="text" name="meno" id="meno"/>

        <label for="meno">Nazov:</label>
        <input style="width:80%" type="text" name="nazov" id="nazov"/>

        <label for="meno">Ingrediencie:</label>
        <input style="width:80%" type="text" name="indgred" id="ingred"/>

        <label for="meno">Priprava:</label>
        <input style="width:8s0%" type="text" name="priprava" id="priprava"/>
        <input type="submit" value="ulozit" style="float: right">
    </fieldset>
</form>
</body>
</html>