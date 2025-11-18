<?php
namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\CategoryManager;
use Model\Managers\TopicManager;
use Model\Managers\CommentManager;

class ForumController extends AbstractController implements ControllerInterface{

    public function index() {
        
        // créer une nouvelle instance de CategoryManager
        $categoryManager = new CategoryManager();
        // récupérer la liste de toutes les catégories grâce à la méthode findAll de Manager.php (triés par nom)
        $categories = $categoryManager->findAll(["categoryName", "DESC"]);

        // le controller communique avec la vue "listCategories" (view) pour lui envoyer la liste des catégories (data)
        return [
            "view" => VIEW_DIR."forum/listCategories.php",
            "meta_description" => "Liste des catégories du forum",
            "data" => [
                "categories" => $categories
            ]
        ];
    }

    public function listTopics() {
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $topics = $topicManager->findAll(["title", "DESC"]);
        $category = $categoryManager->findAll(["categoryName", "DESC"]);

        return [
            "view" => VIEW_DIR. "forum/listTopics.php",
            "meta_description" => "Liste des topics du forum",
            "data" => [
                "topics" => $topics,
                "category" => $category
            ]
            ];
    }

    public function listTopicsByCategory($id) {

        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findTopicsByCategory($id);

        return [
            "view" => VIEW_DIR."forum/listTopics.php",
            "meta_description" => "Liste des topics par catégorie : ".$category,
            "data" => [
                "category" => $category,
                "topics" => $topics
            ]
        ];
    }

    public function topicDetail($id) {
        $topicManager = new TopicManager();
        $commentManager = new CommentManager();
        $topics = $topicManager->findOneById($id);
        $comments = $commentManager->findCommentsByTopic($id);


        return [
            "view" => VIEW_DIR."forum/topicDetail.php",
            "meta_description" => "Détail du post ".$topics,
            "data" => [
                "topics" => $topics,
                "comments" => $comments
            ]
        ];
    }

    public function addNewCategory() {
        $categoryManager = new CategoryManager();

        if(isset($_POST["submit"])) {
            //filtrer la saisie des champs du formulaire d'ajout d'une catégorie
            $categoryName = filter_input(INPUT_POST, "categoryName", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            if($categoryName) {
                //On définit la donnée filtré à ajouter en base de donnée, dans la colonne correspondante
                $data = ["categoryName" => $categoryName];
                $newCatgory = $categoryManager->add($data);

                header("Location : index.php?ctrl=forum&action=listTopics"); exit;
            }
        };

        return [
            "view" => VIEW_DIR."forum/addCategory.php",
            "meta_description" => "Formulaire d'ajout de catégorie",
            "data" => []
        ];
    }

    public function addTopicToCategory($id) {
        $topicManager = new TopicManager();
        $categoryManager = new CategoryManager();
        $category = $categoryManager->findOneById($id);
        $topics = $topicManager->findAll(["title", "DESC"]);
        
        if(isset($_POST["submit"])) {
            //puisqu'on utilise une liste déroulante, pas besoin de filtrer

            //On définit la donnée à ajouter en base de donnée, dans la colonne correspondante
            $data = ["category_id" => $id];
            $topic = $topicManager->add($data);

            header("Location : index.php?ctrl=forum&action=listTopics)"); exit;
        };


        return [
            "view" => VIEW_DIR."forum/addTopicToCategory.php",
            "meta_description" => "Ajouter un Topic à une catégorie",
            "data" => [
                "category" => $category,
                "topics" => $topics  
            ]
        ];
    }

}