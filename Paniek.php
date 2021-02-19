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
    $text = "<div id='text'>
    <p>Er heerst paniek in het koninkrijk $valArray[2]. Koning $valArray[5] is ten einde raad en als koning.$valArray[5] ten einde raad is, radn roept hij ten-einde-raadsheer $valArray[1].
    </p><br>
    <p>\"$valArray[1] Het is een ramp. Het is een schande!\"</p><br>
    <p>\"Sire, Majesteit, Uwe Luidruchtigheid, wat is er aan de hand?\"</p><br>
    <p>\"Mijn $valArray[0] is verdwenen! Zo maar, zonder waarschuwing. En ik had net $valArray[4] voor hem gekocht!\"</p><br>
    <p>\"Majesteit, uw $valArray[0] komt vast vanzelf weer terug\"</p><br>
    <p>\"Ja, das leuk en aardig, maar hoe moet ik in de tussentijd $valArray[7] leren?\"</p><br>
    <p>\"Maar Sire, daar kunt u toch uw $valArray[6] voor gebruiken.\"</p><br>
    <p>\"$valArray[1], je hebt helemaal gelijk! Wat zou ik doen als ik jou niet had.\"</p><br>
    <p>\"$valArray[3], Sire.\"</p>
    </div>";
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
        <h2>Er heerst paniek...</h2>
    <?php if(!$check){?>
        <p class="error"><?=$error?></p>
        <form action="Paniek.php" method="post" class="form">
            <label for="dier">Welk dier zou je nooit als huisdier willen hebben?</label>
            <input id="dier" name="value[]" type="text">
            <label for="persoon">Wie is de belangrijkste persoon in je leven?</label>
            <input id="persoon" name="value[]" type="text">
            <label for="land">In welke land zou je graag willen wonen?</label>
            <input id="land" name="value[]" type="text">
            <label for="doen">Wat doe je als je je verveelt?</label>
            <input id="doen" name="value[]" type="text">
            <label for="speelgoed">Met welk speelgoed speelde je als kind het meest?</label>
            <input id="speelgoed" name="value[]" type="text">
            <label for="docent">Bij welke docent?</label>
            <input id="docent" name="value[]" type="text">
            <label for="geld">Als je € 100.000,- had, wat zou je dan kopen?</label>
            <input id="geld" name="value[]" type="text">
            <label for="bezigheid">Wat is je favoriete bezigheid?</label>
            <input id="bezigheid" name="value[]" type="text">
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