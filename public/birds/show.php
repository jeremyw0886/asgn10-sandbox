<?php require_once('../../private/initialize.php'); ?>

<?php
  $id = $_GET['id'] ?? '1';
  $bird = Bird::find_by_id($id);
?>

<?php $page_title = 'Show Bird: ' . h($bird->common_name); ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <div class="bird show">
        <h1>Bird: <?php echo h($bird->common_name); ?></h1>

        <div class="attributes">
          <dl>
            <dt>Common Name</dt>
            <dd><?php echo h($bird->common_name); ?></dd>
          </dl>
          <dl>
            <dt>Habitat</dt>
            <dd><?php echo h($bird->habitat); ?></dd>
          </dl>
          <dl>
            <dt>Food</dt>
            <dd><?php echo h($bird->food); ?></dd>
          </dl>
          <dl>
            <dt>Conservation Status</dt>
            <dd class="status-<?php echo h(strtolower(str_replace(' ', '-', $bird->conservation_status()))); ?>">
              <?php echo h($bird->conservation_status()); ?>
            </dd>
          </dl>
          <dl>
            <dt>Backyard Tips</dt>
            <dd><?php echo h($bird->backyard_tips); ?></dd>
          </dl>
        </div>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/birds/index.php'); ?>">Back to List</a>
          <?php if($session->is_logged_in()) { ?>
            <a class="action" href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a>
            <a class="action" href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
