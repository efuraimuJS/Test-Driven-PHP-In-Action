<?php

file_put_contents('php://memory', 'hello, world;');
var_dump(file_get_contents('php://memory'));

$handle = fopen('php://memory', 'a+');
fwrite($handle, 'hello, world;');
fseek($handle, 0);
var_dump(fread($handle, 2048));
fclose($handle);