<!DOCTYPE html>
<html>
<head>
    <title>評価作成</title>
</head>
<body>
    <h1>新しい評価</h1>
    <form action="index.php?controller=Evaluation&action=create" method="POST">
        <label for="target_user">評価対象者:</label>
        <select id="target_user" name="target_user">
            <?php foreach ($users as $user): ?>
                <option value="<?= htmlspecialchars($user['id']) ?>"><?= htmlspecialchars($user['username']) ?></option>
            <?php endforeach; ?>
        </select>
        <label for="score">スコア:</label>
        <input type="number" id="score" name="score" min="1" max="5" required>
        <label for="comments">コメント:</label>
        <textarea id="comments" name="comments"></textarea>
        <button type="submit">送信</button>
    </form>
</body>
</html>
