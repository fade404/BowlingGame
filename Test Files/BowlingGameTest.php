<?php
require '../src/score_roll.php';

class BowlingGameTest extends PHPUnit_Framework_TestCase {
    public function test0Points () {
        $bg = new BowlingGame();
        
        for ($i=0; $i<20; $i++) {
            $bg->roll(0);
        }
        
        $this->assertEquals(0, $bg->score());
    }
    
    public function testAllRollsEquals1 () {
        $bg = new BowlingGame();
        
        for ($i=1; $i<=20; ++$i) {
            $bg->roll(1);
        }
        
        $this->assertEquals(20, $bg->score());
    }
    
    public function testFirstRollEqual10 () {
        $bg = new BowlingGame();
        
        $bg->roll(10);
        $bg->roll(3);
        
        for ($i=1; $i<=18; ++$i) {
            $bg->roll(0);
        }
        
        $this->assertEquals(16, $bg->score());
    }
    
    public function testFirstRollEqual10Next3 () {
        $bg = new BowlingGame();
        
        $bg->roll(10);
        $bg->roll(3);
        $bg->roll(4);
        
        for ($i=1; $i<=17; ++$i) {
            $bg->roll(0);
        }
        
        $this->assertEquals(24, $bg->score());
    }
    
    public function testFirstRollSpare () {
        $bg = new BowlingGame();
        
        $bg->roll(2);
        $bg->roll(8);
        $bg->roll(4);
        $bg->roll(3);
        
        for ($i=1; $i<=16; ++$i) {
            $bg->roll(0);
        }
        
        $this->assertEquals(21, $bg->score());
    }
    
    public function testAllRollsStrike () {
        $bg = new BowlingGame();
        
        for ($i=1; $i<=12; ++$i) {
            $bg->roll(10);
        }
        
        $this->assertEquals(300, $bg->score());
    }
    
    
    
    public function test9Strikes () {
        $bg = new BowlingGame();
        
        for ($i=1; $i<=9; ++$i) {
            $bg->roll(10);
        }
        
        $bg->roll(0);
        $bg->roll(0);
        
        $this->assertEquals(240, $bg->score());
    }
    
}