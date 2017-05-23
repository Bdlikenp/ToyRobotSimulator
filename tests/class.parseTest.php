<?php
include(dirname(__FILE__) . "/../lib/class.parse.php");

final class RobotTest extends PHPUnit\Framework\TestCase {	
	public function testSimpleFile() {
		$parse = new Parse(dirname(__FILE__) . '/testCase/simple.txt');				
		$this->assertEquals(['PLACE 0,0,NORTH', 'MOVE', 'LEFT', 'RIGHT', 'MOVE'], $parse->getCommands());
	}

	public function testInvalidFileOutOfRange() {
		$parse = new Parse(dirname(__FILE__) . '/testCase/invalid.txt');				
		$this->assertnull($parse->getCommands());
		$parse = new Parse(dirname(__FILE__) . '/testCase/invalid2.txt');				
		$this->assertnull($parse->getCommands());
	}
}