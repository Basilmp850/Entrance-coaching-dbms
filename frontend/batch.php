<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Open+Sans&display=swap"
      rel="stylesheet"
    />
    <title>batch</title>

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
        width: 41%;
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
    </style>
  </head>
  <body>
    <div class="container">
      <header class="heading">
        <p class="sharontext">RKS INSTITUTE</p>
        <p class="subtext">Excellence in Teaching...</p>
        <div class="" style="transform:translateY(-40px);margin-right: 30px; float:right;">
        <a href="../index.php"><button style="padding: 8px;
    width: 100px;
    display: block;
    background-color: blue;
    color: white; border: 2px solid white;font-weight: bolder;cursor:pointer;">HOME</button></a>

      </div>
      </header>
      <main>
        <section class="headingsection">
          <p>BATCH DETAILS</p>
        </section>
        <section class="bodysection">
          <form action="../backend/batchval.php" method="POST">
            <label for="batchno">BatchNo: </label>
            <input type="text" name="batchno" class="batchno" />
            <br />
            <label for="name">Name: </label>
            <input type="text" name="name" class="name" />
            <br />
            <label for="classteacherssn">ClassteacherSSN: </label>
            <input type="text" name="teacherssn" class="classteacherssn" />
            <br />


            

            <div class="buttongroup">
              <button name = "submit" class="submit">Submit</button>
            </div>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
