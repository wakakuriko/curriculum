<?php

class Streamer{
    public $name;
    public $type;
    public $listenerNumber;
    public $rate;

    public function __construct($name,$type,$listenerNumber,$rate){
        $this ->name =$name;
        $this ->type =$type;
        $this ->listenerNumber =$listenerNumber;
        $this ->rate = $rate;

    }

    public function sayMyName(){
        echo '私は'.$this->name.'です';
        echo '<br>';
    }
    
    public function type(){
        echo $this->type.'系です';
        echo '<br>';
    }

    public function listenerNumber(){
        echo '平均リスナー数は'.$this ->listenerNumber.'人です';
        echo '<br>';
    }

    public function rate(){
        echo $this->rate;
        echo '<br>';
    }

    public function hosting(){
        $this->listenerNumber += 10;
        echo $this->listenerNumber;
        echo '<br>';
    }
}

$sutanmi = new Streamer("スタンミ","normal",2000,'diamond');
$sutanmi -> sayMyName();
$sutanmi -> listenerNumber();
$sutanmi -> type();
$sutanmi -> rate();

$ketsuyabe = new Streamer('けつすたいる','G',60,'KR MASTER');
$ketsuyabe -> sayMyName();
$ketsuyabe -> listenerNumber();
$ketsuyabe -> type();
$ketsuyabe -> rate();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();
$ketsuyabe ->hosting();






















?>