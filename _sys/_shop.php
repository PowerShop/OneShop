<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php

class Shop
{
    public function buy($id,$point)
    {
        global $api;
        @ini_set('display_errors', '0');
        
        $user = $_SESSION['user'];
        $item = query('SELECT * FROM `item` WHERE `id`=?;', array($id))->fetch();

        if ($point >= $item['price']) {
            $com = $item['command'];
            

            $command = str_replace(array('{user}', '{group}'), array($_SESSION['user'], $item['name']), $com);

            if ($api->rcon->connect()) {
              //  $c->connect();
            } else {
                echo '<script type="text/javascript">
              
                swal("Error","ผิดพลาด ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ในขณะนี้","error");
                </script>';

                return false;
                exit();
            }
            $api->rcon->send_command($command);
            
            $itemname = $item['name'];
            echo "<script type='text/javascript'>
setTimeout(function(){			
	location.href = '?page=store';				}, 5000);
                swal('Success','ดำเนินการสำเร็จ กรุณารอรับไอเทม $itemname ภายในเกม!','success');
                </script>";

            return true;
        } else {
            return false;
        }
    }
}
