<?php
$TEXT = "Предостережение count() умеет определять рекурсию для избежания бесконечного цикла, но
при каждом обнаружении выводит ошибку уровня E_WARNING (в случае, если массив содержит себя более одного раза) и
возвращает большее количество, чем могло бы ожидаться.";
$template = "/[^a-zа-я_]+/";

// перевод в нижний регистр
$text_l = mb_strtolower($TEXT);
$words = preg_split($template, $text_l, -1, PREG_SPLIT_NO_EMPTY);

$arr = array();
foreach($words as $word) {
    // проверим наличие слова в массиве
    if (array_key_exists($word, $arr)) {
        $arr[$word] = ++$arr[$word];
    } else {
        // сохраним новое слово
        $arr[$word] = 1;
    }
}
echo "<br />Исходный текст: <p>{$TEXT}</p>";
echo "<br />Количество уникальных слов в тексте - <b>".count($arr)."</b> <br /><br />";
if (count($arr) > 0) {
    echo "<table border='1' >";
    echo "<tr><th>Слово</th><th>Количество повторений</th></tr>";
    // вывод слов
    foreach($arr as $k => $value) {
        echo "<tr><td>{$k}</td><td>{$value}</td></tr>";
    }
    echo "</table>";
}
?>
