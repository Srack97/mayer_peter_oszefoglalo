<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
if(filter_input(INPUT_POST, "regisztral",FILTER_VALIDATE_BOOLEAN,FILTER_NULL_ON_FAILURE)){
    $felhasznlo_nev = filter_input(INPUT_POST,"felhasznalo_nev", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $jelszo = password_hash(filter_input(INPUT_POST, "jelszo"),PASSWORD_BCRYPT);
    $teljes_nev = filter_input(INPUT_POST, "teljes_nev",FILTER_SANITIZE_STRING);
    $szuletesi_datum = filter_input(INPUT_POST, "szuletesi_datum",FILTER_SANITIZE_STRING);
    $iranyito_szam = filter_input(INPUT_POST, "iranyito_szam");
    $varos = filter_input(INPUT_POST, "varos");
    $cim = filter_input(INPUT_POST, "cim");
    $sql = "INSERT INTO `felhsznalo`(`ID`,`felhasznalo_nev`,`email`,`jelszo`,`teljes_nev`,`szuletesi_datum`,`iranyito_szam`,`varos`,`cim`,`regisztracios_idopont`) VALUES (NULL,?,?,?,?,?,?,?,?,NULL)";
    $stmt = $conn->prepare($sql);
    $stmt -> bind_param("ssssssss", $felhasznlo_nev,$email,$jelszo,$teljes_nev,$szuletesi_datum,$iranyito_szam,$varos,$cim);
    if($stmt -> execute()){
          echo 'Sikeres regisztráció!';
    }else{
          echo 'regisztració sikertelen';
    }
}
?>
<h1>regisztráció</h1>
<form method="POST">
      <div class="form-group">
            <label for="felhasznalo_nev">Felhasználó név</label>
            <input type="text" class="form-control" id="felhsznalo_nev" name="felhsznalo_nev">
      </div>
      <div class="form-group">
            <label for="email">Email cím</label>
            <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
            <label for="jelszo">Jelszó</label>
            <input type="password" class="form-control" id="jelszo" name="jelszo">
      </div>
       <div class="form-group">
            <label for="teljes_nev">Teljes név</label>
            <input type="text" class="form-control" id="teljes_nev" name="teljes_nev">
      </div>
      <div class="form-group">
            <label for = szuletesi_datum>Születési Dátum</label>
            <input type="date" class="from-control" id="szuletesi_datum" name="szuletesi_datum">
      </div>
      <div class="from-group">
        <label for="iranyito_szam">Írányitó szám</label>
        <input type="number" class="from-control" id="iranyito_szam" name="iranyito_szam">
      </div>
      <div class="from-group">
          <label for="varos">Város</label>
            <input type="text" class="from-control" id="varos" name="varos">
      </div>
      <div class="form-group">
            <label for="cim">cím</label>
            <input type="text" class="form-control" id="cim" name="cim">
      </div>

    <button type="submit" class="btn btn-primary" name="regisztral" value="true">Regisztráció</button>
</form>