<?php
  if(!isset($page_title)) { $page_title = 'WNC Birds'; }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>WNC Birds - <?php echo h($page_title); ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/style.css'); ?>">
  </head>

  <body>
    <header>
      <h1><a href="<?php echo url_for('/index.php'); ?>">WNC Birds</a></h1>
      <nav>
        <ul>
          <li><a href="<?php echo url_for('/index.php'); ?>">Home</a></li>
          <li><a href="<?php echo url_for('/birds/index.php'); ?>">Birds</a></li>
          <li><a href="<?php echo url_for('/about.php'); ?>">About</a></li>
          <?php if($session->is_logged_in()) { ?>
            <li><a href="<?php echo url_for('/birds/new.php'); ?>">Add Bird</a></li>
            <li>Welcome, <?php echo h($session->username); ?></li>
            <li><a href="<?php echo url_for('/members/logout.php'); ?>">Logout</a></li>
          <?php } else { ?>
            <li><a href="<?php echo url_for('/members/login.php'); ?>">Login</a></li>
          <?php } ?>
        </ul>
      </nav>
    </header>

    <?php echo display_session_message(); ?>
