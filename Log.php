<?php

namespace Log;


class Log
{
    /**
     * Default file name.
     *
     * @var string
     */
    private static $logname = "default_log.txt";

    /**
     * Create and write info in file txt
     *
     * @param  string  $pathname
     * @param  string|array  $data
     * @return void
     */
    private static function createFile($pathname, $data)
    {
        $fp = fopen($pathname, "w+");
        if(!fwrite($fp, $data))
        {
            echo "File is not writable";
        }
        fclose($fp);
    }

    /**
     * Write log info in file txt
     *
     * @param  string  $pathname
     * @param  string|array  $data
     * @return void
     */
    public function saveInFile($pathname = "", $data = [])
    {
        $write = is_array($data) ? print_r($data, true) . " \n" : $data;

        if(empty($pathname))
        {
            $pathname = $_SERVER["DOCUMENT_ROOT"] . "/" . self::$logname;
        }

        if(file_exists($pathname) && is_writable($pathname))
        {
            file_put_contents($pathname, $write, FILE_APPEND);
        }
        else
        {
            self::createFile($pathname, $write);
        }
    }
}