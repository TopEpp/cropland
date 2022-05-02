<?php 

function getYear(){
    return [2565,2564,2563];
}

function utilization_type($id){
    if ($id != ''){
        $data = [
            '1'=>'ทำปีปัจจุบัน',
            '2'=>'ไร่หมุนเวียน',
            '3'=>'ไม่ได้ทำประโยชน์',
        ];
    
        return $data[$id];
    }
    return '';
 
}


function land_use_type($id){
    if ($id != ''){
        $data = [
            '1'=>'ทำเอง',
            '2'=>'ให้ผู้อื่นเช่า',            
        ];
    
        return $data[$id];
    }
    return '';
 
}

function land_water_process($id){
    if ($id != ''){
        $data = [
            '1'=>'ดิน',
            '2'=>'น้ำ',            
        ];
    
        return $data[$id];
    }
    return '';
}