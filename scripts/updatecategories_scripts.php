<?php
require_once 'model/category_model.php';

$ID = $name = $parentcategory  = "";
$nameErr = $parentcategoryErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $ID = $_POST["ID"];

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Category Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if lastname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z]{1,50}$/", $name)) {
            $nameErr = "Only letters allowed, not more than 50 characters, not less than 1 characters";
        }
    }



    // Validate name
    if (empty($_POST["parentcategory"])) {
        $parentcategoryErr = "Title is required";
    } else {
        $parentcategory = test_input($_POST["parentcategory"]);
        // Check if title is within the specified length
        if (strlen($parentcategory) < 1 || strlen($parentcategory) > 50) {
            $parentcategoryErr = "Parent Category Title should be between 1 and 50 characters";
        }
    }

    if (

        empty($nameErr) &&
        empty($parentcategoryErr)
    ) {
        createCat();
        header('location:categories.php');
    }
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['category'];
    $category = getOneCat($id);
    $allCategories =  getAllCat();
    $ID = $category['ID'];
    $name =  $category['category_name'];
    $parentcategory = $category['parent_caregory'];
}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
