<?php 
if(isset($_POST['adduser'])){

 	//mysql credentials
    require_once('DBInfo.php');

    //Open a new connection to the MySQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    $uid = filter_var($_POST["userID"]);
    $pass = filter_var($_POST["password"]);
    $intrand = rand(100000,199999);
    $defaultStyle = "Default";

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   

    $statement = $mysqli->prepare("INSERT INTO users (UserID, UserName, Password, UserType) VALUES ?,?,?,?)"); 

    //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)

    $statement->bind_param('isss', $intrand, $uid, $pass, $defaultStyle); //bind values and execute insert query
    
    if($statement->execute()){
       require_once('getpatientinfo.php');
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>