<?php
header('Content-Type: text/plain; charset=utf-8');

$TEXT = "Techniques which are used to win customers include coupons, samples, money back, competitions etc. Many of these techniques are over a hundred years old. 
New promotion techniques are not often developed and, even when they are, there is always a risk that they will not please customers. So why do companies still 
try to develop new promotion techniques? The answer is because companies which do develop a successful 
new promotion can win many customers because they are the first to use the technique.
The oil company Shell invented a new ‘matching-half’ promotion called ‘Make Money*. Each time 
people bought a Shell product they were given half of a bank note. If they got the other half of the note they could get the money for the two halves. So for example, if they 
got two halves of a 500 soum note, they could get 500 soum in cash in the Shell shop. The competition was very successful because it was simple, it was easy to win and people 
liked getting cash immediately. Shell liked it because it could control the amount of money it had to pay. It printed a limited number of matching halves. ‘Make Money’ was a 
very successful promotion and paid for itself many times over. It helped Shell to increase its sales by 50% over a ten week period. When the promotion was over, sales remained
 high for several This was because some motorists who had changed to buy Shell products during the promotion continued to buy them after the promotion ended.";
$template = "/[^a-zа-я_]+/";

// translation to lower case
$text_l = mb_strtolower($TEXT);
$words = preg_split($template, $text_l, -1, PREG_SPLIT_NO_EMPTY);

$arr = array();
foreach($words as $word) {
    // check the presence of a word in the array
    if (array_key_exists($word, $arr)) {
        $arr[$word]++;
    } else {
        // save the new word
        $arr[$word] = 1;
    }
}
echo "Original string".PHP_EOL.$TEXT.PHP_EOL;
echo "Number of unique words in the text - ".count($arr).PHP_EOL;
if (count($arr) > 0) {
    // words print
	echo "\nWORDS".PHP_EOL;
	echo "______________________".PHP_EOL;
    foreach($arr as $key => $value) {
	$format = "%15s => %d".PHP_EOL;
	echo sprintf($format, $key, $value);
    }
}
?>