
<!doctype html> 
<html lang="en"> 
<head> 
<!-- Required meta tags --> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Bootstrap CSS --> 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
<title>:: Store ::</title>
</head> 
<body> 
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(0,0,0,0.5); color: white;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto" style="font-size: 30px"><i class="fas fa-store"></i> ร้านค้า</p>
</div>
</div>

<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto" style="font-size: 18px"><i class="fas fa-user"></i> <?php $user = $_SESSION['user']; if(isset($_SESSION['user'])){ echo "กำลังเข้าสู่ระบบในชื่อ $user"; } else { ?> ไม่ได้เข้าสู่ระบบ โปรดเข้าสู่ระบบ<p><button class="btn btn-success" onclick="window.location.href='?page=home'"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ </button><?php } ?><p>
<?php if(isset($_SESSION['user'])) { ?>
<button onclick="window.location.href='?page=logout'" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i> ออกจากระบบ</button>
<?php } else { } ?>
</p>
</p>
</div>
</div>

<div class="card mt-2 mx-auto" style="border-radius: 30px; background: rgba(255,255,255,0.4); color: white;">
<div class="card-body">
<div class="table-responsive">
<table class="table table-borderless">
    <thead>
      <tr>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <p class="text-center mt-2 mx-auto">
   <div class="block text-center">
  
  <p class="top text-center" style="font-size: 30px; color: black;">
      <i class="fas fa-shopping-bag"></i> สินค้าทั่วไป
  </p>
<?php
$user = $_SESSION['user'];
$query = "SELECT * FROM `item` WHERE `category` = 'normalitem'";

if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
<td>
  <div class="middle col-md-8">

  <img class="center" src="<?php echo $row['image']; ?>" style="width: 150px; height: 150px;" alt="pic" />
  </div>
  <form action="" method="post">
  <div class="bottom">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="heading"><i class="fas fa-tags"></i> <?php echo $row['name']; ?></div>
    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
    <div class="price"><i class="fas fa-boxes"></i> จำนวนสินค้า : <?php echo $row['amount']; ?> ชิ้น</div>
<input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
    <div class="price"><i class="fas fa-money-bill-alt"></i> ราคา : <?php echo $row['price']; ?> พอยท์</div>
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
  </div>
<?php if(isset($_SESSION['user'])) { ?>
  <button type="submit" name="buy" class="btn btn-success mt-2"><i class="fas fa-shopping-cart"></i> ซื้อสินค้า</button> 
<?php } else { ?>
<button type="button" name="buy" class="btn btn-danger mt-2 disabled"><i class="fas fa-times"></i> ไม่สามารถซื้อได้</button> 
<?php } ?>
</div>
</form>
  </p>
       </td>
  <?php }} $count = $result->rowCount(); if ($count<1) { echo '<div class="middle">
    <p class="text-red">ไม่มีสินค้าในขณะนี้!</p>
  </div>'; } ?>
      </tr>
      
    </tbody>
  </table>
</div>
</div>
</div>

<div class="card mt-2 mx-auto" style="border-radius: 30px; background: rgba(255,255,255,0.4); color: white;">
<div class="card-body">
<div class="table-responsive">
<table class="table table-borderless">
    <thead>
      <tr>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <p class="text-center mt-2 mx-auto">
   <div class="block text-center">
  
  <p class="top text-center" style="font-size: 30px; color: black;">
  <i class="fas fa-crown"></i> แรงค์
  </p>
<?php
$user = $_SESSION['user'];
$query = "SELECT * FROM `item` WHERE `category` = 'rank'";

if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
<td>
  <div class="middle col-md-8">
    <img class="center" src="<?php echo $row['image']; ?>" style="width: 150px; height: 150px;" alt="pic" />
  </div>
  <form action="" method="post">
  <div class="bottom">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="heading"><i class="fas fa-tags"></i> <?php echo $row['name']; ?></div>
    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
    <div class="price"><i class="fas fa-boxes"></i> จำนวนสินค้า : <?php echo $row['amount']; ?> ชิ้น</div>
<input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
    <div class="price"><i class="fas fa-money-bill-alt"></i> ราคา : <?php echo $row['price']; ?> พอยท์</div>
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
  </div>
 <?php if(isset($_SESSION['user'])) { ?>
  <button type="submit" name="buy" class="btn btn-success mt-2"><i class="fas fa-shopping-cart"></i> ซื้อสินค้า</button> 
<?php } else { ?>
<button type="button" name="buy" class="btn btn-danger mt-2 disabled"><i class="fas fa-times"></i> ไม่สามารถซื้อได้</button> 
<?php } ?> 
</div>
</form>
  </p>
       </td>
       <?php }} $count = $result->rowCount(); if ($count<1) { echo '<div class="middle">
    <p class="text-red">ไม่มีสินค้าในขณะนี้!</p>
  </div>'; } ?>
      </tr>
      
    </tbody>
  </table>
</div>
</div>
</div>

<div class="card mt-2 mx-auto" style="border-radius: 30px; background: rgba(255,255,255,0.4); color: white;">
<div class="card-body">
<div class="table-responsive">
<table class="table table-borderless">
    <thead>
      <tr>
        
      </tr>
    </thead>
    <tbody>
      <tr>
      <p class="text-center mt-2 mx-auto">
   <div class="block text-center">
  
  <p class="top text-center" style="font-size: 30px; color: black;">
    <i class="fas fa-coins"></i> เงิน
  </p>
<?php
$user = $_SESSION['user'];
$query = "SELECT * FROM `item` WHERE `category` = 'money'";

if ($result = query($query)) {
    while ($row = $result->fetch()) {
        ?>
<td>
        
 
  <div class="middle col-md-8">
  <img class="center" src="<?php echo $row['image']; ?>" style="width: 150px; height: 150px;" alt="pic" />
  </div>
  <form action="" method="post">
  <div class="bottom">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="heading"><i class="fas fa-tags"></i> <?php echo $row['name']; ?></div>
    <input type="hidden" name="name" value="<?php echo $row['name']; ?>">
    <div class="price"><i class="fas fa-boxes"></i> จำนวนสินค้า : <?php echo $row['amount']; ?> ชิ้น</div>
<input type="hidden" name="amount" value="<?php echo $row['amount']; ?>">
    <div class="price"><i class="fas fa-money-bill-alt"></i> ราคา : <?php echo $row['price']; ?> พอยท์</div>
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
  </div>
 <?php if(isset($_SESSION['user'])) { ?>
  <button type="submit" name="buy" class="btn btn-success mt-2"><i class="fas fa-shopping-cart"></i> ซื้อสินค้า</button> 
<?php } else { ?>
<button type="button" name="buy" class="btn btn-danger mt-2 disabled"><i class="fas fa-times"></i> ไม่สามารถซื้อได้</button> 
<?php } ?>
</div>
</form>
  </p>
</td>
  
<?php 
  }} $count = $result->rowCount(); if ($count<1) { echo '<div class="middle">
    <p class="text-red">ไม่มีสินค้าในขณะนี้!</p>
  </div>'; }  ?>
      </tr>
      
    </tbody>
  </table>
</div>
</div>
</div>

</div>
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<style>

.block {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
}
.top {
  border-bottom: 1px solid #e5e5e5;
  
}
.top ul {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
}

.middle {
 margin-bottom: 40px;
}

.bottom {
  text-align: center;
  font-size: 14px;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
      -ms-flex-direction: column;
          flex-direction: column;
  -webkit-box-pack: justify;
      -ms-flex-pack: justify;
          justify-content: space-between;
  -webkit-box-flex: 1;
      -ms-flex-positive: 1;
          flex-grow: 1;
}
.heading {
  font-size: 17px;
  text-transform: uppercase;
  margin-bottom: 5px;
  letter-spacing: 0;
}
.amount {
  font-size: 14px;
  color: #969696;
  
}


</style>
<?php if(isset($_POST['buy'])) {
$id = $_POST['id'];
$_SESSION['id'] = $_POST['id'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['price'] = $_POST['price'];
$_SESSION['amount'] = $_POST['amount'];
rdr('?page=wallet&id='.$id.'');
}
?>
</body> 
</html>

