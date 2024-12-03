<?php
// Show PHP version and generate a new hash
echo "PHP Version: " . phpversion() . "<br>";

$password = "Password123";
$hash = password_hash($password, PASSWORD_BCRYPT);
echo "Generated hash: " . $hash . "<br>";

// Test the hash immediately
$test = password_verify($password, $hash);
echo "Verification test: " . ($test ? "SUCCESS" : "FAILED") . "<br>";
?>
