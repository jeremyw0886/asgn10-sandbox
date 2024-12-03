<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if(is_post_request()) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // DEBUG OUTPUT
    echo "<div style='background: #f0f0f0; padding: 10px; margin: 10px;'>";
    echo "<strong>Debug Information:</strong><br>";
    echo "Attempting login with username: " . h($username) . "<br>";
    echo "Password length: " . strlen($password) . "<br>";
    echo "Password characters: ";
    for($i = 0; $i < strlen($password); $i++) {
        echo ord($password[$i]) . " ";
    }
    echo "<br>";
    
    $member = Member::find_by_username($username);
    
    if($member) {
        echo "User found in database<br>";
        echo "Stored hash: " . $member->hashed_password . "<br>";
        echo "Hash length: " . strlen($member->hashed_password) . "<br>";
        echo "Attempting to verify password...<br>";
        
        // Test with both trimmed and untrimmed password
        echo "Testing with trimmed password: " . (password_verify(trim($password), $member->hashed_password) ? 'true' : 'false') . "<br>";
        echo "Testing with untrimmed password: " . (password_verify($password, $member->hashed_password) ? 'true' : 'false') . "<br>";
        
        $verify_result = $member->verify_password($password);
        echo "Final password verification result: " . ($verify_result ? 'true' : 'false') . "<br>";
    } else {
        echo "User NOT found in database<br>";
    }
    echo "</div>";
    // END DEBUG OUTPUT

    // Validations
    if(is_blank($username)) {
        $errors[] = "Username cannot be blank.";
    }
    if(is_blank($password)) {
        $errors[] = "Password cannot be blank.";
    }

    // if no errors, try to login
    if(empty($errors)) {
        if($member && $member->verify_password($password)) {
            $session->login($member);
            $session->message('Login successful.');
            redirect_to(url_for('/birds/index.php'));
        } else {
            $errors[] = "Log in was unsuccessful.";
        }
    }
}
?>

<?php $page_title = 'Log in'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div class="login-form">
      <h1>Login</h1>

      <?php echo display_errors($errors); ?>

      <form action="login.php" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="username" value="<?php echo h($username); ?>" id="username">
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="password" value="" id="password">
        </div>

        <input type="submit" name="submit" value="Log in">
      </form>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
