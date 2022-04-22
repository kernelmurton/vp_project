<?php
//セッションの設定
    $session_time=28800;
    //セッションを破棄する確率を１にする
    ini_set('session.gc_divisor',1);
    ini_set('session.gc_maxlifetime',$session_time);
    session_start();
    ini_set('display_errors',1);
//ldap認証
if(isset($_POST['user_id'])&&isset($_POST['pass'])){
    //ldapサーバを指定
    $ldap_sever="scmvldp01.nda.ac.jp";
    //アカウント情報を変数に格納
    $user_id=htmlspecialchars($_POST['user_id'],ENT_QUOTES,'UTF-8');
    $user_pass= htmlspecialchars($_POST['pass'],ENT_QUOTES,'UTF-8');
    //データベースのドメインネーム
    $base_dn="uid=".$user_id.",OU=private,OU=Users,DC=nda,DC=ac,DC=jp"; 
    //サーバとの接続を確認
    $ldap_id=ldap_connect($ldap_sever);
    if(!$ldap_id){
        $conn_err="ネットワークに接続ができません";
        
    }else{
        $ldapbind= ldap_bind($ldap_id,$base_dn,$user_pass);
        //ldap認証
        if(!$ldapbind){
            ldap_unbind($ldap_id);
            $bind_err="ログイン名又はパスワードが間違っています";
            //認証失敗
        }else{
            //認証成功
            ldap_bind($ldap_id);
            $_SESSION['user_id']=$user_id;
            //tabe.dataから小隊を取得
            $handle  = fopen("../table.data","r");
            while ($data = fgetcsv($handle,2000, "\t")){
                if ($data[33] == $user_id){
                    $platoon = $data[32]; 
                    break;
                }               
            }
            fclose($handle);
            if ($platoon == "331" | $platoon = "332" |$platoon = "333"){
                header('Location:../../pablic/mainpage.php');
            }
            else{
                header('Location:../../pablic/login.php');
            }           
            exit();
        }
    }
}
?>
<html>
<head>
<meta charset="UTF-8">
</head>
<body onload="document.all.jikkou.click();">
<form method="POST" action="<?php echo "./login.php";?>" method="post">
    <input type="hidden" name="user_id"  value="<?php if(isset($user_id))echo $user_id;?>">
    <input type="hidden" name="conn_err" value="<?php if(isset($conn_err))echo $conn_err;?>">
    <input type="hidden" name="bind_err" value="<?php if(isset($bind_err))echo $bind_err;?>">
    <input type="submit" name="jikkou" value="jikkou">
</form>
</body>

</html>