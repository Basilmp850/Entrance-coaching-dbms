<?php
    include '../INCLUDES/navbar.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
        }
        button {
            background-color: blue;
            padding: 10px;
            cursor: pointer;
            display: inline-block;
            width: 15%;
            
            
        }
        td,th{
            width:130px;
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid black;
            
        }
        td a button{
            width:90px;
            text-align: center;
            font-size:1.1rem;
            color:white;
            font-weight:bold;
            background-color: green;
            
            
        }
        .gotoinsert{
            margin-left:80%;
            color:white;
            font-size : 1.3rem;
            font-weight: bold;
            margin-bottom:50px;
        }
        .update{
            background-color: green;
        }
        .delete{

            background-color: red;
        }
        table{
            margin-left:auto;
            margin-right:auto;

            
        }
        .table1{
            border-spacing:0;
        }
        .table1 tr {
            background-color: aqua;
            
        }
        .table1 tr {
            background-color: aqua;
            
        }

       
        body{
            background-color: rosybrown;
        }
        tr{
            background-color: lightskyblue;
        }

        .gotoinsert{
            background-color: lightcoral;
            border: 2px solid white;
            color: white;
            
        }

      
    </style>
</head>

<body>
    <a href="../frontend/student.php"><button class="gotoinsert">Go to insert</button></a>
</body>

</html>

<?php
include '../database/connect.php';
$sqlselect = "Select * from STUDENT";
$result = mysqli_query($con, $sqlselect);
$num_rows = mysqli_num_rows($result); //to get the number of rows of processed result set...
// echo $num_rows."<br>";  
if ($result) {
    if ($num_rows == 0) {
        echo "No result found" . "<br>";
    } else {
        echo "
            
          <table class='table1'>
            <tr>
            <th>Id</th>
              <th>Name</th>
              <th>DOB</th>
              <th>BatchNo</th>
            
              <th>Age</th>
              <th>Phone</th>
              <th>Sex</th>
              <th>Fees</th>
              <th>Update</th>
              <th>Delete</th>
            </tr>
          </table>
            ";

        echo "<br>";
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $admno = $row['admno'];
        $name = $row['name'];
        $dob = $row['dob'];
        $batchno = $row['batchno'];
        $age= $row['age'];
        $phone = $row['phone'];
        $sex = $row['sex'];
        $fees = $row['feespaid'];

        // echo $id.'<br>';
        // echo $name.'<br>';
        // echo $salary.'<br>';
        // echo $pf.'<br>';
        // echo "<br>";
        // echo "<br>";

        echo "
        <table>
            <tr>
                <td>".$admno."</td>
                <td>".$name."</td>
                <td>".$dob."</td>
                <td>".$batchno."</td>
                <td>".$age."</td>
                <td>".$phone."</td>
                <td>".$sex."</td>
                <td>".$fees."</td>
                <td><a href='../update/student.php?updateid=".$admno."'><button class='update'>Update</button></a></td>
                <td><a href='../delete/student.php?deleteid=".$admno."'><button class='delete'>Delete</button></a></td>

            </tr>
        </table>
        ";
    }
} else {

    die(mysqli_error($con));
}

?>

