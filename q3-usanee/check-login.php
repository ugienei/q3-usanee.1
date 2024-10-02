<?php
include "connect.php";
session_start();

$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ? AND password = ?");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->execute();
$row = $stmt->fetch();

if (!empty($row)) {

    $_SESSION["fullname"] = $row["name"];   
    $_SESSION["username"] = $row["username"];
    $_SESSION["isAdmin"] = $row["isAdmin"]; 

    header("Location: all_product.php");
    exit();
} else {

    echo "ไม่สำเร็จ ชื่อหรือรหัสผ่านไม่ถูกต้อง";
    echo "<a href='mpage.php'>เข้าสู่ระบบอีกครั้ง</a>"; 
}
?>
