<?php	
    // создание директории
    function create_dir($dir_name) {
        if (file_exists($dir_name)) {
            return FALSE;
        } else {
            if (!mkdir($dir_name, 0777)) {
                return FALSE;
            }
        }
        return TRUE;
    }

    // генерация имени файла расширение "csv"
    function getNextFileName($dir_name, $file_name) {
        // получим список файлов
        $arr = glob($dir_name."/".$file_name."_[0-9]*.csv");
        // если файлов нет то вернем начальное имя файла
        if (count($arr) == 0) {
            return $file_name."_1.csv";
        }

        $num = 1;
        foreach ($arr as $filename) {
            // получим число из имени файла
            preg_match("/\d+$/", basename($filename, ".csv"), $words);
            // найдем найдольшее число в имени файла из всего массива файлов
            $num = ($words[0] > $num ) ? $words[0] : $num;
        }

        $num++;
         return $file_name."_".$num.".csv";
    }
?>