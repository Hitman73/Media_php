<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 style="text-align: center;"><strong>Домашнее задание №2</strong></h1><p>&nbsp;</p>
        <form enctype="multipart/form-data" method="POST">
            <textarea  name = "text" rows = "10" cols = "45">Здесь Вы можете написать текст date для обработки</textarea><br>
            <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <!-- Название элемента input определяет имя в массиве $_FILES -->
            Файл для обработки: <input name="userfile" type="file" />
            <p><input type="submit" value="Обработать" /></p>
        </form>
        <div>
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
            ?>
        </div>
    </body>
</html>
