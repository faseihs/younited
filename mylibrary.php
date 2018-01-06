<?php
function js_alert($message)
{
    echo "<script> alert($message) </script>";
}

function console_alert($message){
    echo "<script> console.log($message) </script>";
}
?>