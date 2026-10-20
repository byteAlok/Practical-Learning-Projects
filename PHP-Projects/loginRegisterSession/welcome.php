<?php
    session_start();
?>

<h1 style="font-family:arial; text-align:center;">
    Welcome <span style="color:red;"><?php echo $_SESSION["name"]; ?> </span>
</h1>
<button>Logout</button>