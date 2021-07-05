<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background: rgba(0,0,0,0.6);
  color: white;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.header {
  border-radius:30px;
  padding: 10px 16px;
  background: #555;
  color: #f1f1f1;
}

</style>
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="?page=home"><i class="fas fa-home"></i> Home</a>
  <a href="?page=store"><i class="fas fa-store"></i> Store</a>
  <a href="?page=redeem"><i class="fas fa-gift"></i> Redeem</a>
  <a href="?page=help"><i class="fas fa-book"></i> คู่มือการใช้งาน</a>
  <a href="?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>
<div class="mt-1 text-center"></div>
<div class="header" id="">
<span class="mt-1" style="text-align:left; font-size:30px;cursor:pointer" onclick="openNav()">&#9776; เมนู </span>
</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}


</script>
   
</body>
</html> 
