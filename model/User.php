<?php

class User {
   private $username = '';
   private $fullname = '';
   private $password = '';
   private $birthday = '';
   private $description = '';
   private $linkimage = '';
   private $id = '';
   public function __construct($username,$password,$fullname,$birthday,$description,$linkimage) {
      $this->username = $username;
      $this->password = $password;
      $this->fullname = $fullname;
      $this->birthday = $birthday;
      $this->description = $description;
      $this->linkimage = $linkimage;
   }
   public function setUsername($username)
   {
       $this->username = $username;
   }
   public function getUsername()
   {
       return $this->username;
   }
   public function setFullname($fullname)
   {
       $this->fullname = $fullname;
   }
   public function getFullname()
   {
       return $this->fullname;
   }
   public function setPassword($password)
   {
       $this->password = $password;
   }
   public function getPassword()
   {
       return $this->password;
   }
   public function setBirthday($birthday)
   {
       $this->birthday = $birthday;
   }
   public function getBirthday()
   {
       return $this->birthday;
   }
   public function setDescription($description)
   {
       $this->description = $description;
   }
   public function getDescription()
   {
       return $this->description;
   }
   public function setLinkimage($linkimage)
   {
       $this->linkimage = $linkimage;
   }
   public function getLinkimage()
   {
       return $this->linkimage;
   }
   public function setId($id)
   {
       $this->id = $id;
   }
   public function getId()
   {
       return $this->id;
   }
}

