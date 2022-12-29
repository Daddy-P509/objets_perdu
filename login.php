<?php 
    require_once "./langue.php";
    require_once "./plateforme/in/login_tr.php"; 
    // var_dump($langue["conexao"]["cr"]);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">

    <script src="./plateforme/js/jquery.js"></script>
    <script src="./plateforme/js/main.js"></script>

    <title>Login</title>
</head>
<body>
    <div class="container">
        <!-- <div class="lang">
            <select id="lang">
                <option value="fr">Français</option>
                <option value="pt">Portugues</option>
                <option value="cr">Creole</option>
            </select>
        </div> -->
        <div class="wrapper">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="text-center mt-4 name">
                Fazer a conexao
            </div>
            <form class="p-3 mt-3">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="email" name="email" id="email" placeholder="Votre email">
                </div>
                <br>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="password" placeholder="Votre password">
                </div>
                <br>
                <button class="btn mt-3" name="submit">Conectar</button>
            </form>
        </div>

        <br><br><br>
        <hr>
        <div class="creat-cont">
            <div class="groupe">
                <h1>Crée votre compt</h1>
                <form action="">
                    <input type="text" id="nome" placeholder="Votre Nome"><br><br>
                    <input type="email" id="e_mail" placeholder="Votre Email"><br><br>
                    <input type="text" id="telefone" placeholder="Votre Telefone"><br><br>
                    <select id="select_pais" class="form-control form-control-sm">
                        <option value="">Select...</option>
                    </select><br><br>
                    <input type="text" id="adresse" placeholder="Votre Adresse"><br><br>
                    <input type="number" id="numero" placeholder="Votre Numero"><br><br>
                    <input type="password" id="modepasse" placeholder="Votre Modepasse"><br><br>
                    <input type="password" id="rep_modepasse" placeholder="Repeté votre modepasse">

                    <br><br><br>
                    <button type="button" id="creer">CRÉE</button>
                </form>
            </div>
        </div>

    </div>
</body>
</html>



