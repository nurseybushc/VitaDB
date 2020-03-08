<?php    
    //require_once('config.php');

    function OpenCon() {
        //$conn = new mysqli($servername, $username, $password, $dbname) or die("Connect failed: %s\n". $conn -> error); 
        //$conn = new mysqli($_ENV["SERVER"], $_ENV["USERNAME"], $_ENV["PASS"], $_ENV["DB_NAME"], $_ENV["PORT"]) or die("Connect failed: %s\n". $conn -> error); 
        fwrite(STDERR, "Connect failed: %s, SERVER=%s, USERNAME=%s, PASS=%s, DB_NAME=%s\n". $conn -> error. $_ENV["SERVER"]. $_ENV["USERNAME"]. $_ENV["PASS"]. $_ENV["DB_NAME"]);

        $conn = new mysqli($_ENV["SERVER"], $_ENV["USERNAME"], $_ENV["PASS"], $_ENV["DB_NAME"]) or die("Connect failed: %s, SERVER=%s, USERNAME=%s, PASS=%s, DB_NAME=%s\n". $conn -> error. $_ENV["SERVER"]. $_ENV["USERNAME"]. $_ENV["PASS"]. $_ENV["DB_NAME"]);
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