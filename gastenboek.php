<?php
require "./php/form.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/gastenboek.css">
    <title>Document</title>
</head>
<body>

<h1>Gastenboek</h1>

<div class="form-Inputs" >
    <form action="">
        <label for="Firstname-input">Firstname:</label>
        <input type="text" id="firstname-Input" name="firstname-Input">

        <label for="Lastname-input">Lastname:</label>
        <input type="text" id="lastname-Input" name="lastname-Input">

        <textarea name="" id="" cols="30" rows="10"></textarea>

        <input type="submit" value="Submit" class="button">

        <?php checkIfPostSet();?>
    </form>
</div>




</body>
</html>