<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    
    if (!empty($username) && !empty($password)) {
        $username = htmlspecialchars($username);
        $password = htmlspecialchars($password);

        $file = fopen("users.txt", "a+");
        $users = fread($file, filesize("users.txt"));
        fclose($file);
        
        if (strpos($users, $username) !== false) {
            echo "A user with that name already exists!";
        } else {
            $file = fopen("users.txt", "a");
            fwrite($file, $username . "," . $password . PHP_EOL);
            fclose($file);

            echo "Registration successful!";
        }
    } else {
        echo "Please fill in all fields!";
    }
}
?>
<link rel="stylesheet" href="../css/style.css">
<form action="signup.php" method="POST">
    <label for="username">User name:</label>
    <input type="text" name="username" id="username" required><br><br>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    
    <input type="submit" value="Sign up">
    <br><br><p>Already have an account? <a href="login.php">Sign in</a></p>
</form>
