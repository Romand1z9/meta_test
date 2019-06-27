<?php

namespace models;

use Exception;
/*
    Класс для работы с csv-файлами.
*/

class CSVFile
{
    private $file = NULL;

    /*
        В конструкуре определяется csv-файл, с котором будет произходить взаимодействие через созданный объект класса.
    */
    public function __construct($file, $columns = [])
    {
        $this->file = STORAGE_PATH.$file.'.csv';

        if (!$this->csv_file_exists($this->file, $columns))
        {
            $this->file = NULL;
        }
    }

    /*
        Получение строк из csv-файла в виде ассоциативного массива.
    */
    public function getRows($fields = [])
    {
        $result = [];

        try
        {
            if (is_null($this->file))
            {
                throw new Exception();
            }

            $rows = file($this->file, FILE_SKIP_EMPTY_LINES);

            if (count($rows) <= 1)
            {
                return $result;
            }

            unset($rows[0]);

            foreach ($rows as $row)
            {
                $row_array = explode(",", $row);

                $user_row = [];

                foreach ($fields as $num => $field)
                {
                    if (isset($row_array[$num]))
                    {
                        $user_row[$field] = $row_array[$num];
                    }
                    else
                    {
                        break;
                    }
                }

                $result[] = $user_row;

            }
        }
        catch (Exception $e)
        {
            return [];
        }

        return $result;

    }

    /*
        Добавление новой строки в csv-файл.
    */
    public function addRow($content)
    {
        $fp = fopen($this->file, "a");

        $content = mb_convert_encoding($content, 'UTF-8');

        fwrite($fp, $content."\n");

        fclose($fp);

        return TRUE;

    }

    /*
        Проверка существования необходимого csv-файла. Если он не существует, то будет создан.
    */
    public function csv_file_exists($file, $columns = [])
    {
        if (!file_exists($file))
        {
            /*
                Если файл не существует, то создаём его, также записывая в него первой строкой названия колонок.
            */

            try
            {
                if (empty($columns))
                {
                    throw new Exception();
                }

                $f = fopen($file, "w");

                fwrite($f, implode(",", $columns)."\n");

                fclose($f);
            }
            catch (Exception $e)
            {
                return FALSE;
            }

        }

        return TRUE;
    }

}