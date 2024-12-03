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
  $args = $_POST['bird'];
  $bird->merge_attributes($args);
  $result = $bird->save();

  if($result === true) {
    $session->message('The bird was updated successfully.');
    redirect_to(url_for('/birds/show.php?id=' . $id));
  }
}
?>

<?php $page_title = 'Edit Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <h1>Edit Bird</h1>

      <?php echo display_errors($bird->errors); ?>

      <form action="<?php echo url_for('/birds/edit.php?id=' . h(u($id))); ?>" method="post">
        <?php include('form_fields.php'); ?>
        
        <div class="form-group">
          <input type="submit" value="Edit Bird">
        </div>
      </form>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
