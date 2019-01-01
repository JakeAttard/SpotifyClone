<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SpotifyClone</title>
</head>
<body>

    <div id="inputContainer">
        <form id="loginForm" action="login.php" method="POST">
            <h2>Login To Account</h2>
            <p>
                <label for="loginUsername">Username</label>
                <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Username" required>
            </p>
            <p>
                <label for="loginPassword">Password</label>
                <input id="loginPassword" name="loginPassword" type="password" required>
            </p>

            <button type="submit" name="loginBtn">LOG IN</button>
        </form>
    </div>

</body>
</html>