<?php include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
    header("location: login.php");
}
?>

<?php
$stmt = $pdo->prepare("UPDATE member SET username=?, password=?, name=?, address=?, mobile=?, email=?, profile=? WHERE username = ?");
$stmt->bindParam(1, $_POST["username"]);
$stmt->bindParam(2, $_POST["password"]);
$stmt->bindParam(3, $_POST["name"]);
$stmt->bindParam(4, $_POST["address"]);
$stmt->bindParam(5, $_POST["mobile"]);
$stmt->bindParam(6, $_POST["email"]);
$Profile = file_get_contents($_FILES['profile']['tmp_name']);
$stmt->bindParam(7, $Profile, PDO::PARAM_LOB);
$stmt->bindParam(8, $_POST["username"]);

if ($stmt->execute()) {
    header("location: all_member.php");
}
?>
<!doctype html>
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
        <div class="login-box">
            <?php
            echo "<a ";
            if (empty($_SESSION["username"])) {
                echo "href='login.php'> login";
            } else {
                echo "href='logout.php'>" . $_SESSION["username"];
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
            <h1><?php echo $msg ?></h1>
            <?php
            echo "<a href='all_member.php'>กลับสู่หน้าสมาชิกทั้งหมด</a>"
            ?>
        </article>
        <nav id="menu">
            <h2>เมนู</h2>
            <ul class="menu">
                <li><a href="all_product.php">สินค้าทั้งหมด</a></li>

                <?php if (!empty($_SESSION["username"])): ?>
                    <li><a href="table_of_all_product.php">ตารางสินค้าทั้งหมด</a></li>
                    <li><a href="edit_member.php">แก้ไขโปรไฟล์</a></li>
                    <li><a href="logout.php">ออกจากระบบ</a></li>
                <?php else: ?>
                    <li><a href="mpage.php">เข้าสู่ระบบ</a></li>
                    <li><a href="add_member_from.php">สมัครสมาชิก</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <aside>
            <h2>เมนูเพิ่มเติม</h2>
            <?php if ($_SESSION["isAdmin"] == 1): ?>
                <li><a href="all_member.php">สมาชิกทั้งหมด</a></li>
                <li><a href="add_product.php">เพิ่มสินค้า</a></li>
                <li><a href="edit_product.php">แก้ไขสินค้า</a></li>
                <li><a href="edit_member.php">แก้ไขโปรไฟล์</a></li>
            <?php endif; ?>
        </aside>
    </main>
    <footer>
        <a href="#">Sitemap</a>
        <a href="#">Contact</a>
        <a href="#">Privacy</a>
    </footer>
</body>

</html>