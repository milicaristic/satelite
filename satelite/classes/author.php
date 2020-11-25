<?php

class Author{
    private $name;
    private $origin;

    function __construct($name,$origin){
        if($name=="") throw new Exception("Author name empty!!!");
        $this->name=$name;
        $this->origin=$origin;
    }

    function getName(){
        return $name;
    }

    function getOrigin(){
        return $origin;
    }
}
?>