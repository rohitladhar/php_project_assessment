<?php 
$file = fopen("products_comma_separated.csv","r");
$result = [];
while(!feof($file))
{
    $elm = fgetcsv($file);
    $single_elm = [
        "make"=>"Not Applicable",
        "model"=>"Not Applicable",
        "colour"=>"Not Applicable",
        "capacity"=>"Not Applicable",
        "network"=>"Not Applicable",
        "grade"=>"Not Applicable",
        "condition"=>"Not Applicable",
        "count"=>0
    ];
    for($i=0;$i<count($elm);$i++){
        
        if($i==0){
            $single_elm['make'] = $elm[$i];
        }
        if($i==1){
            $single_elm['model'] = $elm[$i];
        }
        if($i==5){
            $single_elm['colour'] = $elm[$i];
        }
        if($i==4){
            $single_elm['capacity'] = $elm[$i];
        }
        if($i==6){
            $single_elm['network'] = $elm[$i];
        }
        if($i==3){
            $single_elm['grade'] = $elm[$i];
        }
        if($i==2){
            $single_elm['condition'] = $elm[$i];
        }
       
    } 
    if($elm[0]!=="brand_name"){
        array_push($result,$single_elm);
    }
}

fclose($file);
$final_result = [];
$helper = [
    "make"=>"Not Applicable",
    "model"=>"Not Applicable",
    "colour"=>"Not Applicable",
    "capacity"=>"Not Applicable",
    "network"=>"Not Applicable",
    "grade"=>"Not Applicable",
    "condition"=>"Not Applicable",
    "count"=>1
];
$path = 'combination_count.csv';

//print_r(count($result));
for($i=0;count($result);$i++){
    if($i==0){
        $elm = $result[$i];
        $helper = [
            "make"=>$elm["make"],
            "model"=>$elm["model"],
            "colour"=>$elm["colour"],
            "capacity"=>$elm["capacity"],
            "network"=>$elm["network"],
            "grade"=>$elm["grade"],
            "condition"=>$elm["condition"],
            "count"=>1
        ];
    }

    $ele = $result[$i];
    if($helper["make"]==$ele["make"]){
        if($helper["model"]==$ele["model"]){
            if($helper["colour"]==$ele["colour"]){
                if($helper["capacity"]==$ele["capacity"]){
                    if($helper["network"]==$ele["network"]){
                        if($helper["grade"]==$ele["grade"]){
                            if($helper["condition"]==$ele["condition"]){ 
                                $helper["count"] = $helper["count"] + 1;  
                            }
                            else{
                                $fp = fopen($path, 'a'); 
                                fputcsv($fp, array_values($helper));
                                $helper = [
                                    "make"=>$ele["make"],
                                    "model"=>$ele["model"],
                                    "colour"=>$ele["colour"],
                                    "capacity"=>$ele["capacity"],
                                    "network"=>$ele["network"],
                                    "grade"=>$ele["grade"],
                                    "condition"=>$ele["condition"],
                                    "count"=>1
                                ];
                            }
                        }
                        else{
                            $fp = fopen($path, 'a'); 
                            fputcsv($fp, array_values($helper));
                            $helper = [
                                "make"=>$ele["make"],
                                "model"=>$ele["model"],
                                "colour"=>$ele["colour"],
                                "capacity"=>$ele["capacity"],
                                "network"=>$ele["network"],
                                "grade"=>$ele["grade"],
                                "condition"=>$ele["condition"],
                                "count"=>1
                            ];
                        }
                    }
                    else{
                        $fp = fopen($path, 'a'); 
                        fputcsv($fp, array_values($helper));
                        $helper = [
                            "make"=>$ele["make"],
                            "model"=>$ele["model"],
                            "colour"=>$ele["colour"],
                            "capacity"=>$ele["capacity"],
                            "network"=>$ele["network"],
                            "grade"=>$ele["grade"],
                            "condition"=>$ele["condition"],
                            "count"=>1
                        ];
                    }
                }
                else{
                    $fp = fopen($path, 'a'); 
                    fputcsv($fp, array_values($helper));
                    $helper = [
                        "make"=>$ele["make"],
                        "model"=>$ele["model"],
                        "colour"=>$ele["colour"],
                        "capacity"=>$ele["capacity"],
                        "network"=>$ele["network"],
                        "grade"=>$ele["grade"],
                        "condition"=>$ele["condition"],
                        "count"=>1
                    ];
                }
            }
            else{
                $fp = fopen($path, 'a'); 
                fputcsv($fp, array_values($helper));
                $helper = [
                    "make"=>$ele["make"],
                    "model"=>$ele["model"],
                    "colour"=>$ele["colour"],
                    "capacity"=>$ele["capacity"],
                    "network"=>$ele["network"],
                    "grade"=>$ele["grade"],
                    "condition"=>$ele["condition"],
                    "count"=>1
                ];
            }
        }
        else{
            $fp = fopen($path, 'a'); 
            fputcsv($fp, array_values($helper));
            $helper = [
                "make"=>$ele["make"],
                "model"=>$ele["model"],
                "colour"=>$ele["colour"],
                "capacity"=>$ele["capacity"],
                "network"=>$ele["network"],
                "grade"=>$ele["grade"],
                "condition"=>$ele["condition"],
                "count"=>1
            ];
        }
    } 
    else{
        if(strlen($ele["make"])==0){
            break;  
        }
        $fp = fopen($path, 'a'); 
        fputcsv($fp, array_values($helper));
        $helper = [
            "make"=>$ele["make"],
            "model"=>$ele["model"],
            "colour"=>$ele["colour"],
            "capacity"=>$ele["capacity"],
            "network"=>$ele["network"],
            "grade"=>$ele["grade"],
            "condition"=>$ele["condition"],
            "count"=>1
        ];
    }
}
fclose($fp);
echo "end of program";
?>

