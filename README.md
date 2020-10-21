# php-text-trim
Trim text in any language

```php
$txt = 'When the world wants to talk, it speaks Unicode. Register now to attend the 10th International Unicode Conference, which will be held on 10-12 March 1997 in Mainz, Germany. The conference will bring together experts from all sectors of the industry on the World Wide Web, the Internet and Unicode, where both the international and local levels will discuss ways to use Unicode in existing systems and with regard to computer applications, fonts, text design and multilingual computing.';
$txt = TextTrim::textTrim($txt, 45);
self::assertSame('When the world wants to talk, it speaks', $txt);
```

To run tests

```
vendor/phpunit/phpunit/phpunit --bootstrap vendor/autoload.php tests
```
