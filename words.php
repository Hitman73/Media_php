<?php

// запись слов в файл
function writeWordsToFile($file, $arrWords) {
    if ((count($arrWords) > 0) && ($file != FALSE)) {
		fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));
		fputcsv($file, array("Слово", "Количество повторений"),";");
        // words write
        foreach($arrWords as $key => $value) {
            fputcsv($file, array($key, $value),";");
        }
    }
}
// распечатка слов
function printWords($arrWords) {
    if (count($arrWords) > 0) {
        // words print
        foreach($arrWords as $key => $value) {
        $format = "%15s => %d <br>";
        echo sprintf($format, $key, $value);
        }
    }
}

function getWords($text) {
    $template = "/[^a-zа-я_]+/u";
    // translation to lower case
    $text = mb_strtolower(htmlspecialchars($text));
    $words = preg_split($template, $text, -1, PREG_SPLIT_NO_EMPTY);

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
    return $arr;
}
// сли¤ние массивов слов
// arr1 массив в который добавл¤ют слова
// arr2 массив дл¤ сли¤ни¤
function mergeWords(& $arr1, $arr2) {
    foreach($arr2 as  $key => $value) {
        // check the presence of a word in the array
        if (array_key_exists($key, $arr1)) {
            $arr1[$key] += $value;
        } else {
            // save the new word
            $arr1[$key] = $value;
        }
    }
}
?>