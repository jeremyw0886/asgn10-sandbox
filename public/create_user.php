<?php
// Simple script to generate a password hash
$password = "Password123";
$hash = password_hash($password, PASSWORD_BCRYPT);
echo "<pre>";
echo "Password: " . $password . "\n";
echo "Generated Hash: " . $hash . "\n";
echo "</pre>";

// Verify the hash works
$verify = password_verify($password, $hash);
echo "Hash verification test: " . ($verify ? "SUCCESSFUL" : "FAILED");
?>
