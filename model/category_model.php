<?php

// function dbConnect()
// {
//     return new PDO('mysql:dbname=peoplepertask;host=localhost', 'root', '');
// }


// CREATE TABLE `category` ( 
//     `ID` int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
//     `category_name` varchar(100) DEFAULT NULL, 
//     `parent_caregory` int DEFAULT NULL, 
//     `created_At` datetime DEFAULT CURRENT_TIMESTAMP, 
//     `modified_At` datetime DEFAULT CURRENT_TIMESTAMP, 
//     FOREIGN KEY (parent_caregory) REFERENCES `category`(ID) on DELETE CASCADE ON UPDATE CASCADE );

require_once "config/dbConnect.php";


function createCat()
{

    extract($_POST);
    $conn = dbConnect();

    $parentCategoryId;

    if ($parentcategory == 'null') {
        $parentcategory = NULL;
    }

    // else {
    //     $sql = "SELECT ID FROM category WHERE category_name = '$parentcategory'";
    //     $result = $conn->query($sql);
    //     $row = $result->fetch_assoc();
    //     $parentCategoryId = $row['ID'];
    // }




    $sql = "INSERT INTO category (category_name, parent_caregory) VALUES ('$name', '$parentcategory')";
    $result = $conn->query($sql);
    $conn->close();
    return  $result;
};


// function getAllCatWithParent()
// {
//     $conn = dbConnect();
//     $sql = "SELECT C1.ID As ID,  C2.category_name AS category, C1.category_name AS parentCategory
//             FROM `category` C2
//             JOIN `category` C1
//             ON C1.ID = C2.parent_caregory";

//     $result = $conn->query($sql);
//     $conn->close();
//     return  $result;


// // SELECT C2.category_name, C1.category_name
// // FROM `category` C2
// // JOIN `category` C1
// // ON C1.ID = C2.parent_caregory;

// };

function getAllCatWithParent()
{
    $conn = dbConnect();

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT C2.ID As ID,  C2.category_name AS category, C1.category_name AS parentCategory
            FROM `category` C1
            RIGHT JOIN `category` C2
            ON C1.ID = C2.parent_caregory;";


    // SELECT C2.ID As ID,  C2.category_name AS category, C1.category_name AS parentCategory
    // FROM `category` C1
    // RIGHT JOIN `category` C2
    // ON C1.ID = C2.parent_caregory;

    $stmt = $conn->prepare($sql);

    // Check if the prepare statement was successful
    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    // Execute the query
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Fetch all rows
    $rows = $result->fetch_all(MYSQLI_ASSOC);

    // Close the statement and connection
    $stmt->close();
    $conn->close();

    return $rows;
}


function getAllCat()
{
    $conn = dbConnect();
    $sql = "SELECT * from category ORDER BY ID ASC ";
    $result = $conn->query($sql);
    $conn->close();
    return  $result;
};

function getAllParentCat()
{
    
    $conn = dbConnect();
    $sql = "SELECT * FROM `category` WHERE `parent_caregory` IS NULL";
    $result = $conn->query($sql); 
    $conn->close();
    return  $result;
};

function getHomeCat()
{
    $conn = dbConnect();
    $sql = "SELECT * FROM `category` limit 4";
    $result = $conn->query($sql);
    $conn->close();
    return  $result;
};

function getOneCat($id)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM category WHERE ID = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $conn->close();
    return  $row;
}

function deleteCat($ID)
{
    $conn = dbConnect();
    $sql = "DELETE FROM category WHERE ID = $ID";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
};

function updateCat($ID, $category_name, $parent_caregory)
{
    $conn = dbConnect();

    if ($parent_caregory == 'null') {
        $parentCategoryId = null;
    } else {
        $sql = "SELECT ID FROM category WHERE category_name = '$parent_caregory'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $parentCategoryId = $row['ID'];
    }


    $sql = " UPDATE category SET category_name = '$category_name', parent_caregory = '$parentCategoryId' WHERE ID = $ID";
    $result = $conn->query($sql);
    $conn->close();
    return  $result;
};
