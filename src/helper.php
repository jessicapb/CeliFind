<?php

function dd(){
    foreach(func_get_args() as $arg){
        echo "<pre>";
            var_dump($arg);
            echo "</pre>";
        }
        die;
}

function view(string $template,array $data=null){
    if($data){
        extract($data,EXTR_OVERWRITE);
    }
    ob_start();
    require VIEWS.'/'.$template.'.view.php';
    return  ob_get_clean();
}