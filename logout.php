<?php

session_start();
unset($_SESSION['userID']);
unset($_SESSION['user']);
unset($_SESSION['userEmail']);
unset($_SESSION['userContact']);

// Alternatively, you can use session_destroy() to completely destroy the session
// session_destroy();

echo "<script> alert('You are logged out!') </script>";
echo "<script> window.location.href = 'index.php' </script>";
