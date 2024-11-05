<footer>
    <?php if (isset($_SESSION['username'])): ?>
    <a href="user.php"><?= htmlspecialchars($_SESSION['username']) ?></a>
    <?php endif; ?>
    <br>
