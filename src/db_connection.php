<?php    
    include './config.php';

    function OpenCon() {
        $conn = new mysqli(getenv('SERVER'), getenv('USERNAME'), getenv('PASS'), getenv('DB_NAME')) or die("Connect failed: %s, SERVER=%s, USERNAME=%s, PASS=%s". $conn->error. $host. $user. $pass);
        if ($conn -> connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        return $conn;
    }
    
    function CloseCon($conn) {
        $conn -> close();
    }

    function SelectQuery($queryString){
        $con = OpenCon();
        $result = $con -> query($queryString);

        if(!$result || $result -> num_rows == 0){
            return array();
        }

        $rows = $result -> fetch_all(MYSQLI_ASSOC);
        CloseCon($con);

        return $rows;
    }
?>