<?php

class Crud {

    protected function connect() {
        $servername = "localhost";
        $username = "root";
        $password = "Educom01";
        $dbname = "myDB";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } return $conn; // ik weet dat ik dit eruit wil krijgen. 
    }

    public function create($queryinput) {
        $conn = $this ->connect();
        $sql = $queryinput; // mijn databases bestaan nog dus dit heeft geen prio op het moment
        $createBool = $conn->query($sql) ;
        return $createBool; 
    }

    public function readVariable($queryinput) { 
        $conn = $this -> connect();
        $sql = $queryinput; 
        $readQuery = mysqli_query($conn, $sql);
        $queryresult = mysqli_fetch_assoc($readQuery);// krijg nu foutmelding indien er niks terugkomt, nog catch voor maken. 
        return $queryresult;
        
    
    }        
    
   /* public function compareOneVar($table, $column, $variable, $limiet) {
        $conn = $this->connect();
        $sql = "Select * from $table where $column = '$variable' LIMIT $limiet";
        $readquery = mysqli_query($conn, $sql);
        $queryresult = mysqli_fetch_assoc($readquery);
        var_dump($queryresult);
        return $queryresult;
    }*/ 

    /*public function compareTwoVar($table, $column1, $variable1, $column2, $variable2) {
        $conn = $this->connect();
        $sql = "SELECT * from $table WHERE $column1 = '$variable1' AND $column2 = '$variable2' limit 1 ";
        $readquery = mysqli_query($conn, $sql);
        var_dump($readquery);
        $queryresult = mysqli_fetch_assoc($readquery);
        return $queryresult;
    }

    public function getAllEntriesFromTable($table) {
        $conn = $this->connect();
        $sql = "SELECT *  FROM $table";
        $result = mysqli_query($conn, $sql);
        return $result;
    }*/
    
    public function Update($queryinput){
            $conn= $this->connect(); 
            $sql= $queryinput; 
            if (mysqli_query($conn, $sql)) {
            $createstatus = True;
        } else {
            $createstatus = False;
        }
    return $createstatus;
    
        }

   /* public function update($table, $column1, $column2, $column3, $variable1, $variable2, $variable3) {
        $conn = $this->connect();
        $sql = "INSERT INTO $table ($column1, $column2, $column3)
	VALUES ('$variable1', '$variable2', '$variable3')";
        if (mysqli_query($conn, $sql)) {
            $createstatus = True;
        } else {
            $createstatus = False;
        }
        return $createstatus;
    }*/

}
