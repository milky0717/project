<h2>アンケートを記入</h2>

<form action="index.php?controller=Evaluation&action=submit" method="post">
    <label for="target_user_id">評価対象者:</label>
    <select name="target_user_id" id="target_user_id" required>
        <option value="">--選択してください--</option>
        <?php foreach ($users as $user): ?>
            <option value="<?= htmlspecialchars($user['id']) ?>">
                <?= htmlspecialchars($user['username']) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <label for="score">評価スコア (1〜10):</label>
    <input type="number" name="score" id="score" min="1" max="10" required>
    <br><br>

    <label for="comments">コメント:</label>
    <textarea name="comments" id="comments" rows="4" cols="50" required></textarea>
    <br><br>

    <button type="submit">送信</button>
</form>
