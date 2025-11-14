<?php
namespace Model\Managers;

use App\Manager;
use App\DAO;

class CommentManager extends Manager{

    // on indique la classe POO et la table correspondante en BDD pour le manager concerné
    protected $className = "Model\Entities\Comment";
    protected $tableName = "comment";

    public function __construct(){
        parent::connect();
    }

    // récupérer tous les commentaires d'un topic spécifique (par son id)
    public function findCommentsByTopic($id) {

        $sql = "SELECT * 
                FROM ".$this->tableName." t 
                WHERE t.topic_id = :id";
       
        // la requête renvoie plusieurs enregistrements --> getMultipleResults
        return  $this->getMultipleResults(
            DAO::select($sql, ['id' => $id]), 
            $this->className
        );
    }
}