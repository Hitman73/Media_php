<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h1 style="text-align: center;"><strong>�������� ������� �2</strong></h1><p>&nbsp;</p>
        <form enctype="multipart/form-data" method="POST">
            <textarea  name = "text" rows = "10" cols = "45">����� �� ������ �������� ����� date ��� ���������</textarea><br>
            <!-- ���� MAX_FILE_SIZE ������ ���� ������� �� ���� �������� ����� -->
            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
            <!-- �������� �������� input ���������� ��� � ������� $_FILES -->
            ���� ��� ���������: <input name="userfile" type="file" />
            <p><input type="submit" value="����������" /></p>
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
                        //�������� ������ ����
                        $arrWords = getWords($text);
                        // ������� ����� �� ������
                        //printWords($arrWords);
                    }
                }

                if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                    $fr = fopen($_FILES['userfile']['tmp_name'], 'r');
                    if (!empty($fr)) {
                        while(!feof($fr)) {
                            // ��������� �� �����
                            $string = fgets($fr);
                            // �������� ������ ����
                            $arrTemp = getWords($string);
                            // ���������� ������ ����
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
