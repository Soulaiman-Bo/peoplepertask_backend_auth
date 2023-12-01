<?php 
$ID = $name = $parentcategory  = "";
$nameErr = $parentcategoryErr = "";

require_once 'model/category_model.php';
$allCategories =  getAllCat();


 
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate name
    if (empty($_POST["name"])) {
        $nameErr = "Category Name is required";
    } else {
        $name = test_input($_POST["name"]);
        // Check if lastname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z0-9\s]{1,50}$/", $name)) {
            $nameErr = "Only letters, numbers, and spaces allowed, not more than 50 characters, not less than 1 character";
        }        
    }



    // Validate name
    //  if (empty($_POST["parentcategory"])) {
    //     $parentcategoryErr = "Title is required";
    // } else {
    //     $parentcategory = test_input($_POST["parentcategory"]);
    //     // Check if title is within the specified length
    //     if (strlen($parentcategory) < 1 || strlen($parentcategory) > 50) {
    //         $parentcategoryErr = "Parent Category Title should be between 1 and 50 characters";
    //     }
    // }


    if (

        empty($nameErr) &&
        empty($parentcategoryErr)
    ) {
        createCat();
        header('location:categories.php');
    }
}

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
