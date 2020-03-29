<?php    
    include './config.php';
	include './constants_sql.php';

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

    function SelectQuery($queryName, $paramTypes = array(), $paramVals = array()){
        $type = "SELECT";
        $queryString = GetQueryString($type,$queryName);
        
        $con = OpenCon();
        $stmt = PrepareQuery($con, $queryString, $paramTypes, $paramVals);
        $stmt -> execute();
        $result = $stmt -> get_result();

        if(!$result || $result -> num_rows == 0){
            return array();
        }

        $rows = $result -> fetch_all(MYSQLI_ASSOC);
        CloseCon($con);

        return $rows;
    }
    
    function PrepareQuery($con, $queryString, $paramTypes, $paramVals){
        $stmt = $con -> prepare($queryString);
        for ($i = 0; $i < count($paramVals); ++$i) {
            $stmt -> bind_param($paramTypes[$paramVals[$i]], $paramVals[$i]);
        }
        return $stmt;
    }

    function GetQueryString($type,$queryName){
        $queryString = "";
        switch($type)
        {
            case "SELECT":
                $stmt_map = GetStatementSelect();
                $queryString = $stmt_map[$queryName];
                break;
        }
        
        return $queryString;
    }
?>