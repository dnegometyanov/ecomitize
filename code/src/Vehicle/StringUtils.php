<?php

namespace Vehicle;

class StringUtils
{
    /**
     * Source: https://www.devops.zone/php-perl-ruby-python/convert-string-camelcased-underscored-vice-versa-php/
     */
    public static function underscoreToUpperCamelCase($string)
    {
//        return preg_replace('/(?:^|_)(.?)/e', "strtoupper('$1')", $string);

        return preg_replace_callback(
            '/(?:^|_)(.?)/',
            function ($matches) {
                foreach ($matches as $match) {
                    return str_replace('_', '', strtoupper($match));
                }
            },
            $string
        );
    }

    /**
     * Source: https://www.devops.zone/php-perl-ruby-python/convert-string-camelcased-underscored-vice-versa-php/
     */
    public static function camelCaseToUnderscore($string, $capitalizeFirstCharacter = true)
    {
        return strtolower(preg_replace('/([^A-Z])([A-Z])/', "$1_$2", $string));
    }
}