<?php 

$command = escapeshellcmd('/var/www/html/test2.py');
$output = shell_exec($command);
echo $output;
echo 'h';
?>
