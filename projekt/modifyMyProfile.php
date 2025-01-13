<?php
session_start();
include 'database.php';

if(isset($_SESSION['message']) && !empty($_SESSION['message'])):
    ?>
        <div class="message">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?> 
        </div>
    <?php
    endif;


// Ellenőrizzük, hogy be van-e jelentkezve a felhasználó
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['id'];