<?php



function Getprice($price){

   $price = floatval($price);
   return number_format($price, 0, ',', ' ') . ' DA';
   
}

