<?php

if( isset($_SESSION) ){
    unset($_SESSION['user']);
}else{
    session_start();
} 

if(isset($_REQUEST['submit'])){
    require_once "server.php";

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $criptPassword = md5($password);
    
    if(isset($email) and !empty($email)){
        if(isset($password) && !empty($password)){
            $req = $pdo->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
            $req->execute(array($email, $criptPassword));
            $user = $req->fetch(PDO::FETCH_OBJ);
            
            if($user->password !== $criptPassword || $user->email !== $email){
                header("Location:./login.php");
            }else{

                if($req->rowCount()==1){
                    $_SESSION['user'] = $user;
                    $_SESSION['info_login'] = (object)[
                        "horario" => date('d/m/Y H:i:s')
                    ];
                    if( $user->statu_ == 0 ){
                        // Usuario comum
                        header("Location:./user.php");
                    }else{
                        //Admin
                        header("Location:./plateforme/admin/dashboard.php");
                    }
                }
            }
           
        }
    
    }
    
}


?>