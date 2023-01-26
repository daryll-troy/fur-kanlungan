<?php

include "../../pages/connect.php";

if(isset($_POST['user_categ'])){
    $sql = "SELECT * FROM  pets_owned";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $user_cat_res = $result->fetch_all(MYSQLI_ASSOC);
    echo  json_encode($user_cat_res);
}

// close connection
$conn->close();
