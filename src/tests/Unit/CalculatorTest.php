<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Calculator;

class CalculatorTest extends TestCase
{
    public function testAddition()
    {
        // テスト対象クラスのインスタンスを作成
        $calculator = new Calculator();
        
        // 期待する結果
        $expected = 5;
        
        // 実際の結果
        $actual = $calculator->add(2, 3);
        
        // テスト: 期待する結果と実際の結果が一致するかどうか
        $this->assertEquals($expected, $actual);
    }
}
