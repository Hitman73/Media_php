<?php
//header('Content-Type: text/html; charset=windows-1251');
/*$text = "����������� ������� ���������� � ��������� ����� function, �� ������� ������� ��� �������. ��� ������� ������ ���������� � ����������� ������� ��� �������������, �� �������� ����� ��������� ����� ���������� ���������-�������� �������� ��� �������� �������������.";
$template = "/[^a-z�-�_]+/";

//�������� ������ ����
$arrWords = getWords($text, $template);
// ������� ����� �� ������
printWords($arrWords);
*/
// ������ ���� � ����
function writeWordsToFile($file, $arrWords) {
    if ((count($arrWords) > 0) && ($file != FALSE)) {
        fwrite($file, "����� ��������� � ���� ����� ������\n");
        fwrite($file, "___________________________________\n");
        // words print
        foreach($arrWords as $key => $value) {
            $format = "%15s => %d".PHP_EOL;
            $str = sprintf($format, $key, $value);
            fwrite($file, $str);
        }
    }
}
// ���������� ����
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
    $template = "/[^a-z�-�_]+/";
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
// ������� �������� ����
// arr1 ������ � ������� ��������� �����
// arr2 ������ ��� �������
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