<?php

/**
 * Created by PhpStorm.
 * User: soul
 * Date: 16-8-20
 * Time: 下午8:22
 */

namespace common\core\log;

use Psr\Log\LoggerInterface;

class FileLog implements LoggerInterface
{

    public $logger = NULL;

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function alert($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function critical($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function debug($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::DEBUG, $message, $context);
    }

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function emergency($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::EMERGENCY, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function error($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::ERROR, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function info($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::INFO, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function notice($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::NOTICE, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array $context
     * @return null
     */
    public function warning($message, array $context = array())
    {
        $this->log(\Psr\Log\LogLevel::WARNING, $message, $context);
    }

    /**
     * Logs with an arbitrary level.
     *
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return null
     */
    public function log($level, $message, array $context = array())
    {
        // 2016-12-15 13:00:00 [INFO] :
        $formater = '%s [%s] : %s' . PHP_EOL;
        $file_path = isset($context['path']) ? $context['path'] : 'log';
        $file_path = trim(trim($file_path, '\\'), '/');

        $file_cate = isset($context['cate']) ? $context['cate'] : APPNAME;
        $file_cate = explode('\\', $file_cate);
        $file_cate = $file_cate[count($file_cate) - 1];


        $log_real_path = APPPATH . '/' . $file_path . '/' . $file_cate . date('/Y/m/');
        $log_real_filename = $log_real_path . date('d') . '.php';

        if (!is_dir($log_real_path)) {
            mkdir($log_real_path, 0777, TRUE);
        }

        file_put_contents($log_real_filename, sprintf($formater, date('Y-m-d H:i:s'), $level, $message), FILE_APPEND);
    }

}