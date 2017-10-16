<?php
/**
 * Created by PhpStorm.
 * User: chras
 * Date: 29.02.2016
 * Time: 10:01
 */
require_once "client.php";
$client  = new Client();
$pole = $client->getAllRecipes();

if (!empty($_POST["filter"])) {

    $pole = $client->getRecipesByKeyWord($_POST["filter"]);
}

if (!empty($_POST["ingred"])) {
//print_r(json_encode(explode(", ",$_POST["ingred"])));
    $pole = $client->getRecipesByIngs(json_encode(explode(", ",$_POST["ingred"])));
}
$stringRepresentation= json_decode($pole);

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN">

<html>
<head>
    <title>Rest</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body style="width: 500px; margin: auto auto">
<h1>Velky Hlad</h1>

<form class="form" style="width:50%; float: left" method="post" action="<?php print $_SERVER['PHP_SELF']?>">

    <fieldset>
        <input type="text" style="width:100%" name="filter" id="filter" placeholder="Vyhladaj Recept"/><br>
        <input type="submit" value="Filtruj Recepty" style="width:100%">
    </fieldset>
</form>
<form class="form" style="width:50%; float: right" method="post" action="<?php print $_SERVER['PHP_SELF']?>">

    <fieldset>
        <input type="text" style="width:100%" name="ingred" id="ingred" placeholder="Vyhladaj recept podla ingrediencii"/><br>
        <input type="submit" value="Filtruj Ingrediencie" style="width:100%">
    </fieldset>
</form>
<a href="pridajRecept.php">Pridaj recept</a>
<?php
//print_r($stringRepresentation);
foreach ($stringRepresentation as $recept){
echo "<ul style='display-list: none'>";
$ingrediencie = '';
    echo "<h4>Recept: $recept->name </h4><br>";
    echo "Od: $recept->author <br>";
    echo "Navod: $recept->process <br> S ingredienciami<ul>";
    foreach ($recept->ingrediencies as $indgred){
        echo "<li>$indgred</li>";
        $ingrediencie =$ingrediencie.$indgred.', ';
    }
    $ingrediencie = trim($ingrediencie, ", ");
    echo"</ul>
       <a href=\"edit.php?id=$recept->id&meno=$recept->author&nazov=$recept->name&ingred=$ingrediencie&priprava=$recept->process\">Edituj recept</a>
       <a href=\"vymaz.php?id=$recept->id\">Vymaz recept</a>
       </ul>";
}
?>

</body>
</html>