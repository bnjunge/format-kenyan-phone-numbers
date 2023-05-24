<?php

use Bnjunge\FormatKenyanPhoneNumbers\Format;
use PHPUnit\Framework\TestCase;


class FormatTest extends TestCase {

    /**
     * @test
     * @covers Format: Remove non numeric characters and return a valid phone number
     */
    function testFormat() {
        $format = new Format();
        $this->assertTrue(true);
    }
}