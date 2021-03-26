<?php
class User {
    private $userId;
    private $name;
    private $phone;
    
    private $messages;
    
    public function __construct($userId, $name, $phone)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->phone = $phone;
        
        $this->messages = array();
    }
    
    public function getUserId() {
        return $this->userId;
    }

    public function getName() {
        return $this->name;
    }

    public function getPhone() {
        return $this->phone;
    }
}

