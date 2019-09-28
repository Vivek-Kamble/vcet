<?php 
    
  
    session_start();
  

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.html');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.html");
  }?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 360px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 410px;
}
</style>
</head>
<body>

<div>
  <div style="display:inline-block;">
  <h2>Project Leader</h2>  
</div>
<div style="float:right;">
  <h3><?php echo $_SESSION['username']; ?></h3>
  <a href="pl.php?logout='1'" style="color: red;">log out</a>
</div>
<div>
<p></p>

    <div class="tab">
      <button class="tablinks" onclick="openCity(event, 'Employee')" id="defaultOpen">Employee</button>
      <button class="tablinks" onclick="openCity(event, 'Add_Employee')">Add Employee</button>
      <button class="tablinks" onclick="openCity(event, 'View')">View_Employee</button>
      <button class="tablinks" onclick="openCity(event, 'Project_details')">Project details</button>
      <button class="tablinks" onclick="openCity(event, 'Add_Task')">Add task</button>
      <button class="tablinks" onclick="openCity(event, 'Add_Project')">Add Project</button>
    </div>

<div id="Employee" class="tabcontent" >
<?php
function dispEmp()
{
    $mysqli = new mysqli("localhost", "root", "", "DigitalDashboard");
if($mysqli->connect_error) {
  exit('Could not connect');
}
$sql ="select eId,eName,eAddress from emloyeeDetails";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<table class="."table table-striped".">";
echo "<tbody>";
echo "<tr><th>Employee Id</th><th>Name</th><th>Address</th></tr></tbody><tr>";
    while($row = $result->fetch_assoc()) {

        
        echo "<tr><td>" . $row["eId"]. " </td><td>" . $row["eName"]. " </td><td>" . $row["eAddress"]. "</td></tr>";
    }
    echo "</tr>";
echo "</tbody>";
echo "</table>";
} else {
    echo "0 results";
}
}
dispEmp();  

?>
</div>

<div id="Add_Employee" class="tabcontent">
<form action="addEmp.php" method="post">
<div class="form-group">
  <input type="text" placeholder="Name" class="form-control col-md-4 mt-2" name="name">  
</div>
<div class="form-group">
  <input type="text" placeholder="Email/Username" class="form-control col-md-4 " name="email">  
</div>
<div class="form-group">
  <input type="text" placeholder="Mobile" class="form-control col-md-4 " name="mobile">  
</div>

<div class="form-group">
  <input type="password" placeholder="password" class="form-control col-md-4 " name="password">  
</div>
<div class="form-group">
  <input type="text" placeholder="address" class="form-control col-md-4 " name="address">  
</div>
<button class="btn btn-success" type="submit" name="addEmp">Add Employee</button>
</form>
</div>

<div id="View" class="tabcontent">
  <h3>View_Employee</h3>
  <p>view all employee.</p>
</div>

<div id="Project_details" class="tabcontent">
  <h3>Project_details</h3>
  <p>Project details.......</p>
</div>

<div id="Add_Task" class="tabcontent">
  <h3>Add Task</h3>
  <p>Add Task........dsfgj
  dsfgjsdfd
  sfds
  dsf</p>
</div>

<div id="Add_Project" class="tabcontent">

</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) 
  {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
 evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it/
 document.getElementById("defaultOpen").click();


</script>
   
</body>
</html> 
