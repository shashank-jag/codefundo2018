

<?php
ob_start();

//$command = escapeshellcmd('python process.py apple.jpg');
$output="";
$command = escapeshellcmd('/usr/bin/python3 /var/www/html/process.py apple.jpg');
$output = shell_exec($command);
echo $output;
//while(empty($output)){
$output = shell_exec($command);
//}
echo $output;
echo 'hello';
?>