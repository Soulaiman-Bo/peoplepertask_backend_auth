<?php
session_start();

//$email = $_SESSION['email'];
//$password = $_SESSION['password'];

// if($email != false){
//     header('Location: ');
// }

if (isset($_SESSION['role'])) {
    header('Location:dashboard.php');
}


$firstname = $lastname = $email = $number  = $region = $city = $gender = $password =  $passwordConfirm =  "";
$firstnameErr = $lastnameErr = $emailErr = $numberErr  = $regionErr = $cityErr = $genderErr = $passwordErr = $passwordConfirmErr =  "";

require_once "model/user_model.php";





if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = test_input($_POST["email"]);

    if (empty($email)) {
        $emailErr = "Email is required";
    } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
    }


    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

   

    if (empty($emailErr) && empty($passwordErr)) {
        $row = getOneByEmail($email);
        

        if ($row > 0) {
        
            $fetchedpasswrd = $row['password'];
            $fetchedFirstname = $row['firstname'];
            $fetchedLastname = $row['lastname'];
            $fetchedrole = $row['role'];
            $fetchedID = $row['ID'];


           // die($fetchedID) ;

            if (password_verify($password, $fetchedpasswrd)) {

                $_SESSION['email'] = $email;
                $_SESSION['firstname'] = $fetchedLastname;
                $_SESSION['lastname'] = $fetchedFirstname;
                $_SESSION['role'] = $fetchedrole;
                $_SESSION['ID'] = $fetchedID;

                header('location:dashboard.php');
            }
        }else {
            $emailErr = "This email doen not exist";
        }
    }


}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>