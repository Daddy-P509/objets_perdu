<?php 
    include('./languages/lang_config.php');
    require_once "./plateforme/in/login_tr.php"; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Jempson Louis Jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">

    <script src="./plateforme/js/jquery.js"></script>
    <script src="./plateforme/js/login.js"></script>

    <title>Login</title>
</head>
<body>
    <h3><?php echo $lang['msg_login'] ?></h3>
    <!-- <div class="container">
        <div class="wrapper">
            <div class="logo">
                <img src="" alt="">
            </div>
            <div class="text-center mt-4 name">
                <h1><?php echo $lang['login_title'] ?></h1>
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
                <button class="btn mt-3" name="submit"><?php echo $lang['btn_login'] ?></button>
            </form>
        </div>

        <br><br><br>
        <hr>
        <div class="creat-cont">
            <div class="groupe">
                <h1><?php echo $lang['title_cr_compt'] ?></h1>
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
                    <button type="button" id="creer"><?php echo $lang['btn_cr_compt'] ?></button>
                </form>
            </div>
        </div>

        <div class="lang-login">
            <ul>
                <li class="right">
                    <a href="login.php?lang=fr"><?php echo $lang['francais'] ?></a>
                </li>
                <li class="right">
                    <a href="login.php?lang=cr"><?php echo $lang['creole'] ?></a>
                </li>
                <li class="right">
                    <a href="login.php?lang=pt"><?php echo $lang['portugues'] ?></a>
                </li>
            </ul>
        </div>
    </div> -->

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="">
                <h3><?php echo $lang['title_cr_compt'] ?></h3>
                <span><?php echo $lang['msg_donne_P'] ?></span><br>
                <input type="text" id="nome" placeholder="<?php echo $lang['email'] ?>"/>
                <input type="text" id="telefone" placeholder="Votre Telefone">
                <select id="select_pais" class="form-control form-control-sm">
                    <option value=""><?php echo $lang['msg_select'] ?></option>
                </select>
                <input type="text" id="adresse" placeholder="Votre Adresse">
                <input type="number" id="numero" placeholder="Votre Numero">
                <input type="email" id="email" placeholder="<?php echo $lang['email'] ?>" />
                <input type="password" id="senha" placeholder="<?php echo $lang['mot_de_passe'] ?>" /><span><img class="oeuil" src="img/oeuil.png" alt="" srcset=""></span>
                <input type="password" id="repet_senha" placeholder="Repite a senha" /><img class="oeuil1" src="img/oeuil.png" alt="" srcset=""></span>
                <button type="button" id="inscrever"><?php echo $lang['btn_cr_compt'] ?></button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" metod="post">
                <h2><?php echo $lang['login_title'] ?></h2>
                <!-- <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div> -->
                <span><?php echo $lang['msg_sel_langue'] ?></span>
                <div class="lang-login">
                    <ul>
                        <li class="right">
                            <a href="login.php?lang=fr"><?php echo $lang['francais'] ?></a>
                        </li> |
                        <li class="right">
                            <a href="login.php?lang=cr"><?php echo $lang['creole'] ?></a>
                        </li> |
                        <li class="right">
                            <a href="login.php?lang=pt"><?php echo $lang['portugues'] ?></a>
                        </li>
                    </ul>
                </div>

                <input type="text" name="email" id="email" placeholder="<?php echo $lang['email'] ?>"/>
                <input type="password" name="password" id="password" placeholder="<?php echo $lang['mot_de_passe'] ?>"/>
                <a href="#"><?php echo $lang['msg_oublie_password'] ?></a>
                <button type="submit" name="submit"><?php echo $lang['btn_login'] ?></button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h2><?php echo $lang['bvn_mesg'] ?></h2>
                    <p><?php echo $lang['msg_conect'] ?></p>
                    <button class="ghost" id="signIn"><?php echo $lang['btn_login'] ?></button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h2><?php echo $lang['bienvenue'] ?></h2>
                    <p><?php echo $lang['msg_donne_P'] ?></p>
                    <button class="ghost" id="Inscrever"><?php echo $lang['btn_cr_compt'] ?></button>
                </div>
            </div>
        </div>

    </div>
</body>
</html>



