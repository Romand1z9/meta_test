<?php


class CSVFile
{
    private $file = NULL;

    public function __construct($file)
    {
        $this->file = STORAGE_PATH.$file.'.csv';
        if (!$this->csv_file_exists($this->file))
        {
            return FALSE;
        }
    }

    public function getRows()
    {
        $fp = file($this->file);


        var_dump($fp); die;

        fclose($fp);
    }

    public function addRow($content)
    {
        $fp = fopen($this->file, "a");

        $content = mb_convert_encoding($content, 'UTF-8');

        fwrite($fp, $content."\n");

        fclose($fp);

        return TRUE;

    }

    public function csv_file_exists($file)
    {
        if (!file_exists($file))
        {
            try
            {
                $f = fopen($file, "w");
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