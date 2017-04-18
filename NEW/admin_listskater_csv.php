<?php
session_start();
include 'connectdb.php';


$badness = 0;
if ($_SESSION["admin_email"] == "" || $_SESSION["rink"] == "" || $_SESSION["password"] == "") {
	$badness = 1;
} else
{

	$stmt = $db->prepare("SELECT * FROM Rinks WHERE Rink_ID = :rink  AND POC_email = :admin_email AND POC_password = :password");
	$stmt->bindValue(':rink', $_SESSION["rink"], PDO::PARAM_STR);
	$stmt->bindValue(':admin_email', $_SESSION["admin_email"], PDO::PARAM_STR);
	$stmt->bindValue(':password', $_SESSION["password"], PDO::PARAM_STR);
	$stmt->execute();
	if ($stmt->rowCount() == 0 ){
		$badness = 1;
	}	
}

if ($badness == 0) {	
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');

	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');

	// output the column headings
	fputcsv($output, array('Family Name', 'First Name', 'Member Nr', 'Last Renewed', 'Gender', 'DOB', 'Pay Ref', 'email Guardian', 'email Member', 'Phone'));
	

	$sql = "SELECT Family_Name, First_Name, Member_Nr, Date_Last_Renewed, Gender, DOB, Paypal_Ref, email_Guardian, email_Member, Phone FROM Members where Rink_ID = '" . $_SESSION["rink"] . "' ORDER BY Family_Name, First_Name";

	foreach ( $db->query($sql)->fetchall(PDO::FETCH_ASSOC) as $row) {
		fputcsv($output, $row);

    }
}      

?>