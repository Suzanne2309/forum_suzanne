<?php
namespace Model\Entities;

use App\Entity;

/*
    En programmation orientée objet, une classe finale (final class) est une classe que vous ne pouvez pas étendre, c'est-à-dire qu'aucune autre classe ne peut hériter de cette classe. En d'autres termes, une classe finale ne peut pas être utilisée comme classe parente.
*/

final class Topic extends Entity{

    private $id_post;
    private $title;
    private $text;
    private $user_id;
    private $category;
    private $publicationDate;
    private $closed;

    public function __construct($data){         
        $this->hydrate($data);        
    }

    /**
     * Get the value of id
     */ 
    public function getIdPost(){
        return $this->id_post;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setIdPost($id_post){
        $this->id_post = $id_post;
        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle(){
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title){
        $this->title = $title;
        return $this;
    }

    /**
     * Get the value of text
     */ 
    public function getText(){
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return  self
     */ 
    public function setText($text){
        $this->text = $text;
        return $this;
    }

    /**
     * Get the value of publicationDate
     */ 
    public function getPublicationDate(){
        return $this->publication_date;
    }

    /**
     * Set the value of publicationDate
     *
     * @return  self
     */ 
    public function setPublicationDate($publicationDate){
        $this->publication_date = $publicationDate;
        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUserID(){
        return $this->user_id;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUserID($user_id){
        $this->user_id = $user_id;
        return $this;
    }

    public function __toString(){
        return $this->title;
    }
}