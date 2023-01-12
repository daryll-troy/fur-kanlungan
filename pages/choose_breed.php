<?php

class DbConnect
{
    private $host = 'localhost';
    private $dbName = 'fur-kanlungan';
    private $user = 'root';
    private $pass = '';

    public function connect()
    {
        try {
            $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo 'Database Error: ' . $e->getMessage();
        }
    }
}
if (isset($_POST['pc'])) {


    $db = new DbConnect;
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT bc.breed from breed_category AS bc
                            INNER JOIN pet_category AS pc ON pc.pcID = bc.pcID
                            WHERE pc.animal_type = '" . $_POST['pc'] . "' ORDER BY bc.breed");
    $stmt->execute();
    $breeds = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($breeds);
}



// close connection
$conn = null;
