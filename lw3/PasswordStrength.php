<?php
$psw = $_GET['password'];
header("Content-Type:text/plain");
if(ctype_alnum($psw))// в пароле буквы и цифры
{
  $n = 0;
  $len = strlen($psw);
  $n = $n + (4 * $len);
  //echo $n."\n";
  $n1 = preg_match_all("/[0-9]/",$psw);//кол-во цифр в пароле
  //echo $n1."Digit\n";
  $n = $n + (4 * $n1);
  //echo $n."\n";
  $n2 = preg_match_all("/[A-Z]/",$psw);//кол-во букв в верхнем регистре
  //echo $n2."Verh reg\n";
  if($n2 != 0)
  {
    $n = $n + (($len-$n2) * 2); 
  }
  //echo $n."\n";
  $n3 = preg_match_all("/[a-z]/",$psw);//кол-во букв в нижнем регистре
  //echo $n3."Nig reg\n";
  if ($n3 != 0)
  {
    $n = $n + (($len-$n3) * 2); 
  }
  //echo $n."\n";
  if($n1 == 0)
  {
    $n = $n - $len; 
  }
  if(($n2 == 0) and ($n3 == 0))
  {
    $n = $n - $len;
  }
  //echo $n."\n";
  $array = str_split($psw); 
  $array1 = array_count_values($array);//получение ассоциативного массива с символами и количествами их повторений
  $result = count($array1);
  //echo $result."Array\n";
  //print_r($array1);
  $sum = 0;
  $i = 0;
  $array2 = array_values($array1);
  //print_r($array2);
  while($i < $result)
  {
    if($array2[$i] > 1)
    {             
      $sum = $sum + $array2[$i];
    }
    //echo $array2[$i]." Array i\n";
    $i = $i+1;
    // echo $sum." Summa\n";
  }   
  $n = $n - $sum;
  echo 'Password strength: '.$n;
}else{
  echo "Password must consist of english letters and numbers";
}


