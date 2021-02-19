<?php
    $check = false;
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $array = $_POST['value'];
        $valArray = array();
        $checkArray = [false, false, false, false, false, false, false];
        $count = 0;
        foreach ($array as $data){
            $valArray[$count] = validate($data);
            if (!empty($data)){
                $checkArray[$count] = true;
            }
            $count++;
        }
        foreach ($checkArray as $data){
            $check = true;
            if ($data == false){
                $check = false;
                $error = "* vul alles in";
            }
        }
    }
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $text = "<p id='text'>Er zijn veel mensen die niet kunnen $valArray[0]. Neem nou $valArray[1]. Zelfs met de hulp
    van een $valArray[3]  of zelfs $valArray[2]  kan $valArray[1]  niet $valArray[0]. Dat heeft niet te maken met
    een gebrek aan $valArray[4], maar met een te veel aan $valArray[5]. Te veel $valArray[5]
    leidt tot $valArray[6] en dat is niet goed als je wilt $valArray[0]. Helaas voor $valArray[1].</p>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>
<body>
    <html>
    <body>
    <div class="wrapper">
        <h1>Mad Libs</h1>
        <nav class="menu">
            <a href="Paniek.php">Er heerst paniek...</a>
            <a href="Onkunde.php">Onkunde</a>
        </nav>
        <h2>Onkunde</h2>
    <?php if(!$check){?>
        <p class="error"><?=$error?></p>
        <form action="Onkunde.php" method="post" class="form">
            <label for="kunnen">Wat zou je graag willen kunnen?</label>
            <input id="kunnen" name="value[]" type="text">
            <label for="persoon">Met welke persoon kun je goed opschieten?</label>
            <input id="persoon" name="value[]" type="text">
            <label for="getal">Wat is je favoriete getal?</label>
            <input id="getal" name="value[]" type="text">
            <label for="voorwerp">Wat heb je altijd bij je als je op vakantie gaat?</label>
            <input id="voorwerp" name="value[]" type="text">
            <label for="plusEigenschap">Wat is je best persoonlijke eigenschap?</label>
            <input id="plusEigenschap" name="value[]" type="text">
            <label for="minEigenschap">Wat is je slechtse persoonlijke eigenschap?</label>
            <input id="minEigenschap" name="value[]" type="text">
            <label for="gebeurtenis">Wat is het ergste wat je kan overkomen?</label>
            <input id="gebeurtenis" name="value[]" type="text">
            <input type="submit" value="Versturen">
        </form>
    <?php }else{
        echo $text;
    }?>
        <footer>Deze website is gemaakt door Leslie.</footer>
    </div>
    </body>
    </html>
</body>
</html>