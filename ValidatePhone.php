<?php

    include "index.php";
    $phone=$_POST['phoneCode'];
    $code = rand(10000,100000);

    echo $resultUser['code']="$code";

?>
