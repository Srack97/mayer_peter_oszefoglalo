<h1>főoldal</h1>
<?php
$sql = "SELECT `ID` `Nev` `ar` `kep` FROM `termek`";
if($eredmeny = $conn->query($sql)){
    if($eredmeny->num_rows > 0){
        while ($sor = $eredmeny -> fetch_assoc()){
        echo'<div class = "card-body">
                    <h5 class = "card-titel">'.$sor["nev"].'</h5>
                <p class = "card-text">'.number_format($sor["ar"],0,"."," ").' Ft</p>Megrendelem</button>
                <button type="submit" class="btn btn-primary" value="'.$sor["ID"].'">
                </div>
            </div>';
        }
    }
} else{
    echo 'Sikertelen lekérdezése';
}
?>