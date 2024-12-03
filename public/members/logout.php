<?php
require_once('../../private/initialize.php');

$session->logout();
$session->message('You have been logged out.');
redirect_to(url_for('/index.php'));
?>
