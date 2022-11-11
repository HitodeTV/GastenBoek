<?php

require "./php/ClassUserMessage.php";

$jsonFileLocation = './JSON/GastenBoek.JSON';
$allUsersJson = file_get_contents($jsonFileLocation, true);


function checkIfPostSet($jsonFileLocation, $allUsersJson) {

    $firstNameInput = $_POST['firstname-Input'];
    $lastNameInput = $_POST['lastname-Input'];
    $messageTextarea = $_POST['message'];

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

    saveData($newMessageObject);

    return $newMessageObject;
}


function saveData($newMessageObject) {

    $jsonFileLocation = './JSON/GastenBoek.JSON';
    $allUsersJson = file_get_contents($jsonFileLocation, true);

    $encodeJson = json_encode($newMessageObject);

    $allUsersJson .= "\n" . "/" . $encodeJson;
  
    file_put_contents($jsonFileLocation, $allUsersJson);

    return $allUsersJson;
}


function displayData($allUsersJson) {

    echo $allUsersJson;


    // $location = "gastenboek.php";
    // header("Location: $location");

    // $userMessage = json_decode($allUsersJson);
}

function countUserIds($jsonFileLocation, $allUsersJson) {

    $messageIDs = -1;

    $singleUserMessage = explode('/', $allUsersJson);

        foreach ($singleUserMessage as $userMessage) {
            
            $messageIDs++;
        }

    return $messageIDs;
}

if (isset($_POST['submit'])) {
    checkIfPostSet($jsonFileLocation, $allUsersJson);
}

?>