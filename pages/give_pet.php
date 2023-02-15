<?php
// connect to database
include 'connect.php';
// start a session
session_start();

// This post variable is not used as ajax is not used for giving pets, just leave this alone until you figure out how to make it work right with ajax
if (isset($_POST['uid'])) {

    // Update the pet table
    // $sql = "UPDATE pet SET status = 'pending', given_to = ? WHERE petID = ?";
    // $stmt = $conn->prepare($sql);
    // $stmt->bind_param("ii", $_SESSION['last_contacted'], $_SESSION['petID']);
    // $stmt->execute();



    // the sql query string below only displays pets that are not pending, thus, still posted
    //    $sql = "SELECT petID, name FROM pet WHERE userID = " . $_SESSION['userID'] . " AND status = 'posted' ORDER BY name";
    //    $stmt = $conn->prepare($sql);
    //    $stmt->execute();
    //    $result = $stmt->get_result();
    //    $all_posted = $result->fetch_all(MYSQLI_ASSOC);
    //    echo  json_encode($all_posted);


    // echo $_SESSION['last_contacted'] . " " . $_SESSION['petID'];
}


if (isset($_GET['pet_user']) && isset($_GET['petID'])) {
    define("userID", $_GET['pet_user']);
    define("petID", $_GET['petID']);
    $userID = userID;
    $petID = petID;
?>
    <script>
        // if (confirm("Are you sure you want to give " + <?php //echo petID; 
                                                            ?>)) {

        <?php
        // i have tried to echo this confirm already, it does not work still
        echo "if (confirm('Are you sure you want to give '" . $petID .  ")){";
        // Update the pet table
        $sql = "UPDATE pet SET status = 'pending', given_to = ? WHERE petID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userID, $petID);
        $stmt->execute();
        echo "}";
        ?>

        // }
    </script>
<?php
}
?>

<script>
    // go back to the chat_box with the same userID
    window.location.href = "chat_box.php?pet_user=<?php echo $userID ?>";
</script>

<?php
$conn->close();

?>