<?php
//echo "Processsing.  One moment please.";
$file = $_SERVER['DOCUMENT_ROOT'] . "/storage/codes"; //Path to your *.txt file 
//echo $file;
$pdo = new PDO("mysql:host=localhost;dbname=users", 'notgonnashowyou', 'notgonnashowyou');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$contents = file($file);
//var_dump($file);
//echo $file;
foreach ($contents as $line_num => $line) {
//echo $line;
#echo $line;
if (strcmp ($_POST['code'],trim($line))==0){ //WTF do I need "trim" here?
file_put_contents($file,str_replace($line,"",$contents));
$query= "INSERT INTO users (MinecraftName,ActivationCode,Email,Password,OPERATOR,PAID) values(?,?,?,?,?,?)";
//echo "params";
$params=array($_POST['name'],$_POST['code'],$_POST['email'],md5($_POST['password']),0,0);
//echo "query";
try {
$smpt=$pdo->prepare($query);
}catch(Exception $e) {
echo 'Caught exception: ',  $e->getMessage(), "\n";
}
$smpt->execute($params);
//echo "\nIt has been prepared";
$whitelist = "/var/www/html/storage/WHITE";
file_put_contents($whitelist,$_POST['name']."\n",FILE_APPEND);
//file_put_contents($whitelist,"white"."\n",FILE_APPEND);

//echo "die";

echo "<html><head><title>Thank you.</title></head><body> <h2>Congratulations!</h2> <h3> You are now signed up to play minecraft on this server.</h3><p>Thank you for you sign-up.  Soon, you will be able to log in and vote, as well as perhaps some other functions (such as sharing screenshot.)<br><br> For now though, this is only a sign up form so you can play; check back soon!<br><br><b>It may be up to 10 minutes before the server will let you login.</b></p></body></html>";
return;

}
}
echo "Sorry, your activation code is invalid.";
//$string = implode($contents); 
//var_dump($string);
return;
?>

