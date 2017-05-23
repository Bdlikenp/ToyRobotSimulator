# ToyRobotSimulator

### Environment Details :
PHP 7.1.1

### Instructions :

#### To run the code : 

php mainRobot.php testFile/testMoveOutOFRange.txt

mainRobot.php accepts multiple file (minimum of 1).

#### To install phpunit :

composer install 

#### To run the test : 

vendor/bin/phpunit tests/class.parseTest.php

vendor/bin/phpunit tests/class.robotTest.php



### Project architecture : 

mainRobot.php is the main entry point for the program

lib/ contains the three classes used to complete the project

lib/class.robot.php represents the toy robot and implements the different methods (left, right, move, report, place)

lib/class.parse.php is used to parse the input file and check if all the commands are valid

lib/class.run.php use class.robot.php and class.parse.php to read the input files and simulate the robot behaviour.


tests/ contains the different unit testing of the project

tests/class.parseTest.php tests class.parse.php

tests/class.robotTest.php tests class.robot.php

### Assumptions made : 

-A file containing invalid commands is ignored
