<?php

class model {
   private $id;
   private $name;

   public function __construct($paramid, $paramName) {
       $this->id = $paramid;
       $this->name = $paramName;
   }
   function getId() {
       return $this->id;
   }
   function getName() {
       return $this->name;
   }
}
