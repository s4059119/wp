<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

// Redirect if already logged in
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = ? AND password = SHA(?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['usrmsg'] = "Login successful";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['err'] = "Login unsuccessful";
        header("Location: login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<main class="container">
    <h3>Login</h3>
    <?php if (isset($_SESSION['err'])): ?>
        <p style="color: red;"><?= $_SESSION['err'] ?></p>
        <?php unset($_SESSION['err']); ?>
    <?php endif; ?>
    <form action="login.php" method="post">
        <div class="mb-3 mt-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control w-50" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control w-50" required>
        </div>
        <div class="mb-3">
            <input type="submit" value="Login" class="btn btn-primary">
        </div>
    </form>
</main>

<?php
include('includes/footer.inc');
?>