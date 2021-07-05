<?php
/*if ($_SESSION['username']){

}else{
rdr('?page=auth');
}*/
?>
<!doctype html> 
<html lang="en"> 
<head> 
<!-- Required meta tags --> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Bootstrap CSS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
<title>:: Home ::</title>
</head> 
<body> 
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(0,0,0,0.5); color: white;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto" style="font-size:24px"><i class="fas fa-home"></i> MShop ร้านค้าออนไลน์</p>
</div>
</div>
<?php if(!isset($_SESSION['user'])) { ?>
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
<form action="" method="post">
      <p class="mt-2 mx-auto" style="text-align: center; font-size: 24px; color: black;"><i class="fas fa-user"></i> Sign In</p>
    <div>
      <label for="username"><b><i class="fas fa-tags"></i> GamerTag</b></label>
      <input type="text" placeholder="Ex. John" name="username" id="username" required>

      <button type="submit" name="authme" style="border-radius:10px;"><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
    </div>

      </div>
  </form>
</div>
</div>
<?php } else { ?>
<div class="card mt-2 mx-auto" style="font-size: 20px; border-radius:30px; background: rgba(255,255,255,0.3); color: white;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto">
<p class="mt-2 mx-auto" style="text-align: center; font-size: 24px; color: black;"><i class="fas fa-user"></i> กำลังเข้าสู่ระบบ...</p>
    <p style="font-size: 17px; color: black;" class="card-title"><?php $user = $_SESSION['user']; if(isset($_SESSION['user'])){ echo "กำลัง Login ด้วย GamerTag : $user"; } else { echo "ยังไม่ได้ลงทะเบียน"; } ?></p>
    <button onclick="window.location.href='?page=store'" class="btn btn-success"><i class="fas fa-store"></i> เปิดหน้าร้านค้า</button><p class="mt-1"></p>
    <button onclick="window.location.href='?page=logout'" class="btn btn-danger"><i class="fas fa-sign-in-alt"></i> ออกจากระบบ</button>
  </div>
</div>
</p>
</div>
</div>
<?php } ?>
 <div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.3); color: black;">
      <div class="card-body">
        <p class="text-center mt-2 mx-auto" style="font-size:24px"><i class="fas fa-signal"></i> Status Server</p>
        <p class="card-text"></i><i class="fas fa-signal"></i> สถานะเซิร์ฟเวอร์
          <?php if ($api->status->status == "Online") { ?> <button class='btn btn-success'>Online</button> <?php } else { ?> <button class='btn btn-danger'>Offline</button> <?php } ?>
        </p>
        <p class="card-text"><i class="fas fa-users" aria-hidden="true"></i> จำนวนผู้เล่นออนไลน์ <button class="btn btn-warning">
            <div id="screen" class="screen"></div>
            
          </button></p>
      </div>
    </div>

<?php if(isset($_POST['authme'])) {
$User = $_POST['username'];
$api->user->AuthMe($User);
}
?>

<!-- Optional JavaScript --> 
<script>
//   var seconds_left = 5;
// var interval = setInterval(function() {
//     // document.getElementById('screen').innerHTML = "กำลังโหลด Status " + --seconds_left + " seconds.";
//     if (seconds_left <= 0)
//     {
//       // var seconds_left = 0;
//     //alert('The video is ready to play.');
//     clearInterval(interval);
//     $(document).ready(function() {
//         $('#load').load('_page/status.php');
//     });
//     }
// }, 1000);

// Script for load Status Server

    $(document).ready(function () {
      setInterval(function () {
        $(".screen").load("_page/status.php")
      }, 10000);
    });

  </script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
  
</body> 
</html>

