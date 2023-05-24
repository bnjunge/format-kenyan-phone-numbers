<?php

use Bnjunge\FormatKenyanPhoneNumbers\Format;
use PHPUnit\Framework\TestCase;

class FormatTest extends TestCase
{
    /**
     * @test
     * @covers Format: Remove non numeric characters and return a valid phone number
     */
    public function testFormat()
    {
        $phone = Format::phone('0712 34.56-78');
        $this->assertTrue($phone == '254712345678');

        $phone2 = Format::phone('07-12 123-123');
        $this->assertTrue($phone2 == '254712123123');

        $phone3 = Format::phone('07(12) 123.123');
        $this->assertTrue($phone3 == '254712123123');

        $phone4 = Format::phone('07(12) 123 123');
        $this->assertTrue($phone4 == '254712123123');
    }

    /**
     * @test
     * @covers Format: Return an invalid phone number error, number with more than 12 digits
     */
    public function testInvalidPhone()
    {
        $phone = Format::phone('01712 34.56-789');
        $this->assertTrue($phone == 'Invalid Phone Number 017123456789');
    }

    /**
     * @test
     * @covers Format: Return an invalid phone number error, number with less than 9 digits
     */
    public function testInvalidPhoneLessDigits()
    {
        $phone = Format::phone('0712 34.56-7');
        $this->assertTrue($phone == 'Invalid Phone Number 071234567');
    }

    /**
     * @test
     * @covers Format: Check ISP: Operator is Safaricom
     */
    public function testIspIsSafaricom()
    {
        $operator = Format::operator('0712 34.56-78');
        $this->assertTrue($operator == 'safaricom');
        
        $operator = Format::operator('0722 34.56-78');
        $this->assertTrue($operator == 'safaricom');
    }
    
    /**
     * @test
     * @covers Format: Check ISP: Operator is Airtel
     */
    public function testIspIsAirtel()
    {
        $operator = Format::operator('0732 34.56-78');
        $this->assertTrue($operator == 'airtel');

        $operator = Format::operator('0733 34.56-78');
        $this->assertTrue($operator == 'airtel');
    }

    /**
     * @test
     * @covers Format: Check ISP: Operator is Telkom
     */
    public function testIspIsTelkom()
    {
        $operator = Format::operator('0772 34.56-78');
        $this->assertTrue($operator == 'telkom');
    }

    /**
     * @test
     * @covers Format: Check ISP: Operator is Equitel
     */
    public function testIsIsEquitel()
    {
        $operator = Format::operator('0763 34.56-78');
        $this->assertTrue($operator == 'equitel');
    }

    /**
     * @test
     * @covers Format: Check ISP: Operator is Faiba4G
     */
    public function testIspIsFaiba4G()
    {
        $operator = Format::operator('0747 34.56-78');
        $this->assertTrue($operator == 'faiba4g');
    }

    /**
     * @test
     * @covers Format: Check ISP: Operator is Invalid Operator
     */
    public function testIspIsInvalidOperator()
    {
        $operator = Format::operator('0116 34.56-78');
        $this->assertTrue($operator == 'Invalid Operator');
    }
}
