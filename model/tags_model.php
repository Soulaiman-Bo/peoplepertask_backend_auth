<?php


require_once "config/dbConnect.php";


// CREATE TABLE `tags_projects` (
//     tags int,
//     project int,
//     FOREIGN KEY (tags) REFERENCES tags(ID) ON UPDATE CASCADE ON DELETE CASCADE,
//     FOREIGN KEY (project) REFERENCES projets(ID) ON UPDATE CASCADE ON DELETE CASCADE
// );



// START TRANSACTION;

// INSERT INTO tags(tag) VALUES ('CSS');

// SET @lastTagID := LAST_INSERT_ID();


// INSERT INTO `projets`(`title`, `Description`, `user_id`, `minprice`, `maxprice`, `hours`, `duration`, `experince`, `country`, `category_id`) 
// VALUES ('create a html website','i aneed before tomorow', 7, 10, 15, 40, 15, 'advanced','France', 1);
// SET @lastProjectID := LAST_INSERT_ID();

// INSERT INTO tags_projects (tags, project) VALUES (@lastTagID , @lastProjectID);


// COMMIT;



function createtag()
{

    // extract($_POST);
    // $conn = dbConnect();

    // $parentCategoryId;

    // if ($parentcategory == 'null') {
    //     $parentcategory = NULL;
    // }

    // // else {
    // //     $sql = "SELECT ID FROM category WHERE category_name = '$parentcategory'";
    // //     $result = $conn->query($sql);
    // //     $row = $result->fetch_assoc();
    // //     $parentCategoryId = $row['ID'];
    // // }




    // $sql = "INSERT INTO category (category_name, parent_caregory) VALUES ('$name', '$parentcategory')";
    // $result = $conn->query($sql);
    // $conn->close();
    // return  $result;

    extract($_POST);
};
