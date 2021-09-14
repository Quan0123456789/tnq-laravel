<?php
session_start();

// unset()
// session_unset()
// session_destroy()

session_destroy();

echo $_SESSION["mail"]."<br/>".$_SESSION["pass"];
?>