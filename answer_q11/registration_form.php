<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="styles.css" type="" rel="stylesheet" />
</head>

<body>

    <div class="mid-div">
        <h2 style="text-align: center;"><u>Registration Form</u></h2>
        <div class="form-div mid-div">
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" autocomplete="off" class="container">
                <div class="lav">
                    <label for="firstname"> First Name: </label>
                    <input class="lav" type="text" placeholder="Enter your first name" name="fname"></input>
                </div>
                <div>
                    <label for="lastname"> Last Name: </label>
                    <input class="lav" type="text" placeholder="Enter your last name" name="lname"></input>
                </div>

                <div class="lav">
                    <label for="email"> Email: </label>
                    <input class="lav" type="email" placeholder="Enter your email address" name="email"></input>
                </div>

                <div class="lav">
                    <label for="password"> Password: </label>
                    <input class="lav" type="password" placeholder="Enter password please" name="passwordd"></input>
                </div>

                <div class="lav">
                    <label for="birthdate"> Date Of Birth: </label>
                    <input class="lav" type="date" name="bdate"></input>
                </div>


                <div class="lav">
                    <label for="nationality">Nationality: </label>
                    <input class="lav" type="text" placeholder="Enter your nationality" name="nationality"></input>
                </div>

                <div class="lav">
                    <label for="gender"> Gender: </label>
                    <input class="lav" type="text" placeholder="Enter your gender" name="gender"></input>
                </div>

                <div class="lav">
                    <label for="nid">NID NO.:</label>
                    <input class="lav" type="number" placeholder="Enter NID number" name="nid"></input>
                </div>

                <div class="lav">
                    <button name="submit" type="submit" class="lav">Submit</button>
                    <input class="lav" type="reset" value="Clear">
                </div>


            </form>
        </div>
    </div>


    <footer>
        <p id="copyrightid">Copyright &copy; HasiburRahman 2021</p>
    </footer>


    <?php

    if (isset($_POST['submit'])) {
        $connection = mysqli_connect('localhost', 'root', '', 'commonDB') or die("not connected" . mysqli_error());

        $fn = mysqli_real_escape_string($connection, $_POST['fname']);
        $ln = mysqli_real_escape_string($connection, $_POST['lname']);
        $eml = mysqli_real_escape_string($connection, $_POST['email']);
        $pwd = mysqli_real_escape_string($connection, $_POST['passwordd']);
        $bd = mysqli_real_escape_string($connection, $_POST['bdate']);
        $nty = mysqli_real_escape_string($connection, $_POST['nationality']);
        $gndr = mysqli_real_escape_string($connection, $_POST['gender']);
        $id = mysqli_real_escape_string($connection, $_POST['nid']);
        $query = "SELECT id FROM users WHERE id='$id'";
        $result = mysqli_query($connection, $query) or die("Query Faild");
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            echo "ID already Exist";
        } else {
            $query1 = "INSERT INTO users (fname,lname,email,passwordd,bdate,nationality,gender,nid)
                            VALUES ('$fn','$ln',$eml,'$pwd','$bd',$nty,'$gndr','$id')";
            $result2 = mysqli_query($connection, $query1) or die("Query Faild2");
        }
    }
    ?>

</body>

</html>