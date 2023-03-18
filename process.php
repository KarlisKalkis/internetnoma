<?php 
require_once('config/dbcon.php');
?>

<?php 

if (isset($_POST)) {
    $email          = $_POST['email'];
    $firstname      = $_POST['firstname'];
    $lastname       = $_POST['lastname'];
    $phonenumber    = $_POST['phonenumber'];
    $password       = sha1($_POST['password']);

   $sql = "INSERT INTO users (email, firstname, lastname, phonenumber, password ) VAlUES(?,?,?,?,?)";
   $stmtinsert = $db->prepare($sql);
   $result = $stmtinsert->execute([$email, $firstname, $lastname, $phonenumber, $password]);
   
}else{
    echo 'No data';
}