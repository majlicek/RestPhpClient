<?php

include 'httpful.phar';

/**
 * Class Client
 * uses Httpful lubrary
 * http://phphttpclient.com/
 */
class Client {

    /**
     * @return array
     * @throws \Httpful\Exception\ConnectionErrorException
     * vrati vsetky recepty v databaze
     */
    function getAllRecipes(){
        $response = \Httpful\Request::get('http://localhost:8080/recipes')->send();
        return $response;
    }

    /**
     * @param $recipe
     * @return UUID
     * odosle novo vyvoreny recept a vrati UUID, ktore mu bolo vygenerovane
     */
    function newRecipe($recipe){
        $response = \Httpful\Request::post('http://localhost:8080/newrecipe')->body($recipe)->sendsJson()->send();
        return $response;
    }

    /**
     * @param $recipe
     * @return boolean
     * odosle recept s novymi hodnotami na editaciu
     */
    function editRecipe($recipe){
        $response = \Httpful\Request::post('http://localhost:8080/editrecipe')->body($recipe)->sendsJson()->send();
        return $response;
    }

    /**
     * @param $id
     * @return boolean
     * @throws \Httpful\Exception\ConnectionErrorException
     * odosle UUID receptu, ktory ma byt vymazany z databazy
     */
    function deleteRecipe($id){
        $response = \Httpful\Request::get('http://localhost:8080/deleterecipe/'.$id)->send();
        return $response;
    }

    /**
     * @param $keyWord
     * @return array
     * @throws \Httpful\Exception\ConnectionErrorException
     * vrati recepty, ktorych nazov, autor alebo postup obsahuju dane klucove slovo
     */
    function getRecipesByKeyWord($keyWord){
        $response = \Httpful\Request::get('http://localhost:8080/recipes/'.$keyWord)->send();
        return $response;
    }

    /**
     * @param $ings
     * @return array
     * vrati recepty, ktorych zoznam ingred, je kratsi ako zoznam danych ingrediencii a vsetky jeho ingred
     * sa nachadzaju v danom zozname
     */
    function getRecipesByIngs($ings){
        $response = \Httpful\Request::post('http://localhost:8080/recipesbying')->body($ings)->sendsJson()->send();
        return $response;
    }

}

?>