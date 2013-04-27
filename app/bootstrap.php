<?php

/**
 * Include config and vendor libraries
 */
require_once dirname(__DIR__).'/config/local.php'; // symlink
require_once dirname(__DIR__).'/vendor/autoload.php';

/**
 * Pretty print_r()
 * @param $what
 */
function debug($what)
{
    echo '<pre>'.print_r($what, 1).'</pre>';
}

/**
 * Set up autoloader for local classes
 */
spl_autoload_register(function ($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';

    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }

    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    $filePath = APP_DIR.'/classes/'.$fileName;

    if (file_exists($filePath)) {
        require_once $filePath;
    }
});

date_default_timezone_set('Europe/London');

/**
 * Initialise Slim
 */
$app = new \App(array(
    'mode' => APP_MODE,
    'view' => new \View(),
    'templates.path' => TEMPLATE_DIR
));

/**
 * Initialise and connect to MySQL
 */
$db = \Cabinet\DBAL\Db::connection(array(
    'driver'    => DB_DRIVER,
    'host'      => DB_HOST,
    'username'  => DB_USER,
    'password'  => DB_PASSWORD,
    'database'  => DB_NAME
));

$app->setDB($db);