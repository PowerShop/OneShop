<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if(!isset($_SESSION['user'])) { echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=store';
				}, 1000);
                swal('Error','ไม่สามารถทำรายการได้!','error');
                </script>"; }
 if(isset($_SESSION['user'])) { 

if(!isset($_SESSION['id'])){ echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=store';
				}, 1000);
                swal('Error','ไม่สามารถทำรายการได้!','error');
                </script>"; 
}
?>
<?php

error_reporting(0);
set_time_limit(0);
$datenow=date("Y-m-d");
$transaction_leng=14;
$url_api="http://tmwallet.thaighost.net/apiwallet.php";
//$url_api="https://www.tmweasy.com/apiwallet.php";

//-----------------------------------------config----------------------------------------------------
include "_sys/_config.php";


//ตัวคูณเครดิตรสำหรับทรูวอเลท
$mul=1;

//เชทค่าเครดิตรสำหรับบัตรทรูมันนี่ เปลี่ยนค่าหลัง = 
$truemoney_set[50]=50;
$truemoney_set[90]=90;
$truemoney_set[150]=150;
$truemoney_set[300]=300;
$truemoney_set[500]=500;
$truemoney_set[1000]=1000;

//-----------------------------------------config----------------------------------------------------

function tmtopupconnect($tmuser,$tmpassword,$trueemail,$truepassword,$ip,$session,$transactionid,$action,$ref1){
	global $url_api;
	$urlconnect=$url_api."?username=$tmuser&password=$tmpassword&action=$action&tmemail=$trueemail&truepassword=$truepassword&session=$session&transactionid=$transactionid&clientip=$ip&ref1=$ref1&json=1";
	$ch = curl_init($urlconnect);
	//curl_setopt($ch, CURLOPT_SSLVERSION,3);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; th; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	@curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	return $doc=curl_exec($ch);
	return curl_error($ch);
	curl_close($ch);
}
function capchar($ip,$tmuser){
	return md5($tmuser.$ip);
}
function my_ip(){
	if ($_SERVER['HTTP_CLIENT_IP']) { 
		$IP = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (preg_match("[0-9]",$_SERVER["HTTP_X_FORWARDED_FOR"] )) { 
		$IP = $_SERVER["HTTP_X_FORWARDED_FOR"];
	} else { 
		$IP = $_SERVER["REMOTE_ADDR"];
	}
		return $IP;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="KeyWords" content="True money,ทรูมันนี่ ,ตัดบัตรทรู ,auto truemoney" />
<META content="Copyright (c) 2010 tmweasy.com All Rights Reserved. tmweasy.com V.1" name=copyright>
<meta name="robots" content="all" />
<meta content='index, follow, all' name='robots'/>
<META Name="Googlebot" Content="index,follow">
<meta name="revisit-after" content="1 days">
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

<?php
if($_POST[send]){
	if(strlen($_POST[transactionid])<$transaction_leng){

        echo "<script type='text/javascript'>
        
                swal('Error','กรุณากรอกเลขอ้างอิงให้ครบ14ตัว','error');location='';

                </script>";
	}else{
	$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,$truewall_email,$truepassword,my_ip(),$_POST[session],$_POST[transactionid],"yes",$_POST[ref1]);
	$returnserver=json_decode($returnserver,true);
	}
	if($returnserver[Status]=="check_success"){
		$money_total=$returnserver[Amount]; //จำนวนเงินที่ได้รับ
		if($returnserver[Type]=="truewallet"){
			//ยอดสำเร็จที่ถูกเช็คจากทรูวอเลท
			$point=$money_total*$mul;
		}else{
			//ยอดสำเร็จที่ถูกเช็คจากบัตรทรูมันนี่
			$point=$truemoney_set[$money_total];
		}
		echo "<script type='text/javascript'>

                swal('Success','ดำเนินการสำเร็จ กรุณารอสักครู่','success');
                </script>";
if(isset($point) == $_SESSION['price']){
$id = $_SESSION['id'];
$api->shop->buy($id,$point);
}
		//-------------------------------------------------------------------------------------------
	}else{ 
$error=$returnserver[Msg];


echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=wallet';
				}, 5000);
                swal('Error','$error','error');
                </script>";
		
	 }
} else{
	$returnserver=tmtopupconnect($tmapi_user,$tmpapi_assword,"","","","","","","");
	$returnserver=json_decode($returnserver,true);
	if($returnserver[Status]=="ready"){
?>
<script>
co=0;
function loading(){
	co=co+1;
	switch(co)
	{
		case 1:
		char_load="โปรดรอสักครู่ ครับ |";
		break;
		case 2:
		char_load="โปรดรอสักครู่ ครับ /";
		break;
		case 3:
		char_load="โปรดรอสักครู่ ครับ -";
		break;
		case 4:
		char_load="โปรดรอสักครู่ ครับ \\";
		co=0;
		break;
	}
	document.getElementById("loadvip").innerHTML=char_load;
	setTimeout("loading()", 100);
}	

</script>
 <div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(0,0,0,0.5); color: white;">
      <div class="card-body">
        <p class="text-center mt-2 mx-auto" style="font-size:24px"><i class="fas fa-money-bill-alt"></i> ชำระเงินผ่านระบบ TrueMoney Wallet </p>
</div>
</div>
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
<form action="" method="post" name="tmtopup">

    <div>
	<input type="hidden" name="send" value="ok">

<input type="hidden" class="text-muted" placeholder="" name="id" id="id" value="<?php echo $_SESSION['id']; ?>" disabled required>

<label for="name"><b><i class="fas fa-id-card"></i> ชื่อสินค้า</b></label>
<input type="text" class="text-muted" placeholder="" name="name" id="name" value="<?php echo $_SESSION['name']; ?>" disabled required>

<label for="price"><b><i class="fas fa-money-bill-alt"></i> ราคาสินค้า</b></label>
<input type="text" class="text-muted" placeholder="" name="price" id="price" value="<?php echo $_SESSION['price']; ?>" disabled required>

<label for="price"><b><i class="fas fa-boxes"></i> จำนวนสินค้า</b></label>
<input type="text" class="text-muted" placeholder="" name="price" id="price" value="<?php echo $_SESSION['amount']; ?>" disabled required>
      <label for="ref1"><b><i class="fas fa-tags"></i> GamerTag</b></label>

      <input type="text" class="text-muted" placeholder="" name="ref1" id="ref1" value="<?php echo $_SESSION['user']; ?>" disabled required>


      <label for="transactionid"><b><i class="fas fa-sort-numeric-down"></i> หมายเลขอ้างอิง</b></label>
      <input type="text" placeholder="หมายเลขอ้างอิง14หลัก" maxlength="<?php echo $transaction_leng; ?>" name="transactionid" id="transactionid" required>
<small id="helpId" class="text-muted" style="font-size: 15px;">กรุณาโอนเงินมาให้พอดีกับราคาสินค้า หากไม่พอใจสินค้าสามารถเปลี่ยนสินค้าที่มีราคาเท่ากันได้</small>
      <input type="submit" value="✓ แจ้งโอน" id="loadvip" class="mx-auto btn btn-success col-md-12" name="send" style="text-align: center; border-radius:10px;" onClick="this.disabled=1;this.value='รอสักครู่กำลังตรวจสอบเลขบัตร...';document.forms[0].submit();loading()">

    </div>

  </form>
<form action="" method="post" name="cancle">
<input type="submit" value=" ยกเลิกการทำรายการและกลับสู่หน้าสโตร์" class="mx-auto btn btn-danger col-md-12" name="cancle" style="text-align: center; border-radius:10px;">
</form>
</div>
</div>
</div>
<?php if(isset($_POST['cancle'])){ 
unset($_SESSION['id']);
unset($_SESSION['name']);
unset($_SESSION['price']);
unset($_SESSION['amount']);

echo "<script type='text/javascript'>
        setTimeout(function(){
				location.href = '?page=store';
				}, 1000);
                swal('Success','ดำเนินการสำเร็จ!','success');
                </script>";
		
	 
}
?>
	
<?php 
	}else if($returnserver[Status]=="noready"){
		echo "<p><img src='https://www.tmweasy.com/images/busy.png'></p><p><b>กำลังมีผู้ทำรายการอยู่ โปรดรอประมาณ 20 วินาที</b> </p>
		<p><a href='tmwallet.php'>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
	}else if($returnserver[Status]=="not_connect"){
		echo "<p><img src='https://www.tmweasy.com/images/notcon.png'></p><p><b>ไม่สามารถติดต่อ Server True Money ได้ โปรดรอสักครู่..</b> </p>
		<p><a href='tmwallet.php'>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
	}else if($returnserver[Status]=="block_ip"){
		echo "<p><img src='https://www.tmweasy.com/images/block_ip.png'></p><p><b>ถูก block ip ชั่วคราว เนื่องจากทำรายการไม่ถูกต้อง เกิน 6 ครั้ง</b> </p>

		<p><a href='?page=wallet'>คลิกเพื่อลองใหม่อีกครั้ง</a></p>";
	}else{
		echo "<p>ยังไม่พร้อมใช้งาน โปรดติดต่อผู้ดูแลระบบ </p>";
	}
}
?>
<?php } ?>