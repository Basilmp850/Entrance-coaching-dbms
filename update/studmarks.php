
<?php
    include '../INCLUDES/navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Open+Sans&display=swap" rel="stylesheet" />
    <title>marksupdate</title>

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Dancing Script", cursive;
            font-family: "Open Sans", sans-serif;
            letter-spacing: 2px;
        }

        .heading {
            width: 100%;
            color: black;
            background-color: palevioletred;
            height: 15%;
        }

        .heading p {
            text-align: center;
        }

        .sharontext {
            font-size: 3rem;
        }

        .subtext {
            font-family: "Dancing Script", cursive;
            font-size: 2rem;
            transform: translateY(-9px);
            letter-spacing: 4px;
        }

        .headingsection {
            font-size: 2rem;
            margin-bottom: 2%;
            margin-top: 1%;
            font-weight: bold;
        }

        label {
            width: 18%;
            display: inline-block;
            text-align: left;
            margin-bottom: 3%;
            font-size: 1.3rem;
            font-weight: 600;
        }

        input,
        select {
            width: 50%;
            margin-right: 30px;
            border: 2px solid black;
            border-radius: 2px;
            padding: 6px;
        }

        main {
            text-align: center;
        }

        .bodysection {
            width: 40%;
            margin: auto;
        }

        .buttongroup {
            margin-top: 5%;
            transform: translateX(4.3rem);
            width: 40%;
            margin-left: auto;
            margin-right: auto;
        }

        /* .clear {
          background-color: red;
          padding: 10px;
          width: 100px;
          border: 2px solid black;
          color: white;
          font-size: 1.1rem;
        }
  
        .clear:hover {
          background-color: rgb(90, 85, 85);
          color: red;
          cursor: pointer;
        } */
        .submit {
            background-color: green;
            padding: 10px;
            width: 100px;
            border: 2px solid black;
            color: white;
            font-size: 1.1rem;
            margin-left: auto;
            margin-right: auto;
            display: block;
            width: 150px;

            transform: translateX(-27%);

            font-size: 20px;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .submit:hover {
            background-color: rgb(90, 85, 85);

            cursor: pointer;
            border: 2px solid green;
        }

        .capsule {
            text-align: center;
            margin-top: 50px;
            color: black;
            font-weight: bold;
        }

        .gobackbutton {
            background-color: lightseagreen;
            padding: 7px;
            color: white;
            margin-left: 20px;
            border: 2px solid white;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="heading">
            <p class="sharontext">SHARON COACHING CENTER</p>
            <p class="subtext">Excellence in Teaching...</p>
        </header>
        <main>
            <section class="headingsection">
                <p>TEST MARKS</p>
            </section>
            <section class="bodysection">
                <form action="./studmarks.php" method="POST">
                    <label for="admno">Admno: </label>
                    <input type="text" name="admno" class="admno" value=<?php echo $GLOBALS['admno'];?> >
                    <br />

                    <label for="marks">Marks: </label>
                    <input type="text" name="marks" class="marks" value=<?php echo $marks;?>>
                    <br />

                    <div class="buttongroup">
                        <button name="submit" class="submit">Update</button>
                    </div>
                </form>
            </section>
        </main>
    </div>
</body>

</html>

<?php

include '../database/connect.php';

$admno;
$marks;
if (isset($_POST['submit'])) {
    
    $GLOBALS['admno']=  $_POST['admno'];
    $GLOBALS['marks'] = $_POST['marks'];




    if (empty($admno) or empty($marks)) {
        echo "Form field is empty";
    } else {


        $sqlinsert = "update STUD_MARKS set marks=$marks where admno=$admno";
        $result = mysqli_query($con, $sqlinsert);
        if ($result) {
            echo "<div class='capsule'";
            echo "<strong>Data Updated Successfully</strong>";
            echo "<a href='../display/studmarks.php'><button class='gobackbutton'>Go back</button></a>";
            echo "</div>";
        } else {

            die(mysqli_error($con));
        }
    }
}

?>