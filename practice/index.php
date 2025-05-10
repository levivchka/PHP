<?php 
    $a = 5;
    $_m = 'f';
    $D = 9;

    $a = 2;
    $b = '2';

    echo  ($a + $b);

    $f = (string)$D;
    $m =(int)$_m;
    //echo gettype($f);
    // print_r($D);
    // var_dump($m);       
     
     define("pi", 3.148738473);
     //echo pi;

     $c = 3.7;
     $e = 3.4;

     echo "c = $c<BR>";
     echo "e = $e<BR>";
     echo 'floor: $c = '.floor($c).', $e = '.floor($e).'<BR>';

     //классы

     class Cat{
        public $name;
        public $color;
        public $weight;

        public function sayMau(){
            return 'Mau. I`m '.$this->name;
        }
     }

     $cat1 = new Cat;
     $cat1->name ='Murka'; //обратились к свойству 
    echo $cat1->sayMau();
    echo 'BR';
    var_dump($cat1);


     //регулярные выражения

