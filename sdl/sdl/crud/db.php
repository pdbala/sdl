<?php
$conn = mysqli_connect("localhost","root","","demo");

if($conn){
  echo "Connected";
}
else{
    echo "Failed ";
}
$sql="INSERT INTO blog values('1','hello','world','tags')";
$result = $conn->query($sql);
$result = mysqli_query($conn,$sql);

if($result){
    echo "Inserted";
}

$sel= mysqli_query($conn,"SELECT * FROM blog");

while($row = mysqli_fetch_assoc($sel)){
    echo $row["id"];
    echo $row["head"];
    echo $row["content"];
    echo $row["tags"];
}

$conn->query("DELETE FROM blog")

?>