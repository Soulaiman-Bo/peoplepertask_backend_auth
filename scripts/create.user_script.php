<?php
// require_once "model/user_model.php";
//require_once "scripts/signup_script.php";
require_once 'model/region_city_model.php';
require_once "model/user_model.php";


$allregions = getAllRegions();
$allcities = getAllCities();


$firstname = $lastname = $email = $number  = $region = $city = $gender = $password =  $passwordConfirm = $role =   "";
$firstnameErr = $lastnameErr = $emailErr = $numberErr  = $regionErr = $cityErr = $genderErr = $passwordErr = $passwordConfirmErr =  $roleErr =  "";

// if ($_SERVER["REQUEST_METHOD"] == "POST"){
//     $firstnameErr = $_POST['firstname'];
//     $lastnameErr = $_POST['lastname'];
//     $emailErr = $_POST['email'];
//     $numberErr = $_POST['number'];
//     $regionErr = $_POST['region'];
//     $cityErr = $_POST['city'];
//     $genderErr = $_POST['gender'];
//     $passwordErr = $_POST['password'];
//     $passwordConfirmErr = $_POST['passwordConfirm'];
//     $roleErr = $_POST['role'];
// }



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Firstname
    if (empty($_POST["firstname"])) {
        $firstnameErr = "Firstname is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
        // Check if firstname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z]{2,20}$/", $firstname)) {
            $firstnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
        }
    }

    // Validate Lastname
    if (empty($_POST["lastname"])) {
        $lastnameErr = "Lastname is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        // Check if lastname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z]{2,20}$/", $lastname)) {
            $lastnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);

        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }

        // check if email already Exists
        $result = getOneByEmail($email);

        if($result){
            $emailErr = "Email Already exists";
        }

        // if (mysqli_num_rows($result) > 0) {
        // };
    }

    // Validate Phone
    if (empty($_POST["number"])) {
        $numberErr = "Phone number is required";
    } else {
        $number = test_input($_POST["number"]);
        // Check if phone is a valid number
        if (!preg_match("/^[0-9]{10}$/", $number)) {
            $numberErr = "Invalid phone number";
        }
    }

    // Validate Region
    if (empty($_POST["region"])) {
        $regionErr = "Region is required";
    } else {
        $region = test_input($_POST["region"]);
        // Check if region is a number between 1 and 12
        if (!filter_var($region, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 12)))) {
            $regionErr = "Invalid region number";
        }
    }

    // Validate City
    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST["city"]);
        // Check if city is a number between 1 and 404
        if (!filter_var($city, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 404)))) {
            $cityErr = "Invalid city number";
        }
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
        // Check if gender is either 'Male' or 'Female'
        if ($gender != 'Male' && $gender != 'Female') {
            $genderErr = "Invalid gender";
        }
    }


    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
    }

    if (empty($_POST["passwordConfirm"])) {
        $passwordConfirmErr = "Confirm password is required";
    } else {
        $passwordConfirm = test_input($_POST["password"]);

        if ($password !== $passwordConfirm) {
            $passwordConfirmErr = "Password does not match";
        }
    }

    if (empty($_POST["bordered-radio"])) {
        $roleErr = "role is required";
    } else {
        $role = test_input($_POST["bordered-radio"]);
        if ($role != 'admin' && $role != 'customer' && $role != 'freelancer') {
            $roleErr = "Invalid role";
        }
    }

    if (
        empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($numberErr) && empty($roleErr) &&
        empty($regionErr) && empty($cityErr) && empty($genderErr) && empty($passwordErr) &&  empty($passwordConfirmErr)
    ) {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        create($hashedPassword);
        header('location:users.php');
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}





// $ID, $firstname, $lastname, $email, $number, $competences, $region, $city, $gender;
// $firstname = $lastname = $email = $number  = $region = $city = $gender = $password =  $passwordConfirm = $role =   "";
// $firstnameErr = $lastnameErr = $emailErr = $numberErr  = $regionErr = $cityErr = $genderErr = $passwordErr = $passwordConfirmErr =  $roleErr =  "";

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Validate Firstname
//     if (empty($_POST["firstname"])) {
//         $firstnameErr = "Firstname is required";
//     } else {
//         $firstname = test_input($_POST["firstname"]);
//         // Check if firstname contains only letters and is within the specified length
//         if (!preg_match("/^[a-zA-Z]{2,20}$/", $firstname)) {
//             $firstnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
//         }
//     }

//     // Validate Lastname
//     if (empty($_POST["lastname"])) {
//         $lastnameErr = "Lastname is required";
//     } else {
//         $lastname = test_input($_POST["lastname"]);
//         // Check if lastname contains only letters and is within the specified length
//         if (!preg_match("/^[a-zA-Z]{2,20}$/", $lastname)) {
//             $lastnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
//         }
//     }

//     // Validate Email
//     if (empty($_POST["email"])) {
//         $emailErr = "Email is required";
//     } else {
//         $email = test_input($_POST["email"]);
//         // Check if email is valid
//         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//             $emailErr = "Invalid email format";
//         }
//     }

//     // Validate Phone
//     if (empty($_POST["number"])) {
//         $numberErr = "Phone number is required";
//     } else {
//         $number = test_input($_POST["number"]);
//         // Check if phone is a valid number
//         if (!preg_match("/^[0-9]{10}$/", $number)) {
//             $numberErr = "Invalid phone number";
//         }
//     }

//     // Validate Region
//     if (empty($_POST["region"])) {
//         $regionErr = "Region is required";
//     } else {
//         $region = test_input($_POST["region"]);
//         // Check if region is a number between 1 and 12
//         if (!filter_var($region, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 12)))) {
//             $regionErr = "Invalid region number";
//         }
//     }

//     // Validate City
//     if (empty($_POST["city"])) {
//         $cityErr = "City is required";
//     } else {
//         $city = test_input($_POST["city"]);
//         // Check if city is a number between 1 and 404
//         if (!filter_var($city, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 404)))) {
//             $cityErr = "Invalid city number";
//         }
//     }

//     // Validate Gender
//     if (empty($_POST["gender"])) {
//         $genderErr = "Gender is required";
//     } else {
//         $gender = test_input($_POST["gender"]);
//         // Check if gender is either 'Male' or 'Female'
//         if ($gender != 'Male' && $gender != 'Female') {
//             $genderErr = "Invalid gender";
//         }
//     }

//     if (
//         empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($numberErr) &&
//         empty($regionErr) && empty($cityErr) && empty($genderErr)
//     ) {
//         $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
//         create($hashedPassword);
//         header('location:?view=getAllUsers');
//     }


// }

// function test_input($data)
// {
//     $data = trim($data);
//     $data = stripslashes($data);
//     $data = htmlspecialchars($data);
//     return $data;
// }

?>

