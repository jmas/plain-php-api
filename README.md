# Plain PHP API

It is very "sportan" list of PHP functions for creating API services that using MySQL as data base.

## db()

Get current PDO connection. DB settings is stored in config.php file.

````php
$sql = 'SELECT * FROM user';

$sth = db()->prepare($sql);

f ($sth->execute()) {
	$response['result'] = $sth->fetchAll();
}
````

## config($key=null)

Get config values for specific key. Config values is stored in config.php file. For local enviroment you can use config.local.php.

````php
$dbConfig = config('db');
$allConfigs = config();
````

## currentPath()

Get current path for requested URL. Eg. for URL **http://localhost/index.php/api** currentPath() will be **api**.

````php
$path = currentPath();
````
