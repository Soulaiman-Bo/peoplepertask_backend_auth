<!-- <?php

require_once "config/dbConnect.php";


function create($hashedPassword)
{
    extract($_POST);
    $role = $_POST["bordered-radio"];
    $conn = dbConnect();
    $sql = "INSERT INTO users (firstname, lastname, password, email, number, role, region, city, gender)
    VALUES ('$firstname', '$lastname', '$hashedPassword', '$email', '$number', '$role', '$region', '$city', '$gender')";
    
    $result = $conn->query($sql);

    $conn->close();
    return $result;

};

function getAll()
{
    $conn = dbConnect();
    $sql = "SELECT F.ID, F.firstname, F.lastname, F.email, F.role, F.gender, R.region, V.ville
            FROM `users` F
            JOIN `region` R ON F.region = R.id
            INNER JOIN `ville` V ON F.city = V.id;
    ";


    $result = $conn->query($sql);
    $conn->close();
    return $result;
};

function getHomeUsers()
{
    $conn = dbConnect();
    $sql = "SELECT F.ID, F.firstname, F.lastname, F.email, F.role, F.gender, R.region, V.ville
            FROM `users` F
            JOIN `region` R ON F.region = R.id
            INNER JOIN `ville` V ON F.city = V.id
            LIMIT 3;
    ";


    $result = $conn->query($sql);
    $conn->close();
    return $result;
};

// function getOne($id)
// {
//     $conn = dbConnect();
//     $sql = "SELECT * FROM users WHERE id = $id";
//     $result = $conn->query($sql);
//     $conn->close();
//     return $result;
// }

function getOne($id)
{
    $conn = dbConnect();

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepare statement was successful
    if ($stmt === false) {
         die("Error in prepare statement: " . $conn->error);
    }

    // Bind the parameter
    $stmt->bind_param("i", $id); 

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $row;
}




function getOneByEmail($email)
{
    $conn = dbConnect();

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);

    // Check if the prepare statement was successful
    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    // Bind the parameter
    $stmt->bind_param("s", $email);  

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch the row
    $row = $result->fetch_assoc();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $row;
}



function delete($ID)
{
    $conn = dbConnect();

   
    $sql = "DELETE FROM users WHERE ID = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    // Bind the parameter
    $stmt->bind_param("i", $ID);  

    // Execute the delete
    $result = $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $result;
}


// '$firstname', '$lastname', '$email', '$number', '$role', '$region', '$city', '$gender'
function update($ID, $firstname, $lastname, $email, $number, $role, $region, $city, $gender)
{
    // $mysqli = new mysqli("your_host", "your_username", "your_password", "your_database");
    $mysqli = dbConnect();
    $sql = "UPDATE users
            SET firstname = ? ,
                lastname = ? , 
                email = ? , 
                number = ? , 
                role = ? ,
                region= ?,
                city = ?,
                gender = ?
            WHERE ID = ?";

    $stmt = $mysqli->prepare($sql);

    // Check if the prepare statement was successful
    if ($stmt === false) {
        die("Error in prepare statement: " . $mysqli->error);
    }

    // Bind parameters
    $stmt->bind_param("sssssiisi", $firstname, $lastname, $email, $number, $role, $region, $city, $gender, $ID);

    // Execute the update
    $result = $stmt->execute();

    // Close the statement and connection
    $stmt->close();
    $mysqli->close();

    return $result;
}
