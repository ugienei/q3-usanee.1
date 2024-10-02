<?php include "connect.php";
session_start();
// ตรวจสอบว่ามีชื่อใน session หรือไม่ หากไม่มีให้ไปหน้า login อัตโนมัติ
if (empty($_SESSION["username"])) {
  header("location: login.php");
}
?>
<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
$stmt->bindParam(1, $_GET["username"]);
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
      <h1>ข้อมูลสมาชิกของ <?= $row["name"] ?></h1>
      <form action="edit_member.php" method="post" enctype="multipart/form-data">
        <?php if (!empty($row["profile"])) {
          $Profile = base64_encode($row["profile"]);
          echo "<img src='data:image/jpeg;base64," . $Profile . "' width='100'<br>";
        } else {
          echo "<p> No image available.</p><br>";
        }
        ?>
        <label for="">New Profile :</label><input type="file" name="profile"><br>
        <label for="">Username : </label><input type="text" name="username" value="<?= $row["username"] ?>"><br>
        <label for="">Password : </label><input type="text" name="password" value="<?= $row["password"] ?>"><br>
        <label for="">Name : </label><input type="text" name="name" value="<?= $row["name"] ?>"><br>
        <label for="">Address : </label><input type="text" name="address" value="<?= $row["address"] ?>"><br>
        <label for="">Mobile : </label><input type="text" name="mobile" value="<?= $row["mobile"] ?>"><br>
        <label for="">Email :</label><input type="email" name="email" value="<?= $row["email"] ?>"><br>
        <button type="submit" class="edit-bt">ยืนยันการแก้ไข</button>
        <a href="all_member.php" class="cancel">ยกเลิก</a>
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