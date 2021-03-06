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
    $tmp = explode(',',$id);
    $data = [
        '1'=>'ทำเอง',
        '2'=>'ให้ผู้อื่นเช่า',            
    ];
    $res = [];
    foreach ($tmp as $key => $value) {   
        if (!empty($data[$value])){
            $res[$key] = $data[$value];
        }
         
    }
    
    return implode(',',$res);
 
}

function land_water_process($id){
    if (!empty($id)){
        $tmp = explode(',', $id);   
     
        $data = [
            '1'=>'ดิน',
            '2'=>'น้ำ',            
        ];
        if (count($tmp) == 2){
            
            return $data[$tmp[0]].'/'.$data[$tmp[1]];
        }

        return $data[$tmp[0]];
    }
    return '';
 
  

}

function house_person_type($id){
    if ($id != ''){
        $data = [
            '1'=>'บัตรประชาชน',
            '2'=>'บัตรต่างดาว',            
        ];
    
        return $data[$id];
    }
    return '';
}

function calculate_age($birthday){
    
    if($birthday!=""){
        $today = new DateTime();
        $diff = $today->diff(new DateTime($birthday));
        if ($diff->y)
        {
            return  array('Y'=>$diff->y,'M'=>$diff->m,'D'=>$diff->d);
        }
        elseif ($diff->m)
        {
            return array('Y'=>0,'M'=>$diff->m,'D'=>$diff->d);
        }
        else
        {
            return array('Y'=>0,'M'=>0,'D'=>$diff->d);
        }
    }
}