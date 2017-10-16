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
        "id" => $_POST['id'],
        "author" => $_POST['meno'],
        "ingrediencies" => explode(", ",$_POST["indgred"]),
        "name" => $_POST['nazov'],
        "process" => $_POST["priprava"]
    );
    $json = json_encode($recipe);
    print_r($json);
    $pole = $client->editRecipe($json);
    header('Location: index.php');
}


?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">

<html>
<head>
    <title>Uprav Recept</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="width: 500px; margin: auto auto">
<form class="form" style=" margin: 40px auto;" method="post" action="<?php print $_SERVER['PHP_SELF']?>">

    <fieldset>

        <input style="width:70%" type="hidden" name="id" id="id" value="<?php echo $_GET['id'] ?>" /><br>

        <label style="width:20%; float: left; height: 21px" for="meno">Meno:</label>
        <input style="width:70%" type="text" name="meno" id="meno" value="<?php echo $_GET['meno'] ?>"/><br>

        <label style="width:20%; float: left; height: 21px" for="nazov">Nazov:</label>
        <input style="width:70% " type="text" name="nazov" id="nazov" value="<?php echo $_GET['nazov'] ?>"/><br>

        <label style="width:20%; float: left; height: 21px" for="ingred">Ingrediencie:</label>
        <input style="width:70%" type="text" name="indgred" id="ingred" value="<?php echo $_GET['ingred'] ?>"/><br>

        <label style="width:20%; float: left; height: 21px" for="priprava">Priprava:</label>
        <input style="width:70%" type="text" name="priprava" id="priprava" value="<?php echo $_GET['priprava'] ?>"/><br>
        <input type="submit" value="ulozit" style="width:40%; float: right">
    </fieldset>
</form>
</body>
</html>