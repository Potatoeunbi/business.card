<?php

namespace application\controllers;

class SaltController{
    public function Salt($arr){

        $count = count($arr);   
        $num = $this->factorial($count);
        $mod =unpack("I",$arr[1])[1] % $num;
        for($i1=0; $i1<$count; $i1++) {
            for($i2=0; $i2<$count; $i2++) {
                for($i3=0; $i3<$count; $i3++) {
                    for($i4=0; $i4<$count; $i4++){
                        for($i5=0; $i5<$count; $i5++){
                            if($i1 == $i2 || $i1 == $i3 || $i1 == $i4 || $i1 == $i5
                            || $i2 == $i3 || $i2 == $i4 || $i2 == $i5
                            || $i3 == $i4 || $i3 == $i5
                            || $i4 == $i5
                            )
                            continue;
                            $saltString[] = $arr[$i1].$arr[$i2].$arr[$i3].$arr[$i4].$arr[$i5];
                        }
                    }
                }
            }
        }
        return hash('sha256', "$saltString[$mod]");
    }

    public function factorial($num){
        $result = 1;
        for($i=1; $i<=$num; $i++) {
            $result = $result * $i;
        }
        
        return $result;
    }
}