<?php

require_once MODELS_PATH."CSVFile.php";

class User
{

    protected static $required_fields = ['name', 'surname', 'phone'];

    static public function addUser($data = array())
    {
        $result = [];

        try
        {

            foreach ($data as $field => $value)
            {
                if (array_search($field, self::$required_fields) !== FALSE AND !$value)
                {
                    throw new Exception(sprintf(lang('errors.required'), lang('user.'.$field)));
                }
                if ($value AND !self::check($field, $value))
                {
                    throw new Exception(sprintf(lang('errors.incorrect_format'), lang('user.'.$field)));
                }
            }

            $data = array_merge(['registration_time' => date('H:i:s d.m.Y')], $data);

            $csvFile = new CSVFile('users', [
                lang('user.registration_time'),
                lang('user.name'),
                lang('user.surname'),
                lang('user.birthday'),
                lang('user.company'),
                lang('user.position'),
                lang('user.phone'),
            ]);

            if (!$csvFile->addRow(implode(",", $data)))
            {
                throw new Exception(lang('errors.add_user'));
            }

            $result['success'] = lang('user.registration_success');

        }
        catch (Exception $e)
        {
            $result['error'] = $e->getMessage();
        }

        return $result;
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