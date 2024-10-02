<?php include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login.php");
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
            <h1>สมัครสมาชิก</h1>
            <form action="add_member.php" method="post" enctype="multipart/form-data">
                <label for="">Username : </label><input type="text" name="username" required><br>
                <label for="">Password : </label><input type="password" name="password" required><br>
                <label for="">Name : </label><input type="text" name="name" required><br>
                <label for="">Address : </label><input type="text" name="address"><br>
                <label for="">Mobile : </label><input type="text" name="mobile"><br>
                <label for="">Email :</label><input type="email" name="email"><br>
                <label for="">Profile :</label><input type="file" name="profile" required><br>
                <button type="submit" class="edit-bt">ยืนยัน</button>
            </form>
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