<?php
class Robot {
	private $x;
	private $y;
	private $direction;
	private $maxX;
	private $maxY;
	private $constDirections = ['NORTH', 'EAST', 'SOUTH', 'WEST'];

	public function __construct($x, $y, $direction, $maxX = 4, $maxY = 4) {
		$this->x = $x;
		$this->y = $y;
		$this->direction = array_search($direction, $this->constDirections);
		$this->maxX = $maxX;
		$this->maxY = $maxY;
	}

	public function report() 
	{
		return $this->x.','.$this->y.','.$this->constDirections[$this->direction];
	}

	private function isValid($x, $y) {
		if ($x < 0 || $x > $this->maxX || $y < 0 || $y > $this->maxY) 
			return false;
		else
			return true;
	}

	private function save($x, $y) {
		if ($this->isValid($x, $y)) {
			$this->x = $x;
			$this->y = $y;
			return true;
		}
		else
			return false;
	}

	public function move() {
		$x = $this->x;
		$y = $this->y;
		if ($this->direction == array_search('NORTH', $this->constDirections))		
			$y++;				
		else if ($this->direction == array_search('EAST', $this->constDirections))			
			$x++;
		else if ($this->direction == array_search('SOUTH', $this->constDirections))
			$y--;
		else if ($this->direction == array_search('WEST', $this->constDirections))
			$x--;							
		return $this->save($x, $y);
	}

	public function turnLeft() {
		$this->direction--;
		if ($this->direction < 0)
			$this->direction = 3;
	}

	public function turnRight() {
		$this->direction++;
		if ($this->direction > 3)
			$this->direction = 0;
	}

	public static function place($x, $y, $direction) {
		return new Robot($x, $y, $direction);
	}
}

?>