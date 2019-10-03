<?php
/*if (!$_SESSION['admin'] == 'true') {
    rdr('?page=index');
} else {
    //NoCode
}*/
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Backend</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
<?php if(!isset($_SESSION['admin'])){ ?>
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
<form action="" method="post">
      <p class="mt-2 mx-auto" style="text-align: center; font-size: 24px; color: black;"><i class="fas fa-user"></i> Sign In</p>
    <div>
      <label for="username"><b><i class="fas fa-user"></i> Username</b></label>
      <input type="text" placeholder="Username" name="username" id="username" required>
      <label for="password"><b><i class="fas fa-key"></i> Password</b></label>
      <input type="password" placeholder="Password" name="password" id="password" required>
      <button type="submit" name="auth" id="auth" style="border-radius:10px;"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
    </div>

      </div>
  </form>
</div>
</div>
<?php } else { ?>
  <body class="col-md-12 font mx-auto sm-auto mt-2">

    <div class="card mt-2" style="border-radius: 30px; background: rgba(0,0,0,0.5); color: white;">
        <img class="card-img-top"alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-home" aria-hidden="true"></i> จัดการหลังร้าน</h4>
            <p class="card-text text-center"><i class="fas fa-list-ul"></i> เครื่องมือ : <a href="?page=backend&additem=true">เพิ่มสินค้า</a> |
            <a href="?page=backend&listitem=true">รายการสินค้า</a> |
            </p>
        </div>
    </div>
    <?php if (isset($_GET['additem'])) {
    ?>
    <div class="card mt-2" style="border-radius: 30px; background: rgba(255,255,255,0.5);">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่มสินค้า</h4>
                <form action="" method="post">
                <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อสินค้า</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อสินค้า...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ชื่อสินค้า Ex. Wood × 64</small>
                </div>
                <div class="form-group">
                  <label for="price"><i class="fas fa-money-check"></i> ราคา</label>
                  <input type="text" name="price" id="price" class="form-control" placeholder="ราคาสินค้า...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ราคาสินค้า Ex. 5</small>
                </div>
                <div class="form-group">
                  <label for="amount"><i class="fas fa-sort-numeric-down"></i> จำนวนสินค้า</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="จำนวนสินค้า...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">จำนวนสินค้า Ex. 5</small>
                </div>
                <div class="form-group">
                  <label for="img"><i class="fas fa-image    "></i> ลิ้งค์รูปภาพ</label>
                  <input type="text" name="img" id="img" class="form-control" placeholder="ลิ้งค์รูปภาพ...." aria-describedby="helpId">
                  <small id="helpId" class="text-muted">ลิ้งค์รูปภาพ Ex. https://myweb.com/img/diamond.png/</small>
                </div>
              
                <div class="form-group">
                  <label for=""><i class="fa fa-list" aria-hidden="true"></i> เลือกประเภทสินค้า</label><p>
                  <select class="btn btn-success" name="category">
                    <option class="" value="normalitem"> ประเภทสินค้า : สินค้าทั่วไป</option>
                    <option class="" value="rank"> ประเภทสินค้า : แรงค์</option>
                    <option class="" value="money"> ประเภทสินค้า : เงิน</option>
                </select>
                  <p>
                  <small id="helpId" class="text-muted">เลือกประเภทสินค้า Ex. ยศ</small>
                </div>
                <div class="form-group">
                  <label for="c"><i class="fas fa-code"></i> คำสั่ง</label><p>
                  <small id="helpId" class="text-muted">ใส่คำสั่ง Ex. give {user} diamond 64 </small>
                  <input type="text" name="c" id="c" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="#">
                </div>
                <div class="form-group" style="text-align: center;">
                  <button type="submit" name="additem" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> เพิ่มสินค้า</button>
                </div>
                </form>
        </div>
    </div>
                  <?php
}?>
     <?php if (isset($_GET['listitem'])) {
        ?>
        <div class="card mt-2" style="background: rgba(255,255,255,0.5); border-radius: 30px; color: black;">
            <div class="card-body" style="font-size: 13px">
                <h4 class="card-title text-center"><i =class="fas fa-list-alt"></i> รายการสินค้า</h4>
<p class="text-center">
<small id="helpId" class="text-muted">เเก้ไขรายละเอียดสินค้า คลิ๊กที่ชื่อสินค้า</small>
</p>
                <p class="card-text">
                    <table class="table text-center">
                        <thead>
                            <tr style="font-size: 13px">
 <th>ชื่อสินค้า</th>
                                												<th>Category</th>
   	<th>Action</th>
  	</tr>
  </thead>
                       
 <?php
$query = 'SELECT * FROM `item`';
    if ($result = query($query)) {
        while ($row = $result->fetch()) {
            ?>
<tbody>
<tr style="font-size: 12px">
                                <td scope="row"><a href="?page=backend&edititem=true&editid=<?php echo $row['id']; ?>"><u><?php echo $row['name']; ?></u></a></td>
                                <td scope="row"><?php echo $row['category']; ?></td>
                                
                                <td scope="row"><a style="font-size: 12px" href="?page=backend&listitem=true&deleteid=<?php echo $row['id']; ?>" class="btn btn-danger">ลบสินค้า</a></td>
                            </tr>
                        </tbody>
<?php }} ?>
                    </table>
                </p>
            </div>
        </div>
     <?php
    }?>

<?php if (isset($_GET['edititem'])) {
if ($_GET['editid']){
    ?>
<?php
$id = $_GET['editid'];
$query2 = "SELECT * FROM item WHERE id = $id";
    if ($result2 = query($query2)) {
        while ($row2 = $result2->fetch()) {
            ?>
<p class="text-center">
    <div class="card mt-2" style="background: rgba(255,255,255,0.5); border-radius: 30px; color: black;">
        <img class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title text-center"><i class="fa fa-edit aria-hidden="true"></i> แก้ไขสินค้า</h4>
                <form action="" method="post">

 <div class="form-group">
                  <label for="idx"><i class="fa fa-id-card" aria-hidden="true"></i> ไอดีสินค้า</label>
                  <input type="text" name="idx" id="idx" class="form-control" placeholder="ไอดีสินค้า...." aria-describedby="helpId" value="<?php echo $row2['id']; ?>" disabled>
                  <small id="helpId" class="text-muted">ไอดีสินค้า ไม่สามารถเเก้ไขได้</small>
                </div>
<input type="hidden" name="id" id="id" class="form-control" placeholder="ไอดีสินค้า...." aria-describedby="helpId" value="<?php echo $row2['id']; ?>">
                <div class="form-group">
                  <label for="name"><i class="fa fa-tags" aria-hidden="true"></i> ชื่อสินค้า</label>
                  <input type="text" name="name" id="name" class="form-control" placeholder="ชื่อสินค้า...." aria-describedby="helpId" value="<?php echo $row2['name']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขชื่อสินค้า Ex. Wood × 64</small>
                </div>
                <div class="form-group">
                  <label for="price"><i class="fas fa-money-check    "></i> ราคา</label>
                  <input type="number" name="price" id="price" class="form-control" placeholder="ราคาสินค้า...." aria-describedby="helpId" value="<?php echo $row2['price']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขราคาสินค้า Ex. 5</small>
                </div>
 <div class="form-group">
                  <label for="amount"><i class="fas fa-sort-numeric-down"></i> จำนวนสินค้า</label>
                  <input type="text" name="amount" id="amount" class="form-control" placeholder="จำนวนสินค้า...." value="<?php echo $row2['amount']; ?>" aria-describedby="helpId">
                  <small id="helpId" class="text-muted">จำนวนสินค้า Ex. 5</small>
                </div>
                <div class="form-group">
                  <label for="img"><i class="fas fa-image    "></i> ลิ้งค์รูปภาพ</label>
                  <input type="text" name="img" id="img" class="form-control" placeholder="ลิ้งค์รูปภาพ...." aria-describedby="helpId" value="<?php echo $row2['image']; ?>">
                  <small id="helpId" class="text-muted">แก้ไขลิ้งค์รูปภาพ Ex. https://myweb.com/img/diamond.png/</small>
                </div>
                <div class="form-group">
<label for=""><i class="fa fa-list" aria-hidden="true"></i> เลือกประเภทสินค้า</label><p>
                  <select class="btn btn-success" name="category">
                    <option class="" value="normalitem"> ประเภทสินค้า : สินค้าทั่วไป</option>
                    <option class="" value="rank"> ประเภทสินค้า : แรงค์</option>
                    <option class="" value="money"> ประเภทสินค้า : เงิน</option>
                </select>
<p>
                  <small id="helpId" class="text-muted">เลือกประเภทสินค้า Ex. แรงค์</small>
                </div>
                <div class="form-group">
                  <label for="c1"><i class="fas fa-code"></i> คำสั่ง</label><p>
                  <small id="helpId" class="text-muted">ใส่คำสั่ง Ex. give {user} diamond 64 | สามารถใส่ได้สูงสุด 10 คำสั่ง หากช่องไหนไม่ต้องการให้ใส่ # ไว้</small>
                  <input type="text" name="c" id="c" class="form-control" placeholder="คำสั่ง...." aria-describedby="helpId" value="<?php echo $row2['command']; ?>"><p>
         
                </div>
                <div class="form-group" style="text-align: center;">
                  <button type="submit" name="edititem" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i> บันทึกข้อมูล</button>
                </div>
                </form>
        </div>
    </div>
                  <?php
}}}}
?>
</p>
</div>
</div>
 <?php } ?>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
// Add Item
class backends {
public function additem($title,$price,$amo,$image,$command,$category)
    {
        global $api;
        if(isset($_SESSION['admin']) == 'true') {
         query("INSERT INTO `item` (`id`,`name`,`price`,`amount`,`image`,`command`,`category`) VALUES (NULL,'".$title."','".$price."','".$amo."','".$image."','".$command."','".$category."')");
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
				swal('Success','ดำเนินการสำเร็จ เพิ่มสินค้า $title เเล้ว!','success');
                </script>";
        } else {
        	echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=backend&additem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถเพิ่มสินค้า $title ได้!','error');
                </script>";
        } 
    }

public function edititem($id,$name,$price,$amount,$img,$category,$c)
  {
  	global $api;
  $i = query("SELECT * FROM `categoryshop` WHERE `name` = ?;", array($category))->fetch();
  		query("UPDATE `item` SET `name` = '$name', `command` = '$c', `image` = '$img', `price` = '$price', `category` = '$category', `amount` = '$amount' WHERE `item`.`id` = '$id'");
  		$item = query("SELECT * FROM `item` WHERE `id` = ?;", array($id))->fetch();
  		echo "<script type='text/javascript'>
  setTimeout(function(){
				location.href = '?page=backend&edititem=true&editid=$id';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ แก้ไขข้อมูลสินค้า ".$item['name']." เรียบร้อย!','success');
                </script>";
  }
  
}

$backend = new backends();

if (isset($_POST['auth']))
{
  $user = $_POST['username'];
  $pass = $_POST['password'];

  $api->user->Login($user,$pass);
}

if (isset($_GET['listitem']))
{
	if(isset($_GET['deleteid']))
	{
		$id = $_GET['deleteid'];
		$api->backend->deleteitem($id);
	}
}

if(isset($_POST['edititem']))
{
	$id = $_POST['id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
  $amount = $_POST['amount'];
	$img = $_POST['img'];
	$c = $_POST['c'];
  $category = $_POST['category'];
	
	$backend->edititem($id,$name,$price,$amount,$img,$category,$c);
}

if (isset($_POST['additem']))
{
	$title = $_POST['name'];
	$price = $_POST['price'];
  $amo = $_POST['amount'];
	$image = $_POST['img'];
	$category = $_POST['category'];
	$command = $_POST['c'];
	//Add Item
	$backend->additem($title,$price,$amo,$image,$command,$category);
}
?>
