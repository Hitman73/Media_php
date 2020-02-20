<?php
$TEXT = "Mary Had A Little Lamb, and She LOVED It So, дима будет крут ч !";
$text_l = strtolower($TEXT);
#$words = preg_split(" ", $text_l);
$words = explode(" ", $text_l);
echo $text_l."<br><br>";

/*$tok = strtok($text_l, " ,\n\t");

while ($tok !== false) {
    echo "{$tok}<br />";
    $tok = strtok(" ,\n\t");
}*/

$words = preg_split("/[\s,!]+/", $text_l);
foreach($words as $word) {
	echo "{$word}<br /> ";
}
?>