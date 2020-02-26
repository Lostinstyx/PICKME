<?php

namespace Inc\Services;

class Tools
{
    public function debug($array)
    {
        echo '<pre style="height: 100px; overflow-y:scroll;font-size: .8em;padding:10px;font-family: Consolas sans-serif;background-color: #000; color: #fff;">';
        print_r($array);
        echo '</pre>';
    }

    public function error()
    {
        http_response_code(404);
    }
}