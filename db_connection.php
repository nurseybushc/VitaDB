<?php    
    require_once('config.php');

    function OpenCon() {
        $conn = new mysqli($servername, $username, $password, $dbname) or die("Connect failed: %s\n". $conn -> error); 
        return $conn;
    }
    
    function CloseCon($conn) {
        $conn -> close();
    }

    function SelectQuery($queryString){
        $con = OpenCon();
        $result = mysqli_query($con,$queryString);
        CloseCon($con);
        if(!$result || $result->num_rows == 0){
            return array();
        }
        $rows = mysqli_fetch_all(MYSQLI_ASSOC);
        return $rows;
    }
?>