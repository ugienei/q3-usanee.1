<?php include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login.php");
}
?>
<?php
$stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
$stmt->bindParam(1, $_GET["pid"]);
$stmt->execute();
$row = $stmt->fetch();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="pagestyle.css" rel="stylesheet" type="text/css" />
    <script src="mpage.js"></script>
    <script src="product.js"></script>
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
        <div class="login-box">
            <?php
            echo "<a ";
            if (empty($_SESSION["username"])) {
                echo "href='login.php' class='login-bt'> login";
            } else {
                echo "href='logout.php' class='logout-bt'>" . $_SESSION["username"];
            }
            echo "</a>";
            ?>
        </div>
    </header>

    <div class="mobile_bar">
        <a href="#"><img src="responsive-demo-home.gif" alt="Home"></a>
        <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
        <article>
            <h1>รายละเอียดสินค้า</h1>
            <?php
            if (!empty($row["pd_img"])) {
                $imageData = base64_encode($row["pd_img"]);
                echo "<img src='data:image/jpeg;base64," . $imageData . "' width='100'><br>";
            } else {
                echo "<p>No image available.</p><br>";
            }
            ?>
            <?php
            echo "<label>รหัสสินค้า: </label>" . $row["pid"] . "<br>";
            echo "<label>ชื่อสินค้า: </label>" . $row["pname"] . "<br>";
            echo "<label style='height: 100px;'>รายละเอียดสินค้า: </label>" . $row["pdetail"] . "<br>";
            echo "<label>ราคา: </label>" . $row["price"] . "บาท<br>";
            echo "<a href='#' class='bt'>ซื้อสินค้า</a>";
            echo "<a href='all_product.php' class='bt'>ย้อนกลับ</a>";
            echo "<a href='edit_product_form.php?pid=" . $row["pid"] . "'>แก้ไข</a>";
            echo "<a href='#' onclick=\"confirm_delete_product('{$row["pid"]}')\">ลบ</a>";
            echo "</div>";
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