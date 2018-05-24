<?php
class Lift {
  private $max_weight = 1000;
  private $weight;
  private $current;

  public function __construct() {
    $this->current = 1;
    $this->weight = 0;
  }

  public function Move($goto) {
    if ($this->isOverload()) return "stop";
    return $this->direct($goto);
  }

  public function setCurrentFloor($currentFloor) {
    $this->current = $currentFloor;
  }

  public function getCurrentFloor() {
    return $this->current;
  }

  public function setWeight($weight) {
    $this->weight = $weight;
  }

  public function getWeight() {
    return $this->weight;
  }

  private function isOverload() {
    return ($this->weight > $this->max_weight);
  }

  private function direct($goto){
    if($this->current == $goto) return "stop";
    if($this->current > $goto) {
      $this->current--;
      return "down";
    }
    if($this->current < $goto) {
      $this->current++;
      return "up";
    }
  }
}
?>
