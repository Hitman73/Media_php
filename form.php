<?php
    include "words.php";
    include "library.php";

    $fd = null;
    $arrWords = array();
    $dir_name = "out_files";
    $file_name = "file";

    create_dir($dir_name);
    if (isset($_POST['text'])) {
        $text=$_POST['text'];
        if (strlen($text) > 0)
        {
            //получаем список слов
            $arrWords = getWords($text);
            // выводим слова на печать
            //printWords($arrWords);
        }
    }

    if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
        $fr = fopen($_FILES['userfile']['tmp_name'], 'r');
        if (!empty($fr)) {
            while(!feof($fr)) {
                // считываем по стрке
                $string = fgets($fr);
                // получаем массив слов
                $arrTemp = getWords($string);
                // объединяем массив слов
                mergeWords($arrWords, $arrTemp);
            }
            fclose($fr);
        }
    }

    $name = getNextFileName($dir_name, $file_name);
    $fd = fopen($dir_name."\\".$name, 'w');
    writeWordsToFile($fd, $arrWords);
    fclose($fd);
	echo "Текст обработан";
?>