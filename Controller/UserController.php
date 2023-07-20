<?php
    class UserController extends BaseController{
        
        public function listAction(){
            $requestMethod = $_SERVER["REQUEST_METHOD"];
            $stringParamsArray = $this->geStringParams();

            if(strtoupper($requestMethod)  == 'GET'){
                try {
                    $userModel = new UserModel();
                    $intLimit = 10;

                    if(isset($stringParamsArray['limit']) && $stringParamsArray['limit']){
                        $intLimit = $stringParamsArray['limit'];
                    }

                    $userArray = $userModel->getUsers($intLimit);
                    $responseData = json_encode($usersArray);
                } catch (Throwable $th) {
                    throw $th->getMessage();
                    return;
                }
            }else{
                $errorDescription = 'Metodo não suportado';
                $errorHeader = 'HTTP/1.1 422 Unprocessable Entity';
                $this->sendOutput(
                    json_encode(array('error' => $errorDescription)),
                    array('Content-Type: application/json', $errorHeader)
                );
                return;
            }

            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        }
    }
?>