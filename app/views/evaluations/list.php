<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>評価リスト</title>
</head>
<body>
    <h1>自分の評価</h1>
    <table border="1">
        <tr>
            <th>スコア</th>
            <th>コメント</th>
            <th>日付</th>
        </tr>
        <?php foreach ($evaluations as $evaluation): ?>
            <tr>
                <td><?= htmlspecialchars($evaluation['score']) ?></td>
                <td><?= htmlspecialchars($evaluation['comments']) ?></td>
                <td><?= htmlspecialchars($evaluation['created_at']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="index.php?controller=Evaluation&action=create">アンケートを記入する</a>

    <a href="index.php?controller=User&action=logout" style="color: red;">ログアウト</a>

</body>
</html>
