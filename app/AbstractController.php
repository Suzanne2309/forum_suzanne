<?php
namespace App;

/*
    En programmation orientée objet, une classe abstraite est une classe qui ne peut pas être instanciée directement. Cela signifie que vous ne pouvez pas créer un objet directement à partir d'une classe abstraite.
    Les classes abstraites : 
    -- peuvent contenir à la fois des méthodes abstraites (méthodes sans implémentation) et des méthodes concrètes (méthodes avec implémentation).
    -- peuvent avoir des propriétés (variables) avec des valeurs par défaut.
    -- une classe peut étendre une seule classe abstraite.
    -- permettent de fournir une certaine implémentation de base.
*/

abstract class AbstractController{

    public function index() {}

    public function redirectTo($ctrl = null, $action = null, $id = null){ //On défini la valeur de base des paramètres à null 
        $url = $ctrl ? "?ctrl=".$ctrl : ""; //Si on a un controleur il prendra alors la valeur dans l'url
        $url.= $action ? "&action=".$action : ""; //Si on a une action elle prendra alors la valeur dans l'url
        $url.= $id ? "&id=".$id : ""; //Si on a un id il prendra alors la valeur dans l'url

        header("Location: $url"); //On utilise header location en mettant l'url
        die();
    }

    public function restrictTo($role){
        
        if(!Session::getUser() || !Session::getUser()->hasRole($role)){
            $this->redirectTo("security", "login");
        }
        return;
    }

}