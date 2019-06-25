<?php

require_once MODELS_PATH."CSVFile.php";

class User
{
    static public function addUser($data = array())
    {
        $result = [];

        try
        {

            foreach ($data as $field => $value)
            {
                if (!$value)
                {
                    throw new Exception($field." is required.");
                }
                if (!self::check($field, $value))
                {
                    throw new Exception($field." incorrect format.");
                }
            }

            $result['success'] = TRUE;

        }
        catch (Exception $e)
        {
            $result['error'] = $e->getMessage();
        }

        $csv = new CSVFile('users');

        //$csv->getRows();

        $new_row = sprintf("Имя: %s, Фамилия: %s, Дата рождения: %s, Компания: %s, Должность:%s, Телефон: %s", $data['name'], $data['surname'], $data['birthday'], $data['company'], $data['position'], $data['phone']);

        if (!$csv->addRow($new_row))
        {
            throw new Exception("Add row failed");
        }

        dump($result);

    }

    static private function check ($field, $value)
    {
        switch ($field)
        {
            case 'birthday':
                return boolval(preg_match("#^\d{1,2}\.\d{1,2}\.\d{4}$#", $value)) ? TRUE : FALSE;
                break;
            case 'phone':
                return boolval(preg_match("#^(\+)?(\(\d{2,3}\) ?\d|\d)(([ \-]?\d)|( ?\(\d{2,3}\) ?)){5,12}\d$#", $value)) ? TRUE : FALSE;
                break;
            default:
                $fields = ['name', 'surname', 'position', 'company'];
                return ((array_search($field, $fields) !== FALSE) AND boolval(preg_match("/^[a-zA-Zа-яА-Я-]+$/ui", $value))) ? TRUE : FALSE;
                break;
        }
    }
}