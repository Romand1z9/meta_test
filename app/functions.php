<?php 

if (!function_exists('element'))
{
    function element($key, $array, $default = FALSE)
    {
        if (isset($array[$key]) && !empty($array[$key]))
        {
            return $array[$key];
        }
        return $default;
    }
}


if (!function_exists('dump'))
{
    function dump($data, $die = TRUE)
    {
        echo "<pre>" . print_r($data, TRUE) . "</pre>";

        if ($die) {
            die;
        }
    }
}

if (!function_exists('lang'))
{

    $lang = [];

    function lang($el)
    {
        global $lang;

        if (strpos($el, ".") !== FALSE AND $el_array = explode(".", $el))
        {
            if (!isset($lang[$el_array[0]]))
            {
                $language_file = require_once LANG_PATH.LANGUAGE."/".$el_array[0].".php";
                $lang[$el_array[0]] = $language_file;
            }
            else
            {
                $language_file = $lang[$el_array[0]];
            }

            return isset($language_file[$el]) ? $language_file[$el] : FALSE;
        }
        return FALSE;
    }
}