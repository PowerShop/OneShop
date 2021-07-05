<?php
$id = $_GET['id'];
$point = $_GET['point'];
if($api->shop->buy($id,$point)) {
    echo '
    <script type="text/javascript">
    alert("success");
    </script>
    ';
}
//   // JSON string
//   $someJSON = '["say hi","say {user}  hello world","say kuy"]';
//   // Convert JSON string to Array
//   $someArray = json_decode($someJSON, true);
//   foreach ($someArray as $key => $value) {
//     echo $value. "  " . "<br>";
//   }
  
?>