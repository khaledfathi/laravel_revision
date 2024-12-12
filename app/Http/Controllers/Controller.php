<?php  

namespace App\Http\Controllers;

use Exception;

abstract class Controller {

    public function idStringToInt(string $id):int{
        try {
            return (int)$id; 
        }catch (Exception $e){
            return 0;
        }
    }
}
