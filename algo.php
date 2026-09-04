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

  ***************************************************************************
  For ASC/DESC
  function sortNum($sortType){
		$arr = [1,3,5,7,3,1,2,67,454,135,90,7];
		$len = count($arr);

		if($sortType=='ASC'){
			for($i=0; $i<$len;$i++){
				for($j=0;$j< $len - 1 - $i; $j++){
					if($arr[$j] > $arr[$j + 1])	{
						$temp = $arr[$j];
						$arr[$j] = $arr[$j + 1];
						$arr[$j + 1] = $temp;
					}
				}
			}
		}
		else{
			for($i = 0; $i < $len; $i++){
				for($j = 0; $j < $len - 1 - $i; $j++){
					if($arr[$j] < $arr[$j + 1]){
						$temp = $arr[$j];
						$arr[$j] = $arr[$j + 1];
						$arr[$j + 1] = $temp;
					}
				}
			}
		}

		return $arr;
	}

	print_r(sortNum('DESC'));


2. Reverse String Elements

  //Reverse string elements 
  $str = "Hello World"; 

  //count the string elements 
  $len = strlen($str); 

  $reversed = ""; 

  //Place the cursor at the last element, travel backwards and append 
  for($i = $len - 1; $i >= 0; $i--){ 
    $reversed .= $str[$i]; 
  } 

  echo $reversed;


3. Find the Occurrence of duplicate Element in Array

$arr = [2,45,3,6,8,1,9,10,2,11,3,89];
$found = []; 

foreach($arr as $key=>$val){ 

  if(isset($found[$val])){ 
    echo "Found Value $val at index $key \n"; 
  } 
  
  $found[$val] = true; 

}
