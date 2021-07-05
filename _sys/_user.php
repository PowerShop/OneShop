<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

class User

{
public function Login($user,$pass)
{
global $api;
  if (query('SELECT * FROM `user` WHERE `username` = ? AND `password` =?;', array($user,$pass))->rowCount() == 1) {

$i = query('SELECT * FROM `user` WHERE `username` =?;', array($user))->fetch();

if ($i['password'] == $pass) {


$_SESSION['admin'] = $i['admin'];

echo "<script type='text/javascript'>

swal('Success','เข้าสู่ระบบสำเร็จ','success');

setTimeout(function(){

location.href = '?page=backend';

}, 2000);

</script>";
}

} else {

echo "<script type='text/javascript'>

swal('Error','Username & Password ไม่ถูกต้อง','error');

setTimeout(function(){

location.href = '?page=backend';

}, 2000);
</script>";
}


}

public function Logout()

{
global $api;

session_destroy();

echo "<script type='text/javascript'>

swal('Success','ออกจากระบบสำเร็จ','success');

setTimeout(function(){

location.href = '?page=home';

}, 2000);

</script>";

}

public function AuthMe($User)
{
 global $api;
 session_start();
 ob_start();
 $_SESSION['user'] = $User;

echo "<script type='text/javascript'>

swal('Success','เข้าสู่ระบบสำเร็จ!','success');

setTimeout(function(){

location.href = '?page=home';

}, 2000);


</script>";
}

public function Redeem($Code)
  {
    global $api;
      $QCode = query('SELECT * FROM `code` WHERE `codes`')->fetch();
      // $Codes = $Code;
      $UCode = $QCode['codes'];
      
          if ("$Code" == "$UCode") {
            $Q2Code = query('SELECT * FROM `code` WHERE `codes`=?;', array($Code))->fetch();
            // $api->rcon->connect();
            $Command = $Q2Code['command'];
            $Command = str_replace("{user}", $user, $DataValue);
            $api->rcon->send_command($Command);
              echo 
              '<script type="text/javascript">
                swal("Success","แลกโค้ด '.$Code.' สำเร็จ","success");
              </script>';
                  return true;
                    exit();
          } else {
            echo 
              '<script type="text/javascript">
                swal("Error","แลกโค้ด '.$Code.' ไม่สำเร็จ","error");
              </script>';
          }
  }
}
