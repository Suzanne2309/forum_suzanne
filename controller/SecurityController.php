<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\TopicManager;
use Model\Managers\UserManager;

class SecurityController extends AbstractController{
    // contiendra les méthodes liées à l'authentification : register, login et logout



    public function register () {
        $userManager = new UserManager();

        if(isset($_POST["submit"])) {
            //filtrer la saisie des champs du formulaire d'inscription
                $pseudonym = filter_input(INPUT_POST, "pseudonym", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $pass1 = filter_input(INPUT_POST, "pass1", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $pass2 = filter_input(INPUT_POST, "pass2", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                if($pseudonym && $email && $pass1 && $pass2) {

                //On vérifie que l'email existe pas déjà
                $user = $userManager->findUserByEmail($email);

            //Si l'utilisateur existe
                    if($user) {
                        header("index.php?ctrl=security&action=login"); exit;
                    } else { //Sinon on va insérer l'utilisateur dans la BDD
                        //On vérifie que le mot de passe soit bien securisé (définir un pattern et utilisation de preg_match) et que les deux champs de mot de passe soit identique
                        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{12,}$/';

                        if($pass1 == $pass2 && preg_match($pattern, $pass1, $pass2)) {

                            $creationDateNow  = date('Y-m-d');
                            //On définit $data pour utiliser ensuite la fonction add($data) crée dans Manager.php
                            $data = ["pseudonym" => $pseudonym, "password" => password_hash($pass1, PASSWORD_DEFAULT), "creationDate" => $creationDateNow,  "email" => $email, "aboutMe" => ""];
                            //utiliser add($data) du Manager.php au lieu d'une rêquette sql
                            //Ainsi pas besoin de créer une fonction pour la rêquette dasn UserManager comme prévu au début, car add existe déjà
                            $user = $userManager->add($data);

                            header("index.php?ctrl=security&action=login"); exit;
                        } else {
                            echo "<p class='message'>Les mots de passe sont pas identique ou mot de passe correspondant pas aux critères !</p>";
                            //message "Les mots de passe sont pas identiques ou mot de passe correspondant pas aux critères !"
                        }
 
                    }
                } else {
                    echo "<p class='message'>Problème de saisie dans les champs de formulaire</p>";
                    // message "Problème de saisie dans les champs de formulaire"
                };
        };

        return [
            "view" => VIEW_DIR."security/registration.php",
            "meta_description" => "Inscription",
            "data" => []
        ];
    }

    public function login () {}
    public function logout () {}

    //Méthodes liées au profil
    public function profil($id) {
        //On veut récupérer les informations d'un profil donc il faut d'abord accéder aux informations dans la base de données
        $userManager = new UserManager();
        $topicManager = new TopicManager();
        $user = $userManager->findOneById($id);
        $topics = $topicManager->findTopicsByUSer($id);


        return [
            "view" => VIEW_DIR."security/profil.php",
            "meta_description" => "Profil de ".$user,
            "data" => [
                "user" => $user,
                "topics" => $topics
            ]
        ];
    }
}