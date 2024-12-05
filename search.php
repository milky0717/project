<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>データ参照</title>
    </head>
    <body>
        <h1>データ参照</h1>
        //user検索
            <form method="post">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id">
                <button type="search">検索する</button>
            </form>    
        //新規登録
            <form method="post">
                <label for="newid">ID:</label>
                <input type="text" id="id" name="newid">
                <button type="new">新規登録</button>
            </form>
    </body>
</html>
<?php
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        $id = $_POST['id']; 
        $_name = $_POST['name'];
        try{
            $dsn = 'mysql:host=localhost;dbname=users;charset=utf8mb4';
            $username = "root";
            $password = "";

            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $search = $conn->prepare("SERECT name,jday,hp,kp FROM user");
            $insert = $conn->prepare("INSERT INTO users (id, name) VALUES (?, ?)");
            
            $stmt->bind_param('id',$id,PDO::PARAM_INT);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        
            $stmt->execute();


        
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
       
    }   

?>