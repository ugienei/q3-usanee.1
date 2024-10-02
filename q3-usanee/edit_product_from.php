<?php include "connect.php";
session_start();
if (empty($_SESSION["username"]) || $_SESSION["admin"] != 1) {
  // หากไม่ใช่ admin จะถูกเปลี่ยนไปยังหน้า login
  header("Location: login.php");
  exit();
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
    <div class="login">
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
      <h1>แก้ไขรายละเอียดสินค้า</h1>
      <form action="edit_product.php" method="post" enctype="multipart/form-data">
        <?php
        if (!empty($row["pd_img"])) {
          $imageData = base64_encode($row["pd_img"]);
          echo "<img src='data:image/jpeg;base64," . $imageData . "' width='100'><br>";
        } else {
          echo "<p>No image available.</p><br>";
        }
        ?>
        <input type="hidden" name="pid" value="<?= $row["pid"] ?>">
        <label for=""">ชื่อสินค้า</label><br>
                <input type=" text" name="pname" required value="<?= $row["pname"] ?>"><br>
          <label for=""">รายละเอียดสินค้า</label><br>
                <textarea name=" pdetail" rows="3" cols="40" required><?= $row["pdetail"] ?></textarea><br>
            <label for=""">ราคาสินค้า</label><br>
                <input type=" number" name="price" required value="<?= $row["price"] ?>"><br>
              <label for=""">รูปภาพสินค้า</label><br>
                <input type=" file" accept=".jpg" name="product_img"><br>
                <div>
                  <button type="submit" name="submit" class="edit-bt">แก้ไขสินค้า</button>
                </div>
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