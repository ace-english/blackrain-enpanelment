<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    require_once('DBInfo.php');
    

    $providernum = rand(100000,199999);
    $npinum = filter_var($_POST["npinum"]);
    $f_name = filter_var($_POST["Fname"]);
    $m_name = filter_var($_POST["Mname"]);
    $l_name = filter_var($_POST["Lname"]);
    $type = filter_var($_POST["designiation"]);


    //Open a new connection to the MySQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   
    
    $statement = $mysqli->prepare("INSERT INTO provider ( ProviderID, Fname, Mname,
        Lname, NpiNumber, Designiation) VALUES (?, ?, ?, ?,
        ?, ?)"); 

        //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)

    
    $statement->bind_param('isssis', $providernum,$f_name, $m_name, $l_name, $npinum, $type); //bind values and execute insert query
    
    if($statement->execute()){
       require_once('getproviderinfo.php');
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>