<?php

    include 'config.php';
    $a="https://img.545141.com/crossapi/images/201808/daf111c0b24a5753.png";
//    $newa = substr($a,-0,strrpos($a,'images/')); //新的$a值
    $newa = $url = strstr($a,'/'.$config['filePath']);;
echo $newa;