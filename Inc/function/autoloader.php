<?php
function classAutoLoader($className)
{
    require_once ('../Inc/Repository'.$className.'.php');
}
