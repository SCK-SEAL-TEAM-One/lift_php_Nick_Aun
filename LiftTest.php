<?php
use PHPUnit\Framework\TestCase;

require_once('Lift.php');

class LiftTest extends TestCase {
  public function testCanBeMoveButStopWithoutOverload() {
    $currentFloor = 1;
    $gotoFloor = 1;
    $lift = new Lift();
    $lift->setCurrentFloor($currentFloor);
    $lift->setWeight(100);

    $actual = $lift->Move($gotoFloor);

    $this->assertEquals("stop", $actual);
  }

  public function testCanBeMoveToUpWithoutOverload() {
    $currentFloor = 1;
    $gotoFloor = 2;
    $lift = new Lift();
    $lift->setCurrentFloor($currentFloor);
    $lift->setWeight(100);

    $actual = $lift->Move($gotoFloor);

    $this->assertEquals("up", $actual);
  }

  public function testCanBeMoveToDownWithoutOverload() {
    $currentFloor = 2;
    $gotoFloor = 1;
    $lift = new Lift();
    $lift->setCurrentFloor($currentFloor);
    $lift->setWeight(100);

    $actual = $lift->Move($gotoFloor);

    $this->assertEquals("down", $actual);
  }

  public function testCanBeMoveWithOverload() {
    $currentFloor = 2;
    $gotoFloor = 1;
    $lift = new Lift();
    $lift->setCurrentFloor($currentFloor);
    $lift->setWeight(2000);

    $actual = $lift->Move($gotoFloor);

    $this->assertEquals("stop", $actual);
  }

  public function testCanBeMoveFromFloor1ToFloor3WithoutOverload() {
    $lift = new Lift();
    $lift->setCurrentFloor(1);
    $lift->setWeight(100);

    $actual = $lift->Move(2);
    $this->assertEquals("up", $actual);

    $actual = $lift->getCurrentFloor();
    $this->assertEquals(2, $actual);

    $actual = $lift->Move(3);
    $this->assertEquals("up", $actual);

    $actual = $lift->getCurrentFloor();
    $this->assertEquals(3, $actual);
  }
}
?>
