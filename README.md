# php-truncate-words
Unicode truncate words after a certain number of characters in any language.

Based on the answer: [https://stackoverflow.com/a/32340759/175071](https://stackoverflow.com/a/32340759/175071)

```php
$txt = 'When the world wants to talk, it speaks Unicode. Register now to attend the 10th International Unicode Conference, which will be held on 10-12 March 1997 in Mainz, Germany. The conference will bring together experts from all sectors of the industry on the World Wide Web, the Internet and Unicode, where both the international and local levels will discuss ways to use Unicode in existing systems and with regard to computer applications, fonts, text design and multilingual computing.';
$txt = TruncateWords::truncateWords($txt, 45, '…');
self::assertSame('When the world wants to talk, it speaks…', $txt);
```

The code

```php
$text = trim(preg_match("/^.{1,$max}\b/su", $text, $match) 
? $match[0] 
: mb_substr($text, 0, $max)) 
. (strlen($text) > $max ? $tail  : '');
```

To run tests

```
composer install
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests
```
