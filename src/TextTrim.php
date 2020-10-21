<?php declare(strict_types=1);

namespace TH\TextTrim;

class TextTrim
{
    public static function textTrim1(string $text, int $max, string $tail = ''): string
    {
        return mb_strimwidth($text, 0, $max);
    }

    /**
     * https://stackoverflow.com/a/79986/175071
     */
    public static function textTrim2(string $text, int $max, string $tail = ''): string
    {
        return substr($text, 0, strpos(wordwrap($text, $max), "\n"));
    }

    /**
     * https://stackoverflow.com/a/80066/175071
     */
    public static function textTrim3(string $text, int $max, string $tail = ''): string
    {
        return preg_replace('/\s+?(\S+)?$/u', '', substr($text, 0, $max));
    }

    /**
     * https://stackoverflow.com/a/4665347/175071
     */
    public static function textTrim4(string $text, int $max, string $tail = ''): string
    {
        return substr($text, 0, strrpos(substr($text, 0, $max), ' '));
    }

    /**
     * This one is pretty good
     * https://stackoverflow.com/a/17852480/175071
     */
    public static function textTrim5(string $text, int $max, string $tail = ''): string
    {
        return strtok(wordwrap($text, $max, "...\n"), "\n");
    }

    /**
     * Also pretty good
     * https://stackoverflow.com/a/2523223/175071
     */
    public static function textTrim6(string $str, int $n, string $delim = ''): string
    {
        $len = strlen($str);
        if ($len > $n && preg_match('/(.{' . $n . '}.*?)\b/su', $str, $match)){
            return rtrim($match[1]) . $delim;
        }
        return $str;
    }

    /**
     * Perfect
     * https://stackoverflow.com/a/32340759/175071
     * @param string $text
     * @param int $max
     * @param string $tail
     * @return string
     */
    public static function textTrim(string $text, int $max, string $tail  = ''): string
    {
        $len = strlen($text);
        $text = preg_match("/^.{1,$max}\b/su", $text, $match) ? $match[0] : mb_substr($text, 0, $max);
        return trim($len > strlen($text) ? $text . $tail : $text);
    }
}
