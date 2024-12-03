<?php 
require_once('../../private/initialize.php'); 

/** @var Bird[] $birds */
$birds = Bird::find_all();
?>

<?php $page_title = 'Bird List'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <div class="birds listing">
        <h1>Birds</h1>

        <?php if($session->is_logged_in()) { ?>
          <div class="actions">
            <a class="action" href="<?php echo url_for('/birds/new.php'); ?>">Add Bird</a>
          </div>
        <?php } ?>

        <table class="list">
          <tr>
            <th>Name</th>
            <th>Habitat</th>
            <th>Food</th>
            <th>Conservation Status</th>
            <th>Backyard Tips</th>
            <th>&nbsp;</th>
          </tr>

          <?php foreach($birds as $bird) { /** @var Bird $bird */ ?>
            <tr>
              <td><?php echo h($bird->common_name); ?></td>
              <td><?php echo h($bird->habitat); ?></td>
              <td><?php echo h($bird->food); ?></td>
              <td class="status-<?php echo h(strtolower(str_replace(' ', '-', $bird->conservation_status()))); ?>">
                <?php echo h($bird->conservation_status()); ?>
              </td>
              <td><?php echo h($bird->backyard_tips); ?></td>
              <td class="actions">
                <a class="action view-btn" href="<?php echo url_for('/birds/show.php?id=' . h(u($bird->id))); ?>">View</a>
                <?php if($session->is_logged_in()) { ?>
                  <a class="action edit-btn" href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a>
                  <a class="action delete-btn" href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
