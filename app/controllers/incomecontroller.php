<?php
session_start();
require_once "../../config/db.config.php";
require_once "../models/incomemodel.php";


$income = new income($conn);

class incomeController{
public function createIncome(array $data){
      global $income;
      if (!isset($_SESSION['id'])) {

                return [
                    'status' => 'error',
                    'message' => 'User is not logged in'
                ];

            }
    $user_id = $_SESSION['id'];

      $amount = $data['amount'] ?? '';
    $income_source = $data['incomeSource'] ?? '';
    $income_type = $data['incomeType'] ?? '';
    $description = $data['description'] ?? '';
    $date =  $data['date'] ?? '';

    if(empty($amount)){
      return['status'=> 'error',
      'message' =>'amount is required'];
    }elseif(empty($income_source)){
    return['status'=> 'error',
      'message' =>'income source is required'];
    }elseif(empty($income_type)){
      return['status'=> 'error',
      'message' =>' income type is required is required'];
    }elseif(empty($date)){
      return['status'=> 'error',
      'message' =>'the date is required is required is required'];

    }else{
      $data['user_id'] = $user_id;
      return $income ->create($data);
    }


}


   public function getUserIncomes()
    {
        global $income;


        if (!isset($_SESSION['id'])) {

            return [
                'status' => 'error',
                'message' =>
                    'User is not logged in'
            ];

        }


        $user_id =
            $_SESSION['id'];


        return $income->getUserIncomes(
            $user_id
        );
    }









}

$incomeController = new incomeController();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    header('Content-Type: application/json');

    $result = $incomeController->createIncome($_POST);

    echo json_encode($result);

    exit();
}








?>