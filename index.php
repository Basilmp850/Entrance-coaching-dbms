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
  <title>Sharon</title>

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

    .container {
      height: 100vh;
      background-image: linear-gradient(rgba(0, 0, 0, 0.92),
          rgba(0, 0, 0, 0.95)),
        url("./education\ .jpg");
      background-size: cover;
      background-position: center;
    }

    .heading {
      width: 100%;

      height: 20%;
      background-color: #66fcf1;
      
      color: #1F2833;
    }

    .heading p {
      text-align: center;
    }

    .sharontext {
      font-size: 3rem;
      font-weight: bolder;
    }

    .subtext {
      font-family: "Dancing Script", cursive;
      font-size: 2.2rem;
      transform: translateY(-9px);
      letter-spacing: 4px;
      margin-top: 20px;
      font-weight: bolder;
    }

    main {
      width: 100%;
      height: 70%;
      color: white;
      margin: 4% auto;
      display: flex;
    }

    main section {
      margin: 10px auto;
    }

    .capsule {
      margin-top: 50px;
      font-size: 1.5rem;

      text-align: center;
      padding: 0 50px;
    }

    .span1 {
      text-align: left;
      float: left;
      width: 200px;
      font-size: 24px;
      font-weight: bold;
    }

    .span2:hover {
     
      color: palevioletred;
      cursor: pointer;
      border: 2px solid pink;
    }

    .span2 {
      margin-right: 20px;
      background-color: #0b0c10;
      padding: 0 15px;
      font-size: 24px;
      font-weight: bold;
      color: #c5c5c5;;
      border: 2px solid #66fcf1;
    }

    .span3:hover {
      background-color: white;
      color: blue;
      cursor: pointer;
    }

    .span3 {
      background-color: #C5C6C7;
      padding: 0 15px;
      font-size: 24px;
      font-weight: bold;
      color: #0b0c10;
    }

    a {
      text-decoration-color: none;
      color: white;
    }

    .buttonsection button {
      display: flex;

    }

    main {
      display: flex;
      flex-direction: column;
    }

    .sectioncont {


      display: flex;
      color: #C5C6C7;
    }

    .buttonsection button {

      display: inline-block;
      margin-left: 50px;
      padding: 16px;
      width: 180px;
      font-size: 17px;
      font-weight: bold;
      transform: translateX(-16px);
      border: 3px solid #66fcf1;
      background-color: #0b0c10;

      color: #C5C6C7;

    }

    .buttonsection button:hover {

      cursor: pointer;
      border: 2px solid pink;

    }
  </style>
</head>

<body>
  <div class="container">
    <header class="heading">
      <p class="sharontext">R K S ACADEMY</p>
      <p class="subtext">Excellence in Teaching.....</p>
    </header>
    <main>
      <section class="buttonsection">

        <a href="./reports/rank.php"><button class="generaterank">Generate Rank</button></a>
        <a href="./reports/fee.php"><button class="feestatus">Fee Status</button></a>
        <a href="./reports/topper.php"><button class="batchwisetoppers">Batchwise Rank</button></a>
        <a href="./reports/dependents.php"><button class="dependentslist">Dependents List</button></a>
        <a href="./reports/studentdetails.php"><button class="studentreport">Student Report</button></a>
      </section>
      <div class="sectioncont">
        <section class="section1">
          <div class="capsule">
            <span class="span1">STUDENT</span>
            <a href="./frontend/student.php"><span class="span2">ADD</span></a>
            <a href="./display/student.php"><span class="span3">VIEW</span></a>
          </div>
          <div class="capsule">
            <span class="span1">MARKS</span>
            <a href="./frontend/studmarks.php"><span class="span2">ADD</span></a>
            <a href="./display/studmarks.php"><span class="span3">VIEW</span></a>
          </div>
          <div class="capsule">
            <span class="span1">BATCH</span>
            <a href="./frontend/batch.php"><span class="span2">ADD</span></a>
            <a href="./display/batch.php"><span class="span3">VIEW</span></a>
          </div>
          <div class="capsule">
            <span class="span1">STAFFS</span>
            <span class="span2">ADD</span>
            <span class="span3">VIEW</span>
          </div>
        </section>
        <section class="section2">
          <div class="capsule">
            <span class="span1">PROFESSOR</span>
            <a href="./frontend/professor.php"><span class="span2">ADD</span></a>
            <a href="./display/professor.php"><span class="span3">VIEW</span></a>
          </div>
          <div class="capsule">
            <span class="span1">SESSIONS</span>
            <span class="span2">ADD</span>
            <span class="span3">VIEW</span>
          </div>
          <div class="capsule">
            <span class="span1">DEPARTMENT</span>
            <a href="./frontend/department.php"><span class="span2">ADD</span></a>
            <a><span class="span3">VIEW</span></a>
          </div>
          <div class="capsule">
            <span class="span1">DEPENDENTS</span>
            <a href="./frontend/dependents.php"><span class="span2">ADD</span></a>
            <a href="./display/dependents.php"><span class="span3">VIEW</span></a>
          </div>
        </section>
      </div>
    </main>
  </div>
</body>

</html>