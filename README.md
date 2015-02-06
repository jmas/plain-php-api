# plain-php-rest

It is very "sportan" list of PHP functions for creating API services.

## db() example:

````php
$sql = 'SELECT * FROM user';

$sth = db()->prepare($sql);

f ($sth->execute()) {
	$response['result'] = $sth->fetchAll();
}
````

## config($key=null)

````php
$dbConfig = config('db');
$allConfigs = config();
````

## currentPath()

````php
$path = currentPath(); // eg. for URL http://localhost/index.php/api path is 'api'
````
