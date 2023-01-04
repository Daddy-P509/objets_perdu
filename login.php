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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css">
    <link rel="stylesheet" href="./MDB5/css/mdb.min.css">
    <link rel="stylesheet" href="./css/login.css">

    <!-- <script src="./plateforme/js/jquery.js"></script>
    <script src="./plateforme/js/login.js"></script> -->

    <script src="./MDB5/js/mdb.min.js"></script>

    <title>Login</title>
</head>
<body>
    
    <div class="container">
        <!-- Login -->
        <br><br>
        <h5><?php echo $lang['msg_login'] ?></h5>
        <div class="card" style="background-color: #d6d9db; width: 30%; margin: auto; padding: 20px;">
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="btn-floating active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab" 
                    aria-controls="pills-login" aria-selected="true"><?php echo $lang['btn_login'] ?></a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="btn-floating" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab" 
                    aria-controls="pills-register" aria-selected="false"><?php echo $lang['btn_cr_compt'] ?></a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                    <form>
                        <div class="text-center mb-3">
                            <p><?php echo $lang['login_title'] ?>:</p>
                            <a class="btn-floating" href="login.php?lang=fr">
                                <i class="flag flag-france" title="<?php echo $lang['francais'] ?>"></i>
                            </a>
                            <a class="btn-floating" href="login.php?lang=cr">
                                <i class="flag flag-haiti" title="<?php echo $lang['creole'] ?>"></i>
                            </a>
            
                            <a class="btn-floating" href="login.php?lang=pt">
                                <i class="flag flag-brazil" title="<?php echo $lang['portugues'] ?>"></i>
                            </a>
                        </div>
        
                        <!-- <p class="text-center">or:</p> -->
        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginName"><?php echo $lang['email'] ?></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $lang['email'] ?>"/>
                        </div>
        
                        <div class="form-outline mb-4">
                            <label class="form-label" for="loginPassword"><?php echo $lang['mot_de_passe'] ?></label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang['mot_de_passe'] ?>"/>
                        </div>
        
                        <div class="row mb-4">
                            <div class="col-md-12 d-flex justify-content-center">
                                <a href="#!"><?php echo $lang['msg_oublie_password']?></a>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary btn-block mb-4"><?php echo $lang['btn_login'] ?></button>
                    </form>
                </div>

                <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                    <form>
                        <div class="text-center mb-3">
                            <p><?php echo $lang['login_title'] ?>:</p>
                            <a class="btn-floating" href="login.php?lang=fr">
                                <i class="flag flag-france" title="<?php echo $lang['francais'] ?>"></i>
                            </a>
                            <a class="btn-floating" href="login.php?lang=cr">
                                <i class="flag flag-haiti" title="<?php echo $lang['creole'] ?>"></i>
                            </a>
            
                            <a class="btn-floating" href="login.php?lang=pt">
                                <i class="flag flag-brazil" title="<?php echo $lang['portugues'] ?>"></i>
                            </a>
                        </div>
        
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="text"  id="nome" placeholder="<?php echo $lang['nome_log'] ?>" class="form-control" />
                            <label class="form-label" for="registerName">Name</label>
                        </div>
        
                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="e_mail" placeholder="<?php echo $lang['email'] ?>" class="form-control" />
                            <label class="form-label" for="registerUsername">Email</label>
                        </div>
        
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input type="email" id="telefone" placeholder="<?php echo $lang['telefone_log'] ?>" class="form-control" />
                            <label class="form-label" for="registerEmail">Tel</label>
                        </div>

                        <!-- Pays input -->
                        <div class="form-outline mb-4">
                            <select id="select_pais" class="form-control form-control-sm">
                                <option value=""><?php echo $lang['msg_select'] ?></option>
                            </select>
                        </div>
        
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="adresse" placeholder="<?php echo $lang['adresse'] ?>" class="form-control" />
                            <label class="form-label" for="registerPassword">Adr</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="numero" placeholder="<?php echo $lang['numero'] ?>" class="form-control" />
                            <label class="form-label" for="registerPassword">num</label>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="modepasse" placeholder="<?php echo $lang['mot_de_passe'] ?>" class="form-control" />
                            <label class="form-label" for="registerPassword">Password</label>
                        </div>
        
                        <!-- Repeat Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" id="rep_modepasse" placeholder="<?php echo $lang['repMot_de_passe'] ?>" class="form-control" />
                            <label class="form-label" for="registerRepeatPassword">Repeat password</label>
                        </div>
        
                        <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="">
                <h5><?php echo $lang['title_cr_compt'] ?></h5>
                <span><?php echo $lang['msg_donne_P'] ?></span><br>
                <input type="text" id="nome" placeholder="<?php echo $lang['nome_log'] ?>"/>
                <input type="email" id="e_mail" placeholder="<?php echo $lang['email'] ?>" />
                <input type="text" id="telefone" placeholder="<?php echo $lang['telefone_log'] ?>">
                <select id="select_pais" class="form-control form-control-sm">
                    <option value=""><?php echo $lang['msg_select'] ?></option>
                </select>
                <input type="text" id="adresse" placeholder="<?php echo $lang['adresse'] ?>">
                <input type="number" id="numero" placeholder="<?php echo $lang['numero'] ?>">
                <input type="password" id="modepasse" placeholder="<?php echo $lang['mot_de_passe'] ?>" /><span><img class="oeuil" src="img/oeuil.png" alt="" srcset=""></span>
                <input type="password" id="rep_modepasse" placeholder="<?php echo $lang['repMot_de_passe'] ?>" /><img class="oeuil1" src="img/oeuil.png" alt="" srcset=""></span>
                <button type="button" id="inscrever"><?php echo $lang['btn_cr_compt'] ?></button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="" metod="post">
                <h2><?php echo $lang['login_title'] ?></h2>
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

    </div> -->
</body>
</html>



