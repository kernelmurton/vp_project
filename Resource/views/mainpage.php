<?php
$session_time = 86400;
ini_set('session.gc_divisor', 1);
ini_set('session.gc_maxlifetime', $session_time );

session_start();
if(isset($_SESSION['user_id'])==false){
	header('Location:http://home.nda.ac.jp/~s66129//login/login.php');
	exit();
}
$user_id = $_SESSION['user_id'];
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <title>mainpage</title>
</head>
<body>
    <header>
        <div class="home"></div>
        <div class="search"></div>
    </header>
    <article class="main">
        <div class="index">

        </div>
        <div class="main objects">
            
            <section class="item">
                <a href="">
                    <div class="thumbnail"></div>
                    <div class="time"></div>
                    <div class="title"></div>
                </a>
            </section>

        </div>
    </article>
</body>
</html>