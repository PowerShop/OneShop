<?php
/* ระบบ Save ข้อมูล Backend */

class Backend 
{

	
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

    public function deleteitem($id)
    {
        global $api;
        if (isset($_SESSION['admin']) == 'true') {
        	$item = query('SELECT * FROM `item` WHERE `id` = ?;',array($id))->fetch();
            query('DELETE FROM `item` WHERE `id`=?;',array($id));
            echo "<script type='text/javascript'>
            setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Success','ดำเนินการสำเร็จ ลบสินค้า ".$item['name']." เเล้ว!','success');
                </script>";
            
                
        } else {
        	echo "<script type='text/javascript'>
        	setTimeout(function(){
				location.href = '?page=backend&listitem=true';
				}, 2000);
                swal('Error','ดำเนินการไม่สำเร็จ ไม่สามารถลบสินค้าได้!','error');
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
?>