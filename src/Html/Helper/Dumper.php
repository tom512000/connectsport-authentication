<?php

declare(strict_types=1);

namespace Html\Helper;

class Dumper
{
    public static function dump($var): string
    {
        ob_start();
        var_dump($var);
        $dump = ob_get_contents();
        ob_end_clean();

        return '<pre>'.$dump.'</pre>';
    }
}
