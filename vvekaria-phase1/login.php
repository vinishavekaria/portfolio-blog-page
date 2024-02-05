<?php
session_start();

// If the user is already logged in, redirect to the home page
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: index.php');
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username and password (in this example, hardcoded values are used for demonstration purposes only)
    if ($_POST['username'] == 'vinisha' && $_POST['password'] == 'hello123') {
        // Set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $_POST['username'];
        
        // Redirect to the home page or any other protected page
        header('Location: index.php');
        exit;
    }
    else {
        // Display error message
        $error = 'Invalid login credentials.';
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="login-container">
      <h2>Login</h2>
      <?php if (isset($error)) { ?>
        <p class="error"><?php echo $error; ?></p>
      <?php } ?>
      <form method="post">
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required>
          <br><br>
          <label for="password">Password:</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>
        <button type="submit">Login</button>
      </form>
    </div>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) { ?>
      <aside>
        <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php">Logout</a>
      </aside>
    <?php } ?>
  </body>
</html>
