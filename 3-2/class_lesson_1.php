<?php

class Taiyaki{
    public $content;

    public function __construct($content_data){
        $this ->content = $content_data;
        //このクラスのcontent($content)は$content_data
    }

    public function whatIsContent(){
        echo '中身は'.$this->content.'だよ。<br>';
    }
}

$taiyaki_1 = new Taiyaki("あんこ");
$taiyaki_2 = new Taiyaki("カスタード");
$taiyaki_3 = new Taiyaki("ずんだ");

$taiyaki_1 ->whatIsContent();
$taiyaki_2 ->whatIsContent();
$taiyaki_3 ->whatIsContent();




?>