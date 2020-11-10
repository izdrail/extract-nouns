<?php
/**
 * @author Stefan Izdrail
 **/


namespace LzoMedia\ExtractNouns\Tests;


use LzoMedia\ExtractNouns\ExtractNouns;
use PHPUnit\Framework\TestCase;

/**
 * Class TestWorking
 * @package LzoMedia\ExtractNouns\Tests
 */
class TestWorking extends TestCase
{
    /**
     * Test If Response is an array
     * @method testFunctionality
     */
    public function testResponseIsArray(){
        $text = "My dear Mr. Bennet, said his lady to him one day,have you heard that Netherfield Park in London is let at last?
                Mr. Bennet replied that he had not.
                But it is, returned she for Mrs. Long has just been here, and she told me and Jane all about it.
                Mr. Bennet made no answer. His wife cried impatiently. Even the kind Dr. Smith knew better.  Mr. Bennet was so odd a mixture of quick
                parts, sarcastic humour, reserve, and caprice, that the experience of three-and-twenty years living in England had been insufficient to
                make his wife understand his character. Her mind, like her sister Lizzy's, was less difficult to develop.";

        $pn = new ExtractNouns();

        $arr = $pn->extract($text);

        $this->assertIsArray($arr);

    }

    /**
     * @method testIfNoNounsFound
     */
    public function testIfNoNounsFound(){

        $text = "a very long text with no nouns";

        $pn = new ExtractNouns();

        $arr = $pn->extract($text);

        $this->assertEmpty($arr);

    }

    /**
     * @method testFoundOneNoun
     */
    public function testFoundOneNoun(){

        $text = "a very long text with just one user living in England nouns";

        $pn = new ExtractNouns();

        $arr = $pn->extract($text);

        $this->assertCount(1 , $arr);

    }

}
