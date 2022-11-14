<?php

require "ClassUserMessage.php";

$replace = array('{firstname}', '{lastname}', '{message}');
$values = array('', '', '');

$jsonFileLocation = '../JSON/GastenBoek.JSON';
$allUsersJson = file_get_contents($jsonFileLocation, true);
$template = file_get_contents('../gastenboek.php');

function makeDataValid($inputData) {
    $inputData = trim($inputData);
    $inputData = stripslashes($inputData);
    $inputData = htmlspecialchars($inputData);
    return $inputData;
}


function checkIfPostSet($jsonFileLocation, $allUsersJson) {

    $firstNameInput = makeDataValid($_POST['firstname-Input']);
    $lastNameInput = makeDataValid($_POST['lastname-Input']);
    $messageTextarea = makeDataValid($_POST['message']);

    $messageIDs = countUserIds($jsonFileLocation, $allUsersJson);

        if (!empty($firstNameInput) && !empty($lastNameInput) && !empty($messageTextarea)) {

            $newUserMessage = newUserMessage(
                (int)$messageIDs, 
                (string)$firstNameInput, 
                (string)$lastNameInput,
                (string)$messageTextarea, 
            );

        } else {

            echo "Please make sure Firstname and Lastname are not empty!";
        }
}


function newUserMessage(int $messageID,  string $firstname, string $lastname, string $userMessage) {

    $newMessageObject = new UserMessage($messageID, $firstname, $lastname, $userMessage);

    saveMessageData($newMessageObject);

    return $newMessageObject;
}


function saveMessageData($newMessageObject) {

    $jsonFileLocation = '../JSON/GastenBoek.JSON';
    $allUsersJson = file_get_contents($jsonFileLocation, true);

    $encodeJson = json_encode($newMessageObject);

    $allUsersJson .= $encodeJson . "\n";
  
    file_put_contents($jsonFileLocation, $allUsersJson);

    return $allUsersJson;
}


function displayData($allUsersJson) {

    $singleUserMessage = explode("\n", $allUsersJson);



        foreach ($singleUserMessage as $singleMessage) {

            $userMessage = json_decode($singleMessage);


                if(!$userMessage == null){
                    
                    echo 
            
                    "<div class='displayCompleteMessage'>

                    <div class='nameSection'>
                        <p class='fatLetters'>Firstname:</p>
                        <p>$userMessage->firstname</p>
                        <p class='fatLetters'>Lastname:</p>
                        <p>$userMessage->lastname</p>
                    </div>
                    <div class='messageSection'>
                        <p class='fatLetters'>Message:</p>
                        <p>$userMessage->userMessage</p>
                        <button class='btn btn-danger'>Delete message</button>
                    </div>
                </div>";

                }

            
        }


}


function countUserIds($jsonFileLocation, $allUsersJson) {

    $messageIDs = -1;

    $singleUserMessage = explode("\n", $allUsersJson);

        foreach ($singleUserMessage as $userMessage) {
            
            $messageIDs++;
        }

    return $messageIDs;
}


if (isset($_POST['submit'])) {

    $values = array($_POST['firstname-Input'], $_POST['lastname-Input'], $_POST['message']);

    checkIfPostSet($jsonFileLocation, $allUsersJson);

    header('Location: ./gastenboekform.php');

}

$replacedString = str_replace($replace, $values, $template);

echo $replacedString;

displayData($allUsersJson);

?>