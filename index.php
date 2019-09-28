<body class="font" style="background: #C6FFDD; background: -webkit-linear-gradient(to right, #f7797d, #FBD786, #C6FFDD); background: linear-gradient(to right, #f7797d, #FBD786, #C6FFDD);">
<?php include '_page/menu.php'; ?>

<?php
@ini_set('display_errors', '0');
require dirname(__FILE__).'/_sys/_api.php';
require_once './_dist/_css/_core.php';
ob_start();

/*if (isset($_SESSION['username'])) {
    $query_a = "SELECT * FROM `user` WHERE `username` = '".$_SESSION['username']."'";
    $query_b = query($query_a);
    $pdo = $query_b->fetch();
}
*/
if ($_GET) {
} else {
    rdr('/?page=home');
}
if (isset($_GET['page'])) {
    $page = '_page/'.$_GET['page'].'.php';
    if (file_exists($page)) {
        include $page;
    } else {
        rdr('/?page=home');
    }
}
?>
<!-- WhatsHelp.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            line: "//line.me/ti/p/~ridp_", // Line QR code URL
            email: "aaaxcvg@gmail.com", // Email
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "line,email", // Order of buttons
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /WhatsHelp.io widget -->
<?php include '_page/footer.php'; ?>

<!-- Side Script -->
<script src="https://kit.fontawesome.com/1ec89eb88d.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
