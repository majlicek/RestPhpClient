<?php
/**
 * Created by PhpStorm.
 * User: chras
 * Date: 29.02.2016
 * Time: 13:06
 */
require_once "client.php";
$client  = new Client();

if (!empty($_GET)) {
    $pole = $client->deleteRecipe($_GET['id']);

    header('Location: index.php');
}