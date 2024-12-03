<?php
require_once('../../private/initialize.php');
require_login();

if(!isset($_GET['id'])) {
  redirect_to(url_for('/birds/index.php'));
}
$id = $_GET['id'];
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('/birds/index.php'));
}

if(is_post_request()) {
  $result = $bird->delete();
  $session->message('The bird was deleted successfully.');
  redirect_to(url_for('/birds/index.php'));
} else {
  // Display confirmation form
}
?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <h1>Delete Bird</h1>
      <p>Are you sure you want to delete this bird?</p>
      <p class="item"><?php echo h($bird->common_name); ?></p>

      <form action="<?php echo url_for('/birds/delete.php?id=' . h(u($id))); ?>" method="post">
        <div class="form-group">
          <input type="submit" name="commit" value="Delete Bird">
        </div>
      </form>
      
      <div class="actions">
        <a class="action" href="<?php echo url_for('/birds/index.php'); ?>">Cancel</a>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
