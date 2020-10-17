<?php
$str = "Hello";
echo sha1($str)." <br>";
echo md5($str)."<br>";
echo hash('sha1', $str );

//hash ( string $algo , string $data [, bool $raw_output = FALSE ] ) : string
//echo hash('ripemd160', 'The quick brown fox jumped over the lazy dog.');


?>