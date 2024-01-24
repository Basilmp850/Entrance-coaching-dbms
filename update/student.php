<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<?php
    $admno=$_GET['updateid'];
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>updatestudent</title>
    <style>
        input,
        button,.flexcontainer {
            display: block;
            width: 30%;
            border: 2px solid black;
            margin: 2% auto;
            padding: 10px;

        }

        button {
            display: inline block;
            
        }
        .flexcontainer{
            border:none;
                /* width: 30%; */
            display: flex;
        }

        .submit {

            width: 150px;
            background-color: green;
            cursor: pointer;
        }

        h1 {
            text-align: center;
            margin-bottom: 7%;
        }

        .viewbutton {

            background-color: palevioletred;
            width: 100px;
            cursor:pointer;
        }
        
    </style>
</head>

<body>
    <h1>ENTER THE DETAILS</h1>
    <form method="post" action="./">
        <input type="text" name="name" placeholder="Enter your name" >
        <input type="text" name="salary" placeholder="Enter your salary">
        <input type="text" name="pf" placeholder="Enter the pf">
        <div class="flexcontainer">
            <button name="submit" class="submit">Update</button>
        </div>

    </form>
    <a href="./view_data/display.php"><button name="view" class="viewbutton">View data</button></a>



</body>

</html>