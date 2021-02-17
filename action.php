<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $date = date("d/m/y");
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $plaque = $_POST['plaque'];
    $matricule = $_POST['matricule'];
    $agence = $_POST['agence'];
    $qualification = $_POST['qualification'];
    $startday = explode(':', $_POST['startday']);
    $endday = explode(':', $_POST['endday']);
    $startnoon = explode(':', $_POST['startnoon']);
    $endnoon = explode(':', $_POST['endnoon']);
    $panier = isset($_POST['panier']) ? $_POST['panier'] : 'Non' ;
    $astreinte = isset($_POST['astreinte']) ? $_POST['astreinte'] : 'Non' ;
    echo("Employé : $name $lastname | Agence : $agence<br>");
    echo("Plaque : $plaque | Matricule : $matricule | Qualification : $qualification<br>");
    echo("Date : $date<br>");
    echo("Matinée : $startday[0]:$startday[1] - $endday[0]:$endday[1]<br>");
    $sumhmatinee = $endday[0] - $startday[0];
    $summnmatinee = -$startday[1] + $endday[1];
    if ($summnmatinee < 0)
    {
        $summnmatinee = 60 + $summnmatinee;
        $sumhmatinee--;
    }
    echo("Temps travail matinée : $sumhmatinee h $summnmatinee<br>");
    echo("Après Midi : $startnoon[0]:$startnoon[1] - $endnoon[0]:$endnoon[1]<br>");
    $sumhaprem = $endnoon[0] - $startnoon[0];
    $summnaprem = -$startnoon[1] + $endnoon[1];
    if ($summnaprem < 0)
    {
        $summnaprem = 60 + $summnaprem;
        $sumhaprem--;
    }
    $sumhours = $sumhmatinee + $sumhaprem;
    if((($summnmatinee + $summnaprem) % 60) != 0)
    {
        $summin = ($summnmatinee + $summnaprem) % 60;
        $sumhours++;
    }
    else {
        $summin = $summnmatinee + $summnaprem;
    }
    echo("Temps travail après midi : $sumhaprem h $summnaprem<br>");
    echo("Temps travail total : $sumhours h $summin<br>");
    echo("Panier : $panier | Astreinte : $astreinte");
    ?>
</body>
</html>