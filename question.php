<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>アンケート</title>
    </head>
    <body>
        <h1>アンケート</h1>
         <form method="post" action="">
        <table>
            <tr>
                <th>内容</th>
                <th>5</th>
                <th>4</th>
                <th>3</th>
                <th>2</th>
                <th>1</th>
            </tr>
        
            <tr>
                <th>楽しかった</th>  
                <th><input type="radio" name="s" value="5"></th>
                <th><input type="radio" name="s" value="4"></th>
                <th><input type="radio" name="s" value="3"></th>
                <th><input type="radio" name="s" value="2"></th>
                <th><input type="radio" name="s" value="1"></th>
            </tr>  
        </table>
        <input type="submit">
        </form>
       <?php
            $s = $_POST["s"];

            echo $s;

        ?>

    </body>

</html>



