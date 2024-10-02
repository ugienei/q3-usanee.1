<?php include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"]) || $_SESSION["admin"] != 1) {
    header("Location: login.php");
    exit();
}
?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="mcss.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
</head>

<body>

    <header>
        <div class="logo">
            <img src="cslogo.jpg" width="200" alt="Site Logo">
        </div>
        <div class="search">
            <form>
                <input type="search" placeholder="Search the site...">
                <button>Search</button>
            </form>
        </div>
    </header>

    <div class="mobile_bar">
        <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
        <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
        <article>
            <h1>รายละเอียดสมาชิก</h1>
            <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            while ($row = $stmt->fetch()) {
                echo "<a href='detail_member.php?username=" . $row["username"] . "'>";
                if (!empty($row["profile"])) {
                    $Profile = base64_encode($row["profile"]);
                    echo "<img src='data:image/jpeg;base64," . $Profile . "' width='100'><br>";
                } else {
                    echo "No image available.<br>";
                }
                echo "</a>";
                echo "<label>ชื่อสมาชิก: " . $row["name"] . "</label><br>";
                echo "<label>ที่อยู่: " . $row["address"] . "</label><br>";
                echo "<label>อีเมล์: " . $row["email"] . "</label><br>";
                echo "<a href='Edit_Member_form.php?username=" . $row["username"] . "'>แก้ไข</a>";
                echo "<a href='#' onclick=\"confirm_delete_member('{$row["username"]}')\">ลบ</a>";
                echo "</div>";
                echo "<hr>\n";
            }
            ?>
        </article>

        <nav id="menu">
            <h2>เมนู</h2>
            <ul class="menu">
                <li><a href="all_product.php">สินค้าทั้งหมด</a></li>
                <li><a href="table_of_all_product.php">ตารางสินค้าทั้งหมด</a></li>
                <li><a href="edit_member.php">แก้ไขโปรไฟล์</a></li>
                <li><a href="all_member.php">สมาชิกทั้งหมด</a></li>
                <li><a href="add_product.php">เพิ่มสินค้า</a></li>
                <li><a href="edit_product.php">แก้ไขสินค้า</a></li>
                <li><a href="edit_member.php">แก้ไขโปรไฟล์</a></li>
                <li><a href="logout.php">ออกจากระบบ</a></li>
        </nav>
    </main>

    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>
</body>

</html>