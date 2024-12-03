<?php
require_once('../../private/initialize.php');
require_login();

if(is_post_request()) {
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();

  if($result === true) {
    $session->message('The bird was created successfully.');
    redirect_to(url_for('/birds/show.php?id=' . $bird->id));
  }
} else {
  $bird = new Bird;
}
?>

<?php $page_title = 'Create Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <h1>Create Bird</h1>

      <?php echo display_errors($bird->errors); ?>

      <form action="<?php echo url_for('/birds/new.php'); ?>" method="post">
        <?php include('form_fields.php'); ?>
        
        <div class="form-group">
          <input type="submit" value="Create Bird">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
