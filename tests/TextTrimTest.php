<?php declare(strict_types=1);

namespace TH\TextTrim;

use PHPUnit\Framework\TestCase;

final class TextTrimTest extends TestCase
{
    public function testEnglish(): void
    {
        $txt = 'When the world wants to talk, it speaks Unicode. Register now to attend the 10th International Unicode Conference, which will be held on 10-12 March 1997 in Mainz, Germany. The conference will bring together experts from all sectors of the industry on the World Wide Web, the Internet and Unicode, where both the international and local levels will discuss ways to use Unicode in existing systems and with regard to computer applications, fonts, text design and multilingual computing.';
        $txt = TextTrim::textTrim($txt, 45);
        self::assertSame('When the world wants to talk, it speaks', $txt);
    }

    public function testEnglishWithNewline(): void
    {
        $txt = "When the world wants to talk\n, it speaks Unicode. Register now to attend the 10th International Unicode Conference, which will be held on 10-12 March 1997 in Mainz, Germany. The conference will bring together experts from all sectors of the industry on the World Wide Web, the Internet and Unicode, where both the international and local levels will discuss ways to use Unicode in existing systems and with regard to computer applications, fonts, text design and multilingual computing.";
        $txt = TextTrim::textTrim($txt, 45);
        self::assertSame("When the world wants to talk\n, it speaks", $txt);
    }

    public function testArabic(): void
    {
        $txt = 'عندما يريد العالم أن ‪يتكلّم ‬ ، فهو يتحدّث بلغة يونيكود. تسجّل الآن لحضور المؤتمر الدولي العاشر ليونيكود (Unicode Conference)، الذي سيعقد في 10-12 آذار 1997 بمدينة مَايِنْتْس، ألمانيا. و سيجمع المؤتمر بين خبراء من كافة قطاعات الصناعة على الشبكة العالمية انترنيت ويونيكود، حيث ستتم، على الصعيدين الدولي والمحلي على حد سواء مناقشة سبل استخدام يونكود في النظم القائمة وفيما يخص التطبيقات الحاسوبية، الخطوط، تصميم النصوص والحوسبة متعددة اللغات.';
        $txt = TextTrim::textTrim($txt, 93);
        self::assertSame('عندما يريد العالم أن ‪يتكلّم ‬ ، فهو يتحدّث بلغة يونيكود. تسجّل الآن لحضور المؤتمر الدولي', $txt);

        $txt = 'the title is "‫مفتاح معايير الويب!‬‎" in arabic.';
        $txt = TextTrim::textTrim($txt, 28);
        self::assertSame('the title is "‫مفتاح معايير', $txt);
    }

    public function testHan(): void
    {
        $txt = '道可道非常道，名可名非常名。';
        $txt = TextTrim::textTrim($txt, 5);
        self::assertSame('道可道非常', $txt);

        $txt = '吾輩は猫で∂る（夏ｭﾚ漱⽯）：吾輩は猫で∂る';
        $txt = TextTrim::textTrim($txt, 7);
        self::assertSame('吾輩は猫で∂る', $txt);
    }

    public function testKana(): void
    {
        $txt = 'あいうえおかがきぎくぐけこさざしじすせそただちぢつてとなにぬねのはばぱひふへほまみむ';
        $txt = TextTrim::textTrim($txt, 12);
        self::assertSame('あいうえおかがきぎくぐけ', $txt);
    }

    public function testRussian(): void
    {
        $txt = 'Когда мир хочет говорить, он говорит в Юникоде. Зарегистрируйтесь сейчас, чтобы принять участие в 10-й Международной конференции Unicode, которая состоится 10-12 марта 1997 года в Майнце, Германия. Конференция соберет вместе экспертов из всех секторов индустрии по всемирной паутине, Интернету и Unicode, где как на международном, так и на местном уровнях будут обсуждаться способы использования Unicode в существующих системах, а также в отношении компьютерных приложений, шрифтов, дизайна текста. и многоязычные вычисления.';
        $txt = TextTrim::textTrim($txt, 65);
        self::assertSame('Когда мир хочет говорить, он говорит в Юникоде. Зарегистрируйтесь', $txt);
    }
}
