<?php
	class Parse {
		private $commands;

		public function __construct($fileName) {
			if (($fileContent = file_get_contents($fileName)) === false) {
				print("Error opening file : ".$fileName."\n");
				$this->commands = null;
				return;
			}
			$this->commands = explode(PHP_EOL, $fileContent);
			foreach ($this->commands as $key => $command) {
				if (!$this->isValidCommand($command)) {
					print("Input file : ".$fileName. " contains wrong commands(Line ".($key + 1)." : ".$command.")\n");
					$this->commands = null;
					return;
				}
			}
		}

		private function isValidCommand($command) {
			if ($command === 'LEFT' ||
				$command === 'RIGHT' ||
				$command === 'MOVE' ||
				$command === 'REPORT')
				return true;
			else if (preg_match('#^PLACE [0-4],[0-4],(NORTH|EAST|WEST|SOUTH)$#', $command) == 1)
				return true;
			else
				return false;
		}

		public function getCommands() {
			return $this->commands;
		}
	}
?>