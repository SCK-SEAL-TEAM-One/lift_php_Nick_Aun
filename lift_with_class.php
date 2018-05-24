<?php

class Lift {
  private $max_weight = 1000;
  private $weight = 100;
  private $current = 1;

  public function Move($goto) {
    while ($this->current != $goto) {
        if ($this->isOverload()) {
            echo "stop";
            return;
        }

        echo $this->current . " ";

        $state = $this->checkState($goto);
        $this->current += $state;

        echo $this->stateToString($state) . "\n";
    }

    echo $goto . " stop";
  }

  private function isOverload() {
    return ($this->weight > $this->max_weight);
  }

  private function checkState($goto){
    if($this->current == $goto) return 0;
    if($this->current > $goto) return -1;
    if($this->current < $goto) return 1;
  }

  private function stateToString($state) {
    switch ($state) {
      case 1: return "up";
      case 0: return "stop";
      case -1: return "down";
    }
  }
}

$lift = new Lift();
$lift->Move(5);

?>
