--TEST--
IntlCalendar::createInstance() basic test
--SKIPIF--
<?php
if (!extension_loaded('intl'))
	die('skip intl extension not enabled');
if (version_compare(INTL_ICU_VERSION, '4.8') < 0)
	die('skip for ICU 4.8+');
--FILE--
<?php
ini_set("intl.error_level", E_WARNING);
ini_set("intl.default_locale", "nl");

date_default_timezone_set('Europe/Amsterdam');

$cal = IntlCalendar::createInstance();
print_R($cal->getTimeZone());
print_R($cal->getLocale(Locale::ACTUAL_LOCALE));
echo "\n";
print_R($cal->getType());
echo "\n";

$timeMillis = $cal->getTime();
$time = time();

var_dump(abs($timeMillis - $time * 1000) < 1000);

?>
==DONE==

--EXPECTF--
IntlTimeZone Object
(
    [valid] => 1
    [id] => Europe/Amsterdam
    [rawOffset] => 3600000
    [currentOffset] => %d
)
nl
gregorian
bool(true)
==DONE==
