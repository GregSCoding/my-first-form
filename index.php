<?php

$host = 'localhost';
$dbname = 'projekt1';
$username = 'greg'; 
$password = 'Projekt1@3';     

session_start();

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $imie = $_POST['first-name'];
        $nazwisko = $_POST['last-name'];
        $telefon = $_POST['phone-number'];
        $email = $_POST['email'];
        $userlog = $_POST['userlog'];
        $haslo = password_hash($_POST['password'], PASSWORD_DEFAULT); 
        $adres = $_POST['adress'];
        $wyksztalcenie = $_POST['education'];
        $zainteresowania = isset($_POST['intrests']) ? implode(',', $_POST['intrests']) : 'Brak';

        $_SESSION['user'] = [
          'imie' => $imie,
          'nazwisko' => $nazwisko,
          'email' => $email,
          'telefon' => $telefon,
          'adres' => $adres,
          'zainteresowania' => $zainteresowania,
          'userlog' => $userlog,
          'wyksztalcenie' => $wyksztalcenie
        ];

        $sql = "INSERT INTO uzytkownicy (imie, nazwisko, telefon, email, haslo, adres, zainteresowania, userlog, wyksztalcenie) 
                VALUES (:imie, :nazwisko, :telefon, :email, :haslo, :adres, :zainteresowania,:userlog, :wyksztalcenie)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':imie', $imie);
        $stmt->bindParam(':nazwisko', $nazwisko);
        $stmt->bindParam(':telefon', $telefon);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':haslo', $haslo);
        $stmt->bindParam(':adres', $adres);
        $stmt->bindParam(':userlog', $userlog);
        $stmt->bindParam(':zainteresowania', $zainteresowania);
        $stmt->bindParam(':wyksztalcenie', $wyksztalcenie);

        if ($stmt->execute()) {
            header("Location: podsumowanie.php");
            exit; 
        } else {
            echo "Wystąpił problem podczas zapisywania danych.";
        }
    }
} catch (PDOException $e) {
    echo "Błąd połączenia z bazą danych: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en" spellcheck="false">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="java.js" defer></script>
  <title>Mój formularz</title>
</head>
<body>
  <div class="page-container">
    <div class="img-side">
      <div id="photo-credit">Photo by <a href="https://unsplash.com/@alvannee?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Alvan Nee</a> on <a href="https://unsplash.com/images/animals/cat?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText">Unsplash</a>
      </div>
    </div>
    <div class="form-side">
      <div class="description-container">
        <div class="description">
          Zapisz się na nasz niesamowity kurs!
        </div>
      </div>
      <form id="signupform" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h1>Formularz zgłoszeniowy</h1>
        <div class="form-table">
          <div class="form-column">
            <div class="form-cell">
              <label for="first-name">Imię</label>
              <div class="input-container">
                <input class="text" type="text" id="first-name" name="first-name" pattern="[a-zA-Z]{3,30}" data-description="Wpisz conajmniej 3 litery, bez cyfr." required>
              </div>
            </div>
            <div class="form-cell">
              <label for="userlog" name="userlog">Login</label>
              <div class="input-container">
                <input type="text" class="text" id="userlog" name="userlog" required pattern="^.{3,8}$"
                data-description="3 do 8 znaków">
              </div>
              </div>
            <div class="form-cell">
              <label for="email">Email</label>
              <div class="input-container">
                <input type="email" id="email" class="text" name="email" data-description="Niepoprawny adres email" required>
              </div>
            </div>
              <div class="form-cell">
                <label>Zainteresowania:</label>
                <div class="checkbox-group">
                  <label>
                    -spanie <input type="checkbox" class="checkbox" name="intrests[]" value="Spanie"> 
                  </label><br>
                  <label>
                    -szachy <input type="checkbox" class="checkbox" name="intrests[]" value="Szachy"> 
                  </label><br>
                  <label>
                    -sport <input type="checkbox" class="checkbox" name="intrests[]" value="Sport"> 
                  </label><br>
                  <label>
                    -nauka<input type="checkbox"class="checkbox" name="intrests[]" value="Nauka"> 
                  </label><br>
                  <label>
                    -programowanie<input type="checkbox" class="checkbox" name="intrests[]" value="Programowanie"> 
                  </label><br>
                </div>
              </div>
            </divv>
            <div class="form-cell">
              <label for="password" name="password">Hasło</label>
              <div class="input-container">
                <input type="password" class="text" id="password" name="password" required pattern="(?=^.{8,}$)((?=.*\d)(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                data-description="8 znaków, cyfra, znak specjalny, duża litera">
              </div>
              </div>
            </div>
            <div class="form-column">
              <div class="form-cell">
                <label for="last-name">Nazwisko</label>
                <div class="input-container">
                  <input type="text" class="text" id="last-name" name="last-name" pattern="^[A-Za-z]{2,30}$"data-description="Conajmnniej 2 litery, bez cyfr" required>
                </div>
              </div>
              <div class="input-container">
                <div class="form-cell">
                <label for="options">Wykształcenie</label>
                <select id="education" name="education" required>
                  <option value="" disabled selected>Wybierz opcję</option>
                  <option value="Brak">Brak</option>
                  <option value="Podstawowe">Podstawowe</option>
                  <option value="Srednie">Średnie</option>
                  <option value="Wyzsze">Wyższe</option>
                </select>
              </div>
              </div>
              <div class="form-cell">
                  <label for="phone-number">Numer telefonu</label>
                  <div class="input-container">
                    <input type="tel" id="phone-number" class="text" name="phone-number" pattern="^[0-9]{3}-[0-9]{3}-[0-9]{3}$" required
                    data-description="Format numeru '123-456-789'." placeholder="123-456-789">
                  </div>
              </div>
              <div class="form-cell">
                <label for="adres">Adres</label>
                <div class="input-container">
                  <input type="text" id="adress" name="adress" class="text" pattern="^{3,30}$"data-description="3 do 30 znaków" required>
                </div>
              </div>
                <div class="form-cell">
                  <label for="password-confirmation" name="password-confirmation">Powtórz hasło</label>
                  <div class="input-container">
                    <input type="password" id="confirm-password" class="text" required data-description="Podaj takie samo hasło">
                  </div>
                </div>
              </div>
            </div>
        </form>
      <div class="submit-section">
              <button type="submit" form="signupform" id="submit-btn">Zapisz się</button>
      </div>
    </div>
  </div>
  
</body>
</html>

  