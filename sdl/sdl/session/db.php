<?php
$conn = mysqli_connect("localhost","root","","demo");

if($conn){
    echo "connected";
}
else{
    echo "not connected";
}
?>
