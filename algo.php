1. Bubble Sort
  $arr = [1,99,3,6,345,45,100,68,90,36,72];
  $len = count($arr); 

  echo "Before Sorting \n"; 
  print_r($arr); 
  echo "\n"; 

  for($i=0; $i < $len; $i++){ 
    for($j=0; $j < $len - 1 - $i; $j++){ 
      
      //swap values for sorting
      if($arr[$j] > $arr[$j + 1]){ 
        $temp = $arr[$j]; 
        $arr[$j] = $arr[$j + 1]; 
        $arr[$j + 1] = $temp; 
      } 
    } 
  } 

  echo "After Sorting \n"; 
  print_r($arr);

