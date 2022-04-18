//セッションを回す
<?php
$session_time = 86400;
ini_set('session.gc_divisor', 1);
ini_set('session.gc_maxlifetime', $session_time );

session_start();
if(isset($_SESSION['user_id'])==false){
	header('Location:./login.php');
	exit();
}
$user_id = $_SESSION['user_id'];
?>
<html lang="ja">
<head>
    <meta charset="UTF-8">
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
            <?php
            try{
                require_once('../model/db.phpdb.php');
                $pdo = new PDO($dsn, $user, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql="select * from Blogtable where id =:c_id";
                $stmt=$pdo->prepare($sql);
                $stmt->bindValue(":c_id", $contents_id, PDO::PARAM_STR);
                $stmt->execute();
                $title_rows= $stmt->fetchAll();
                $title_row= $title_rows[0];
                //var_dump($title_rows);
                //var_dump($title_row);
            }catch (PDOException $e){
                print('error:'.$e->getMessage());
                die();//エラーをはくようにする
            }
            ?>
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