<?php
function debug($error, $bool = true)
{
    if ($error == $bool) {
        echo "<pre>";
        print_r($error);
        echo "</pre>";
    } else {
        echo "<pre>";
        var_dump($error);
        echo "</pre>";
    }

}
