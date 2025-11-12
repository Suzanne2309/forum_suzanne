<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout

    public function register () {}
    public function login () {}
    public function logout () {}

    //Méthodes liées au profil
    public function profil($id) {
        //On veut récupérer les informations d'un profil donc il faut d'abord accéder aux informations dans la base de données
        $userManager = new UserManager();
        $topicManager = new TopicManager();
        $user = $userManager->findOneById($id);


        return [
            "view" => VIEW_DIR."security/profil.php",
            "meta_description" => "Profil de ".$user,
            "data" => [
                "user" => $user
            ]
        ];
    }

    public function listTopicsByUser($id) {

        $topicManager = new TopicManager();
        $userManager = new UserManager();
        $user = $userManager->findOneById($id);
        $topics = $topicManager->findTopicsByUser($id);

        return [
            "view" => VIEW_DIR."security/profil.php",
            "meta_description" => "Liste des topics par utilisateur : ".$user,
            "data" => [
                "user" => $user,
                "topics" => $topics
            ]
        ];
    }

}