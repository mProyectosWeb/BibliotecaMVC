# Developed by MiguelAngel
<?php
    session_start();
    session_destroy();
    header("Location: loginAdmin");
    exit();
?>