<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Home'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <h1>Welcome to WNC Birds</h1>
      <div class="intro">
        <h2>Discover Western North Carolina's Birds</h2>
        <p>Explore our database of local birds and learn about their habitats, behaviors, and conservation status.</p>
      </div>

      <div class="actions">
        <a href="<?php echo url_for('/birds/index.php'); ?>" class="view-btn">View Bird Catalog</a>
        <?php if($session->is_logged_in()) { ?>
          <a href="<?php echo url_for('/birds/new.php'); ?>" class="edit-btn">Add New Bird</a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
