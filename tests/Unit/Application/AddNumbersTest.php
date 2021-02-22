<?php

declare(strict_types=1);

namespace App\Tests\Unit\Application;

use App\Application\AddNumbersService;
use PHPUnit\Framework\TestCase;

class AddNumbersTest extends TestCase
{
    private AddNumbersService $service;

    /**
     * @test
     */
    public function testNewLines()
    {
        $this->assertEquals(3, $this->service->add("1\n1,1"));
    }

    /**
     * @test
     */
    public function testMultipleAddition()
    {
        $this->assertEquals(3, $this->service->add('1,1,1'));
    }

    /**
     * @test
     */
    public function testSingleAddition()
    {
        $this->assertEquals(2, $this->service->add('1,1'));
    }

    /**
     * @test
     */
    public function testSingleNumber()
    {
        $this->assertEquals(1, $this->service->add('1'));
    }

    /**
     * @test
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
