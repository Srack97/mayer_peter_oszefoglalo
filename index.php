<?php
header('Content-type: text/html; charset=utf-8');
require_once './kapcsolat.php';
session_start();
$menu = filter_input(INPUT_GET, "menu", FILTER_SANITIZE_STRING);
$login = isset($_SESSION["login"])?$_SESSION["login"]:false;
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 30 * 60)) {
    session_unset(); 
    session_destroy();
}
$_SESSION['LAST_ACTIVITY'] = time();
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <title>Webshop</title>
        <link rel="stylesheet" href="bootstrap-4.5.3-dist/css/bootstrap.min.css" />
        <script src="bootstrap-4.5.3-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">
        <header>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="home"?"active":""; ?>" href="index.php?menu=fooldal">Kezdőlap</a>
                </li>

<?php
        if(!$login){
            ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="bejelentkezes"?"active":""; ?>" href="index.php?menu=bejelentkezes">Belépés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="regisztracio"?"active":""; ?>" href="index.php?menu=regisztracio">Regisztráció</a>
                </li>
                <li class="nav-item">
                    <a class ="nav-lint <?php echo $menu=="termekek_hozadasa"?"active":""?>"  href="index.php?menu= termekek_hozaddasa">Termékek hozáadása</a>
                </li>
                <?php
        } else {
        ?>
                <li class="nav-item">
                    <a class="nav-link <?php echo $menu=="kilepes"?"active":""; ?>" href="index.php?menu=kilepes">Kilépés</a>
                </li>
                <?php
        }
        ?>
                
              </ul>
        </header>
        <?php
            
        
        require_once './iranyito.php';
        ?>
        </div>
    </body>
</html>
