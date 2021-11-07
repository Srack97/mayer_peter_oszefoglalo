<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
if(filter_input(INPUT_POST, "feltoltes", FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE)){
    $Nev = filter_input(INPUT_POST, "Nev", FILTER_SANITIZE_STRING);
    $ar = filter_input(INPUT_POST, "ar", FILTER_SANITIZE_STRING);
    $sql = "INSERT INTO `termek` (`ID`, `Nev`, `ar`) VALUES (NULL, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $loginname, $vnev, $phone, $email, $password , $cim);
    if($stmt->execute()){
        echo 'Feltöltés sikeres!';
    } else {
        echo 'Feltöltés sikertelen';
    }
        
    
    
} else {
}
?>
<h1>Termék feltöltése</h1>
<form method="POST">
    <div class="from-group">
        <Label for="Nev">Termék Neve</Label>
        <input type="text" class="from-control" id="Nev" name="Nev">
    </div>
    <div class="from-group">
        <Label for="ar">Termék ára</Label>
        <input type="text" class="from-control" id="ar" name="ar">
    </div>
</form>