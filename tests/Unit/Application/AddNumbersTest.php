<?php

declare(strict_types=1);

namespace App\Tests\Unit\Application;

use App\Application\AddNumbersService;
use App\Exception\NegativesNotAllowedException;
use PHPUnit\Framework\TestCase;

class AddNumbersTest extends TestCase
{
    private AddNumbersService $service;

    public function testDifferentLengthLimiters()
    {
        $this->assertEquals(6, $this->service->add("//[***]\n1***2***3"));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testIgnoreNumbersOver1000()
    {
        $this->assertEquals(2, $this->service->add("2,1000"));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testNegativesNotAllowedException()
    {
        $this->expectException(NegativesNotAllowedException::class);
        $this->service->add('1,-1,2,-3');
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testDifferentLimiter()
    {
        $this->assertEquals(3, $this->service->add("//;\n1;2"));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testNewLines()
    {
        $this->assertEquals(3, $this->service->add("1\n1,1"));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testMultipleAddition()
    {
        $this->assertEquals(3, $this->service->add('1,1,1'));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testSingleAddition()
    {
        $this->assertEquals(2, $this->service->add('1,1'));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testSingleNumber()
    {
        $this->assertEquals(1, $this->service->add('1'));
    }

    /**
     * @test
     *
     * @throws NegativesNotAllowedException
     */
    public function testEmpty()
    {
        $this->assertEquals(0, $this->service->add(''));
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->service = new AddNumbersService();
    }
}
