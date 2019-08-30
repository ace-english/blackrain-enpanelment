<?php
error_reporting(E_ALL);
error_reporting(1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

    //mysql credentials
    require_once('DBInfo.php');

    $pid = rand(200000,999999);
    $f_name = filter_var($_POST["Fname"]);
    $m_name = filter_var($_POST["Mname"]);
    $l_name = filter_var($_POST["Lname"]);
    $date = filter_var($_POST["DOB"]);
    $u_genders= filter_var($_POST["Gender"]);
    $lang = filter_var($_POST["Language"]);
    $u_race = filter_var($_POST["Race"]);
    $ethnic = filter_var($_POST["Ethnicity"]);
    $u_sex = filter_var($_POST["Sex"]);
    $statementTwo = '';

    //Open a new connection to the MySQL server
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   

    $query = "SELECT ProviderID, provider.FacilityID, Fname, FacilityName FROM health.provider inner join facility where provider.FacilityID = facility.FacilityID";
    $responce = @mysqli_query($dbc, $query);
    
    while($row = mysqli_fetch_array($responce)){
    $int= mt_rand(1262055681,1262055681);
    $phpVisitCount = mt_rand(0,30);
    $phpDate = date("Y-m-d H:i:s",$int);

    $statementTwo = $mysqli->prepare("INSERT INTO empanelment (ProviderID, ProviderName, FailityID, PatientName, PatientID,
        VisitCount) VALUES (?, ?, ?,
        ?,?,?)");

    $statementTwo->bind_param('isisii', $row['ProviderID'], $row['Fname'], $row['FacilityID'], $f_name, $pid,$phpVisitCount);

    $mysqli->execute(statementTwo);
    }

    $statement = $mysqli->prepare("INSERT INTO patient (PatientID, Fname, Mname,
        Lname, DOB, Gender, Sex, Language, Race, Ethnicity) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?)");

    //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)   
    $statement->bind_param('isssssssss', $pid, $f_name, $m_name, $l_name, $date, $u_genders, $u_sex, $lang, $u_race, $ethnic); //bind values and execute insert query

    if($statementTwo){
            if($statement->execute()){
            require_once('getpatientinfo.php');
        }
    }
    else{
        print $mysqli->error; //show mysql error if any
    }
}
?>