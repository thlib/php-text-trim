<?php declare(strict_types=1);

namespace TH\TruncateWords;

class TruncateWords
{
    /**
     * Truncate a string in PHP to the word closest to a certain number of characters so that it works with any unicode language
     * https://stackoverflow.com/a/32340759/175071
     * @param string $text
     * @param int $max
     * @param string $tail
     * @return string
     */
    public static function truncateWords(string $text, int $max, string $tail  = ''): string
    {
        $len = strlen($text);
        $text = preg_match("/^.{1,$max}\b/su", $text, $match) ? $match[0] : mb_substr($text, 0, $max);
        return trim($len > strlen($text) ? $text . $tail : $text);
    }
}
