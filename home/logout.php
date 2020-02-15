<?php
session_start();
if(isset( $_SERVER['HTTP_REFERER'])){
session_destroy();
header("Location:".$_SERVER['HTTP_REFERER']);
}
else{
    header("Location:index.php");

}
?>
