<?php 
    include("../assets/navbar.php");


    if(!empty($_SESSION['loggedin'])){
        $_SESSION['loggedin'] = "Elérhető";
    }else{
        session_destroy();
        header('location: /login/');
    }
    if($_SESSION['role'] == "user"){
        $_SESSION['role'] = "Felhasználó";
    }else if($_SESSION['role'] == "admin"){
        $_SESSION['role'] = "Készítő";
    }else if($_SESSION['role'] == ""){
        $_SESSION['role'] = "Nincs megadva";
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">
    <title>Profil - <?php echo $_SESSION['username']; ?></title>
</head>
<body class="">

    <div class="container text-center">
        <div class="row">
            <div class="col text-start border m-2">
                <form action="" method="post">
                    <p class="logged">Állapot: <?php echo $_SESSION['loggedin']; ?></p>

                    <p class="userid">Azonosító: <?php echo "#".$_SESSION['userid']; ?></p>

                    <p class="username">Felhasználónév: <?php echo $_SESSION['username']; ?></p>

                    <p class="password">Jelszó: <a id="password"><?php echo $_SESSION['password']; ?></a></p>
                    <p class="text-start">Profil módosítás: <i class="font-monospace">hamarosan...</i></p>
                    <p class="role">Jogosultság: <?php echo $_SESSION['role']; ?></p>
                    <img style="width: 50px;" src="<?php echo "../image/".$_SESSION['pfp']; ?>" alt="Profilkép">
                </form>
            </div>
            <div class="col text-start border m-2">
                <h1>Posztok</h1>
                <div class="posts border-light">
                    <?php include("../post/display_profile.php"); ?>
                </div>
            </div>
            <div class="col text-start border m-2">
                <h1>Történet</h1>
            </div>
        </div>
    </div>
    <script src="account.js"></script>
</body>
</html>