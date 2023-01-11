<?php

// connect db
include "connect.php";
echo "Hellow OW";
// execute when ajax is activated
    // if(isset($_POST['petID'])){
        $sql = "
        DELETE  FROM pet_photo WHERE petID = ?;
        INSERT INTO deledopted SELECT * FROM pet WHERE petID = ?;
        DELETE  FROM pet WHERE petID = ?;
        ";
        $result = $conn->prepare($sql);
        $result->bind_param("iii", $_POST['petID'], $_POST['petID'], $_POST['petID']);
        try{
            $result->execute();
            // echo "<script>window.location.href = 'my_pets.php'</script>";
        }catch(Exception $result){
            echo "
            <script>alert(" . $conn->error . ");</script> ";
        }
       
    // }
  $conn->close();  
?>