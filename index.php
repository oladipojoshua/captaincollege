<?php
echo 'How are you doing'; 



$name = 'ola';
$age = 33;


echo '<br/>';
echo $name;
echo '<br/>';
echo $age; 
$specual=true;
echo 'My name is '.$name.' and my age is '.$age;

$obj = new stdClass;
$obj-> first_name = 'Oyindamola';
$obj-> last_name = 'Honey';
$obj-> age = 45; 
echo '<br/>';

echo $obj->first_name;
echo '<br/>';
echo '<br/>';
echo '<br/>';

// echo dot work in array
$array1=array('fish', 67, 69, 'orange', 'egg');
echo '<br/>';
echo '<br/>';

for ($i=0; $i <count($array1); $i++) { 
   print_r($array1[$i]);
}
print_r($array1);
// print_r($array1);

echo '<br/>';
echo '<br/>';
// echo count ($array1);

// Adding more to the array
array_push($array1, 'garri', 'cassava');
$array1[0]='sewa';
// print_r ($array1);

echo '<br/>';
echo '<br/>';
echo '<br/>';

// Multi-dimensional Array
$array2=array('meat', 67, 69, 'ige', 'lola', 90, 55, 'ade', 'olu', 'tolu', 87);
// $array2_push($array2, )
// array_push($array2, 'garri', 'cassava');
// $array2[0]='sewa';

echo '<br/>';
echo '<br/>';
echo '<br/>';
$array3=array('meat', 67, 69, 'ige', 'lola', 90, 55, 'ade', 'olu', 'tolu', 87);
// here we push to array3
array_push($array3, $array2);
// print_r ($array3, $array2);
// print_r($array3[11][9] = 'Micheal');
$array3[11][3]='micheal';
print_r($array3);

echo '<br/>';
echo '<br/>';
// Associative Array

$assocarray=[
    'firstname'=>'Oyindamola',
    'lastname'=>'Babatola',
    'age'=>78
];
print_r($assocarray['firstname']);

echo '<br/>';
echo '<br/>';


function signup (){
    echo 'Hello, how are you doing?';
}

signup()
?>

