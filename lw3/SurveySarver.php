<?php
$firstname = $_GET['first_name'];
$lastname = $_GET['last_name'];
$mail = $_GET['email'];
$age = $_GET['age'];
header("Content-Type:text/plain");
$mail1 = "Email:$mail";
file_put_contents("data/$mail.txt", $mail1.";\n");
if ($firstname != "")//null
{
  $firstname = 'First name:'.$firstname;
  file_put_contents("data/$mail.txt", $firstname.";\n", FILE_APPEND);// \n перевод строки
}
if ($lastname != "")//null
{
  $lastname = "Last name:$lastname";
  file_put_contents("data/$mail.txt", $lastname.";\n", FILE_APPEND);
}
if ($age != "")//null
{
  $age = "Age:$age";
  file_put_contents("data/$mail.txt", $age.";\n", FILE_APPEND);
}
