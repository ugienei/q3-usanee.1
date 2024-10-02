<!doctype html>
<?php include "connect.php"; ?>
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
      <h1>เข้าสู่ระบบ</h1>
      <form action="check-login.php" method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" value="Login"><br>
        ยังไม่มีสมาชิก ? <a href="add_member.php">สมัครสมาชิก</a>
      </form>
      </p>
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