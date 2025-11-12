<?php
namespace Controller;

use App\AbstractController;
use App\ControllerInterface;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {}
    public function login () {}
    public function logout () {}

    //Méthodes liées au profil
    public function profil($id) {
        //On veut récupérer les informations d'un profil donc il faut d'abord accéder aux informations dans la base de données
        $userManager = new UserManager();
        $user = $userManager->findOneById($id);

        return [
            "view" => VIEW_DIR."security/profil.php",
            "meta_description" => "Profil d'un utilisateur",
            "data" => [
                "user" => $user
            ]
        ];
    }
}