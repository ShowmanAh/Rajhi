<?php
namespace App\Http\Controllers\Api;
trait ApiResponseTrait{

    protected $paginate_number = 10;
    public function apiResponse($data=null, $error=null,$code=200){
        $array = [
              'data' => $data,
              'status' => in_array($code, $this->successCode()) ? true : false,
              'error' => $error
        ];
        return response($array, $code);
    }
    public function createdResponse($data){
        return $this->apiResponse($data, null, 201);
    }
    public function notFoundResponse(){
        return $this->apiResponse(null, 'not found item', 404);
    }
    public function unKnownError(){
        return $this->apiResponse(null, 'un known error', 520);
    }
    public function successCode(){
        return [
           200, 201, 202
        ];
    }
}

?>
