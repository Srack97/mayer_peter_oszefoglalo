<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
if(filter_input(INPUT_POST, "belepes", FILTER_VALIDATE_BOOL,FILTER_NULL_ON_FAILURE)){
    $felhazsnalo_nev = filter_input(INPUT_POST, "felhsznalo_nev",FILTER_SANITIZE_STRING);
    $jelszo = filter_input(INPUT_POST, "jelszo");
    $sql = 'SELECT `jelszo` FROM `felhasznalo` WHERE `felhasznalo_nev` = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s",$felhazsnalo_nev);
    $stmt->execute();

    $eredmeny = $stmt->get_resault();
    if(password_verify($jelszo, $eredmeny->fetch_assoc()["jelszo"])){
        echo 'Sikeres belépés';
        $eredmeny = $conn->query('SELECT * FROM `felhasznalo` WHERE `felhasznalo_nev` ="'.$felhazsnalo_nev.'";');
        $_SESSION['felhasznalo'] = $eredmeny->fetch_assoc();
        $_SESSION['belép'] = true;
    }else{
        echo 'Belépés sikertelen';
    }
}
?>
<h1>Bejelentkezés</h1>
<form method="POST">
    <div class="from-group">
        <label for="felhasznalo_nev">Felhasználó név</label>
        <input type="text" class="from-control" id="felhasznalo_nev" name="felhasznalo_nev">
    </div>
    <div class="frim-group">
        <label for="jelszo">jelszó</label>
        <input type="password" class="from-control" id="jelszó" name="jelszo">
    </div>
    <button type="submit" class="btn btn-primary" name="belepes" value="true">Belépés</button>
</form>