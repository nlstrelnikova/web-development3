<?php
$str = $_GET['text'];
$str = ltrim($str, " "); //удаляет пробел в начале строки или $str = trim($str, " "); с обоих сторон
$str = rtrim($str, " "); //удаляет пробел в конце строки
$str = preg_replace('/\s+/', ' ', $str); //\s говорит что надо заменить все пробелы, а + включая табы на 1 пробел
header("Content-Type:text/plain");
echo 'Correct string:'.$str; 
