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
        $com = $item['command'];

        if ($point >= $item['price']) {
            
            // $command = str_replace(array('{user}', '{group}'), array($_SESSION['user'], $item['name']), $com);

            if ($api->rcon->connect()) {
              //  $c->connect();
              $Command = array();
              $someArray = json_decode($com);
                      foreach ($someArray as $DataID => $DataValue) {
                          
              $Command = str_replace("{user}", $user, $DataValue);
              $api->rcon->send_command($Command);
          }
            } else {
                echo '<script type="text/javascript">
              
                swal("Error","ผิดพลาด ไม่สามารถเชื่อมต่อเซิร์ฟเวอร์ได้ในขณะนี้","error");
                </script>';

                return false;
                exit();
            }
            
        //     if (is_array($Command)) {
        //         foreach ($Command as $Key => $CMD) {
        //             $Respond .= str_replace("/§./", "", $api->rcon->send_command($CMD));
        //         }
        //     } else {
        //         $Respond = str_replace("/§./", "", $api->rcon->send_command($Command));
        //     }
        //     $Output = array(
        //         "status" => true,
        //         "msg" => $Respond
        //     );
        //     $api->rcon->disconnect();
        
        // return $Output;
    
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
