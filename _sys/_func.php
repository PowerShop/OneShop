<?php

function rdr($url)
{
    echo "<script type='text/javascript'>
		setTimeout(function(){
				location.href = '$url';
				}, 1000);
</script>";
}
function encode($password)
{
    $en = sha1($password);

    return $en;
}
function query($sql, $array = array())
{
    global $api;
    $q = $api->sql->prepare($sql);
    $q->execute($array);

    return $q;
}