<?php
namespace Inc\Service;

class Tools
{
  public function debug($array)
  {
    echo '<pre style="height:100px;overflow-y:scroll;font-size:.8em;padding:10px;font-family: Consolas, Monospace;background-color:#000;color:#fff;">';
    print_r($array);
    echo '</pre>';
  }



}
