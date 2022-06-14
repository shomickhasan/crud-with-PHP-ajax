<?php
   include'db.php';
  $check = $_POST['checker'];

  $check();



  function userInsert(){
  	global $conn;

  	$studentName = $_POST['studentName'];
  	$studentRoll = $_POST['studentRoll'];
  	$studentPhone = $_POST['studentPhone'];
  	$studentAddress = $_POST['studentAddress'];

  	$sql="INSERT INTO tbl_student(studentName, studentRoll, studentPhone, studentAddress) 
  	     VALUES ('$studentName','$studentRoll','$studentPhone','$studentAddress')";

  	   $result=$conn->query($sql);
  	if ($result) {
  		echo '<div class="alert alert-primary" role="alert">
           Student Added Successfully
          </div>';
  	}

  }

  function showInfo(){
  	global $conn;
  	$sql= "SELECT * FROM tbl_student";
  	$result = $conn->query($sql);
  	$tableData="";
  	$tableData .="<table border='1px'>
  		<tr>
  		    <th>Name</th>
  		    <th>Roll</th>
  		    <th>Phone</th>
  		    <th>Address</th>
  		    <th>Action</th>
  		</tr>";

  		foreach ($result as $data){

  			$tableData .= "<tr>
              	<td>".$data['studentName']."</td>
              	<td>".$data['studentRoll']."</td>
              	<td>".$data['studentPhone']."</td>
              	<td>".$data['studentAddress']."</td>
              	<td>
                    <button onclick='showDatforUpdate(".$data['id'].")'class='btn-sm btn-success'>edit</button>
                    <button class='btn-sm btn-danger'>Delete</button>
              	</td>
  			</tr>";
  		}

  		$tableData .= "</table>";
  		echo $tableData;


  }


  function userUpdate(){
    global $conn;
    $studentName = $_POST['studentName'];
    $studentRoll = $_POST['studentRoll'];
    $studentPhone = $_POST['studentPhone'];
    $studentAddress = $_POST['studentAddress'];
    $id = $_POST['id'];

    $sql="UPDATE tbl_student SET studentName='$studentName',studentRoll='$studentRoll',studentPhone='$studentPhone',studentAddress='$studentAddress' WHERE id='$id'";
     $result = $conn->query($sql);
     if($result){
        echo '<div class="alert alert-danger" role="alert">
           Student information update Successfully
          </div>';
     }

   
  }

  function showInfoinputforupfate(){
    $id= $_POST['id'];
    global $conn;

    $sql= "SELECT * FROM tbl_student WHERE id='$id'";
    $result = $conn->query($sql);
    $data="";
    foreach($result as $row){
        $data= $row;
    }
    echo json_encode($data);

  }


?>