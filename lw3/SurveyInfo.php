<?php
$mail = $_GET['email'];
header("Content-Type:text/plain");
$filename = "data/$mail.txt";
if(file_exists($filename)) //echo $file
{
  $file = file_get_contents($filename);
  //echo $file."\n";
  $end = ';'; //каким символом заканчивается параметр
  $firstname = 'First name:';
  $pos_name = strpos($file,$firstname);
  //echo $pos_name."\n";
  $pos_endname = strpos($file,$end,$pos_name);
  //echo $pos_endname."\n";
  $value_name = substr($file,$pos_name+11,$pos_endname-1-$pos_name-10);  //строка со значением параметра
  //echo $value_name."\n"; 
  if ($pos_name !== false)
  {
    $firstname = "First name: $value_name";
    echo $firstname."\n";
  }else{
    echo $firstname." \n";
  }  
  $lastname = 'Last name:';
  $pos_lastname = strpos($file,$lastname);
  $pos_endlast = strpos($file,$end,$pos_lastname);
  $value_lastname = substr($file,$pos_lastname+10,$pos_endlast-1-$pos_lastname-9);
  if ($pos_lastname !== false)
  {
    $lastname = "Last name: $value_lastname";
    echo $lastname."\n";
  }else{
    echo $lastname."\n";
  }  
  $mail1 = 'mail:';
  $pos_mail = strpos($file,$mail1);
  //echo $pos_mail."\n";
  $pos_endmail = strpos($file,$end,$pos_mail);
  //echo $pos_endmail."\n";
  $value_mail = substr($file,$pos_mail+5,$pos_endmail-$pos_mail-5);
  //echo $value_mail."\n"; 
  if ($pos_mail !== false)
  {
    $mail1 = "Email: $value_mail";
    echo $mail1."\n";
  }else{
    echo $mail1." \n";
  }
  $age = 'Age:';
  $pos_age = strpos($file,$age);
  $pos_endage = strpos($file,$end,$pos_age);
  $value_age = substr($file,$pos_age+4,$pos_endage-1-$pos_age-3);
  if ($pos_age !== false)
  {
    $age = "Age: $value_age";
    echo $age." \n";
  }else{
    echo $age." \n";
  }
}else{
  echo 'Such user profile does not exist';
}
//localhost:8080/SurveyInfo.php?email=nata@mail.ru
//localhost:8080/SurveySarver.php?email=nata@mail.ru&first_name=Nata&age=34
