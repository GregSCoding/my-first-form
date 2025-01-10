<?php
session_start();
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
    $imie = $user['imie'];
    $nazwisko = $user['nazwisko'];
    $telefon = $user['telefon'];
    $email = $user['email'];
    $adres = $user['adres'];
    $zainteresowania = $user['zainteresowania'];
    $wyksztalcenie = $user['wyksztalcenie'];
    $login = $user['userlog'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
</head>
<body>
    <h1>Pomyślnie zapisano się na kurs, prosze sprawdzic poprawnosc danych</h1>
    <p><strong>Imię:</strong> <?php echo htmlspecialchars($imie); ?></p>
    <p><strong>Nazwisko:</strong> <?php echo htmlspecialchars($nazwisko); ?></p>
    <p><strong>Telefon:</strong> <?php echo htmlspecialchars($telefon); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Login:</strong> <?php echo htmlspecialchars($login); ?></p>
    <p><strong>Wykształcenie:</strong> <?php echo htmlspecialchars($wyksztalcenie); ?></p>
    <p><strong>Adres:</strong> <?php echo htmlspecialchars($adres); ?></p>
    <p><strong>Zainteresowania:</strong> <?php echo htmlspecialchars($zainteresowania); ?></p>
</body>
</html>