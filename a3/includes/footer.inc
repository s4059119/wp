<footer>
    <?php if (isset($_SESSION['username'])): ?>
    <a href="user.php"><?= htmlspecialchars($_SESSION['username']) ?></a>
    <?php endif; ?>
    <br>
    &copy; Copyright s4059119 Harneet Kaur. All Rights Reserved | Designed for Pets Victoria
</footer>
</body>
</html>