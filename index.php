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
      <form id="signupform">
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
              <label for="login" name="login">Login</label>
              <div class="input-container">
                <input type="text" class="text" id="login" name="login" required pattern="^.{3,8}$"
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
                    -spanie <input type="checkbox" class="checkbox" value="Spanie"> 
                  </label><br>
                  <label>
                    -szachy <input type="checkbox" class="checkbox" value="Szachy"> 
                  </label><br>
                  <label>
                    -sport <input type="checkbox" class="checkbox" name="options[]" value="Sport"> 
                  </label><br>
                  <label>
                    -nauka<input type="checkbox"class="checkbox" name="options[]" value="Nauka"> 
                  </label><br>
                  <label>
                    -programowanie<input type="checkbox" class="checkbox" name="options[]" value="Programowanie"> 
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
                <select id="options" name="options" required>
                  <option value="" disabled selected>Wybierz opcję</option>
                  <option value="option1">Brak</option>
                  <option value="option2">Podstawowe</option>
                  <option value="option3">Średnie</option>
                  <option value="option4">Wyższe</option>
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
                    <input type="hasło" id="confirm-password" class="text" required data-description="Podaj takie samo hasło">
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

  