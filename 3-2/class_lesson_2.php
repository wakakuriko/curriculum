<?php

class Enemy{
    public $name;
    public $stamina;
    public $attack;
    

    public function __construct($name_data,$stamina_data,$attack_data){
        $this->name =$name_data;
        $this->stamina =$stamina_data;
        $this->attack =$attack_data;
        echo '-----------------------<br>';
    }

    public function sayName(){
        echo $this->name.'が現れた！<br>';
    }

    public function showStatus(){
        echo '名前は'.$this->name.'です<br>';
        echo 'スタミナは'.$this->stamina.'です<br>';
        echo '攻撃力は'.$this->attack.'です<br>';
    }
}

$slime = new Enemy("スライム",30,10);
$slime -> sayName();
$slime -> showStatus();

class Boss extends Enemy{
    public function powerUp(){
        $this ->attack +=50;
        echo $this ->name.'は力をためている。<br>';
    }

    public function sayName(){
        echo 'ボスの',$this->name.'現れた!!<br>';
    }    

}

$golem = new Boss('ゴーレム',250,30);
$golem->sayName();
$golem->powerUp();
$golem->showStatus();

?>