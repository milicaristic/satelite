
<?php
include_once "author.php";
class Book{
    private $title;
    private $publication_date;
    private $author;

    function __construct($title,$publication_date,$autor){
        if(!($author instanceof Author)) throw new Exception("Object is not instance of Author!!!");
        if($title=="")  throw new Exception("Title is empty!!!");

        $this->title = $title;
        $this->publication_date = $publication_date;
        $this->author = $author;
    }

    function getTitle(){
        return $title;
    }

    function getPublicationDate(){
        return $publication_date;
    }

    function getAuthor(){
        return $author;
    }

}

?>