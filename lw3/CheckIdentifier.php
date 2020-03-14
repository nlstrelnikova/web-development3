<?php
$idf = $_GET['identifier'];
$first_alpha = 'y';
$nodig = 'y';
$sp_simb_y = 'n';
header("Content-Type:text/plain");
if(ctype_alpha($idf[0]))
{
  $i = 0;
  $len = strlen($idf);
  //echo $len."\n";
  while($i < $len) 
  {
   //echo $idf[$i]."\n";
    if(ctype_digit($idf[$i]))
    {  
      $i = $i + 1;
      if (ctype_alpha($idf[$i]))
      {
        $nodig = 'n';
      //echo $nodig."bukva \n";
      }
      $i = $i - 1;   
    }
    //if((ctype_digit($idf[$i]) != true) and (ctype_alpha($idf[$i]) != true))
    if(ctype_alnum($idf) === false)
    {
      $sp_simb_y = 'y';
       //echo $sp_simb_y." sp simb ect \n";
    } 
    $i = $i + 1;
  }      
}else{
  $first_alpha = 'n';
}
//header("Content-Type:text/plain");
if($first_alpha != 'y')
{
  echo 'No. The identifier must be the first letter';
}else{
  if($sp_simb_y != 'n')
  {
    echo 'No. The identifier can only contain letters and numbers.';
  }
    if($nodig != 'y')
  {
    echo 'No. There can be no letter in the identifier after the digit.';
  }  
    if(($sp_simb_y == 'n') and ($nodig == 'y'))
  { 
    echo 'Yes';
  }
}

