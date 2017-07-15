<?php
/**
 * Created by PhpStorm.
 * User: leminhtoan
 * Date: 7/14/17
 * Time: 11:09
 */

namespace libs;


class Log
{
    /**
     * Log function
     * Implements writing to log files.

     * @param string $message The message you want to log.
     * @return bool success of write.
     */
    public static function info($message)
    {
        $path = LOG_PATH . '/info.log';
        $mask  = 0777;

        $exists = file_exists('logs/info.log');
        $result = file_put_contents($path, date('Y/m/d H:i:s') . ':' . $message . "\n", FILE_APPEND);
        static $selfError = false;

        if (!$selfError && !$exists && !chmod($path, (int)$mask)) {
            $selfError = true;
            trigger_error(vsprintf(
                'Could not apply permission mask "%s" on log file "%s"',
                [$mask, $path]
            ), E_USER_WARNING);
            $selfError = false;
        }

        return $result;
    }
}