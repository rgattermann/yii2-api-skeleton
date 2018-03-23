
<?php 

require_once dirname(__DIR__).'/vendor/autoload.php';

(new \Dotenv\Dotenv(dirname(__DIR__)))->load();

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require_once dirname(__DIR__).'/vendor/yiisoft/yii2/Yii.php';

$config = require dirname(__DIR__).'/config/main.php';

$application = new yii\web\Application($config);
$application->run();
