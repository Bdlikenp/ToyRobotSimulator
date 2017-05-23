<?php
include(dirname(__FILE__) . "/../lib/class.robot.php");

final class RobotTest extends PHPUnit\Framework\TestCase {
	public function testConstructor() {
		$this->assertInstanceOf(
			Robot::class,
			new Robot(3, 3, 'NORTH')
		);
	}

	public function testMoveLeft() {
		$robot = new Robot(0, 0, 'NORTH');
		$robot->turnLeft();
		$this->assertEquals("0,0,WEST", $robot->report());
	}

	public function testMoveRight() {
		$robot = new Robot(0, 0, 'NORTH');
		$robot->turnRight();
		$this->assertEquals("0,0,EAST", $robot->report());
	}

	public function testMoveStraight() {
		$robot = new Robot(0,0, 'NORTH');
		$robot->move();
		$this->assertEquals("0,1,NORTH", $robot->report());
	}

	public function testMoveAndLeft() {
		$robot = new Robot(0,0, 'NORTH');
		$robot->turnLeft();
		$robot->turnRight();
		$robot->move();
		$this->assertEquals("0,1,NORTH", $robot->report());
	}

	public function testMoveOutOfRange() {
		$robot = new Robot(0,0, 'SOUTH');
		$robot->move();
		$this->assertEquals("0,0,SOUTH", $robot->report());
	}

	public function testMultipleMoveAndRotation() {
		$robot = new Robot(0,0, 'NORTH');
		$robot->move();
		$robot->move();
		$this->assertEquals("0,2,NORTH", $robot->report());
		$robot->move();
		$robot->move();
		$this->assertEquals("0,4,NORTH", $robot->report());
		$robot->move();
		$robot->move();
		$this->assertEquals("0,4,NORTH", $robot->report());
		$robot->turnLeft();
		$robot->move();
		$this->assertEquals("0,4,WEST", $robot->report());
		$robot->turnRight();
		$robot->turnRight();
		$robot->move();
		$this->assertEquals("1,4,EAST", $robot->report());
		$robot->move();
		$robot->move();
		$robot->move();
		$robot->move();
		$robot->move();
		$robot->move();
		$robot->move();
		$this->assertEquals("4,4,EAST", $robot->report());
	}
}