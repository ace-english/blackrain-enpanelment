<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    require_once('DBInfo.php');
    

    $pid = rand(200000,999999);
    $f_name = filter_var($_POST["Fname"]);
    $m_name = filter_var($_POST["Mname"]);
    $l_name = filter_var($_POST["Lname"]);
    $date = filter_var($_POST["DOB"]);
    $u_genders= filter_var($_POST["Gender"]);
    $lang = filter_var($_POST["Sex"]);
    $u_race = filter_var($_POST["Language"]);
    $ethnic = filter_var($_POST["Race"]);
    $u_sex = filter_var($_POST["Ethnicity"]);

    //Open a new connection to the MySQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   
    
    $statement = $mysqli->prepare("INSERT INTO patient (PatientID, Fname, Mname,
        Lname, DOB, Gender, Sex, Language, Race, Ethnicity) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?)"); 

        //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)

    
    $statement->bind_param('isssssssss', $pid, $f_name, $m_name, $l_name, $date, $u_genders, $u_sex, $lang, $u_race, $ethnic); //bind values and execute insert query
    
    if($statement->execute()){
       require_once('getpatientinfo.php');
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>