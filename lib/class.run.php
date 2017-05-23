<?php
include 'class.parse.php';
include 'class.robot.php';

class Run {
	public function __construct($argv) {
		for ($i = 1; $i < sizeof($argv); $i++)
        	$this->run($argv[$i]);
	}

	private function run($fileName) {
		$parse = new Parse($fileName);
		$commands = $parse->getCommands();
		if ($commands != null) {
			$robot = null;
			foreach ($commands as $command) {
				if ($command === 'MOVE' && $robot != null)
					$robot->move();
				else if ($command === 'REPORT' && $robot != null)
					print($robot->report()."\n");
				else if ($command === 'LEFT' && $robot != null)
					$robot->turnLeft();
				else if ($command === 'RIGHT' && $robot != null)
					$robot->turnRight();
				else if (preg_match("#^PLACE ([0-4]),([0-4]),(NORTH|EAST|WEST|SOUTH)$#", $command, $matches) == 1) {
					$robot = new Robot($matches[1], $matches[2], $matches[3]);
				}
			}
		}
	}
}

?>