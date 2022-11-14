<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/gastenboek.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>

<h1>Gastenboek</h1>

<div class="margin-between-elements">
    <form action="./GastenBoekForm.php" method="post">
        <div class="mb-3">
            <label for="Firstname-input" class="form-label">Firstname:</label>
            <input class="form-control" type="text" id="firstname-Input" name="firstname-Input" placeholder="Firstname" required value="{firstname}">
        </div>
        <div class="mb-3">
            <label for="Lastname-input" class="form-label">Lastname:</label>
            <input class="form-control" type="text" id="lastname-Input" name="lastname-Input" placeholder="Lastname" required value="{lastname}">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Type here your message:</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Please enter your Message!" required>{message}</textarea>
        </div>
        <button value="Submit" class="btn btn-dark" name="submit">Submit</button>
    </form>
</div>


<h2 class="extra-Margin-Bot">Message Board:</h2>
    <!-- <div class="displayCompleteMessage">

        <div class="nameSection">
            <p>FirstName:</p>
            <p>Joost</p>
            <p>LastName:</p>
            <p>Nooijens</p>
        </div>
        <div class="messageSection">
            <p>Message:</p>
            <p>Hallo, dit is een test bericht!</p>
            <button class="btn btn-danger">Delete message</button>
        </div>
    </div> -->

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>
</html>