<?php

require "./php/InterfaceUserDetails.php";

class UserMessage implements UserDetails, JsonSerializable {
    private $messageID;
    private $firstname;
    private $lastname;
    private $userMessage;

    public function __construct(int $messageID, string $firstname, string $lastname, string $userMessage) 
    {
        $this->messageID = $messageID;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->userMessage = $userMessage;
        // Set firstname and lastname
    }

    public function setFirstname() 
    {
        $this->firstname = $firstname;
    }

    public function setLastname() 
    {
        $this->lastname = $lastname;
    }

    public function setuserMessage(string $userMessage) 
    {
        $this->userMessage = $userMessage;
    }

    public function setMessageID(int $messageID) 
    {
        $this->messageID = $messageID;
    }

    public function jsonSerialize() 
    {
        return get_object_vars($this);
    }

    public function getFirstname() : string { return $this->firstname; }
    public function getLastname() : string { return $this->lastname; }
    public function getuserMessage() : string { return $this->userMessage; }
    public function getMessageID() : int { return $this->messageID; }        
}


?>