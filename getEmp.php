<?php
function dispEmp()
{
    $mysqli = new mysqli("localhost", "root", "", "digitaldashboard");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$sql ="select eId,eName,eAddress from emloyeedetails";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        
        echo "id: " . $row["eId"]. " - Name: " . $row["eName"]. " " . $row["eAddress"]. "<br>";
    }
} else {
    echo "0 results";
}
}
dispEmp();  

?>