<!doctype html> 
<html lang="en"> 
<head> 
<!-- Required meta tags --> 
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
<!-- Bootstrap CSS --> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
</head> 
<body> 
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(0,0,0,0.5); color: white;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto" style="font-size: 24px"><i class="fas fa-terminal"></i> Console</p>
</div>
</div>
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
 <p class="text-center mt-2 mx-auto" style="font-size: 18px"><i class="fas fa-file"></i> Log file</p>
<p><?php if(isset($_POST['send'])){
$cmd = $_POST['command'];
 $api->rcon->connect();
$api->rcon->send_command($cmd);

}
 ?></p>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.js"></script> 
<script type="text/javascript"> 
$(window).load(function () { var $contents = $('#frame').contents(); $contents.scrollTop($contents.height()); });
</script>
<iframe id="frame" src="../server/server.log" style="height:300px;width:300px"></iframe>

</div>
</div>
<div class="card mt-2 mx-auto" style="border-radius:30px; background: rgba(255,255,255,0.5); color: black;">
<div class="card-body">
<form action="" method="post">
      
    <div>
      <label for="command"><b><i class="fas fa-code"></i> Command</b></label>
      <input type="text" placeholder="say hi" name="command" id="command" required>

      <button type="submit" name="send" style="border-radius:10px;"><i class="fas fa-sign-in-alt"></i> Send</button>
    </div>

      </div>
  </form>
</div>
</div>
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
</body> 
</html>

