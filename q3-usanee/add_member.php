<?php include "connect.php" ?>
<?php
$stmt = $pdo->prepare("INSERT INTO member (username,password,name,address,mobile,email,profile,isAdmin) VALUES (?, ?, ?, ?, ?, ?, ?,0)");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$Profile = file_get_contents($_FILES['Profile']['tmp_name']);
$stmt->bindParam(7,$Profile,PDO::PARAM_LOB);

$username = $_POST["username"];

if($stmt->execute()){
    header("location: detail_member.php?username=" . $username);
}
?>