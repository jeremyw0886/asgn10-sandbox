<?php
require_once('../../private/initialize.php');

$errors = [];
$username = '';
$password = '';

if (is_post_request()) {
  $username = $_POST['username'] ?? '';
  $password = $_POST['password'] ?? '';

  // Validations
  if (is_blank($username)) {
    $errors['username'] = "Username cannot be blank.";
  }
  if (is_blank($password)) {
    $errors['password'] = "Password cannot be blank.";
  }

  // if no errors, try to login
  if (empty($errors)) {
    $member = Member::find_by_username($username);
    if ($member && $member->verify_password($password)) {
      $session->login($member);
      $session->message('Login successful.');
      redirect_to(url_for('/birds/index.php'));
    } else {
      $errors['login'] = "Log in was unsuccessful.";
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

      <?php if (isset($errors['login'])) { ?>
        <div class="errors">
          <?php echo h($errors['login']); ?>
        </div>
      <?php } ?>

      <form action="login.php" method="post">
        <div class="form-group <?php echo isset($errors['username']) ? 'has-error' : ''; ?>">
          <label for="username">Username</label>
          <div class="input-container">
            <input type="text" name="username" value="<?php echo h($username); ?>" id="username">
            <?php if (isset($errors['username'])) { ?>
              <span class="field-error"><?php echo h($errors['username']); ?></span>
            <?php } ?>
          </div>
        </div>

        <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : ''; ?>">
          <label for="password">Password</label>
          <div class="input-container">
            <input type="password" name="password" value="" id="password">
            <?php if (isset($errors['password'])) { ?>
              <span class="field-error"><?php echo h($errors['password']); ?></span>
            <?php } ?>
          </div>
        </div>

        <div class="form-buttons">
          <input type="submit" name="submit" value="Log in">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
