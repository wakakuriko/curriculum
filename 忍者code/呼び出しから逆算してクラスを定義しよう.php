<?php

class NINJA{
    public $mondai;
    public $start;

    public function __construct($mondai,$start){
        $this->mondai = $mondai;
        $this->start = $start;
    }

    public function render(){
        echo $this->mondai.$this->start;
    }
}

$ninja = new NINJA('PHPの問題集', 'スタート！');
$ninja->render();



?>

