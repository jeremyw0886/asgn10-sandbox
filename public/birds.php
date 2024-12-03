<?php require_once('../private/initialize.php'); ?>

<?php $page_title = 'Bird Inventory'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <div class="intro">
        <h1>Bird Inventory</h1>
        <p>Welcome to the WNC Birds inventory page. Here you can browse our complete collection of documented birds.</p>
      </div>

      <div class="actions">
        <a href="<?php echo url_for('/birds/index.php'); ?>" class="view-btn">View Full Catalog</a>
      </div>

      <div class="content-section">
        <h2>Conservation Status Categories</h2>
        <ul>
          <li><span class="status-low-concern">Low Concern</span> - Population is stable</li>
          <li><span class="status-moderate-concern">Moderate Concern</span> - Population shows some decline</li>
          <li><span class="status-extreme-concern">Extreme Concern</span> - Population is severely declining</li>
          <li><span class="status-extinct">Extinct</span> - No longer found in the wild</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
