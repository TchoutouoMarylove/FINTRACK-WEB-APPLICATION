<?php

class income{
private object $conn;

public int $income_id;
public int $user_id;
public int $amount;
public string $income_source;
public string $income_type;
public string $description;
public string $income_date;

public function __construct($dbconn){

$this->conn = $dbconn;
}

public function create(array $input){
        $user_id = $input['user_id'];
      $amount = $input['amount'];
      $income_source = $input['incomeSource'];
      $income_type = $input['incomeType'];
      $description = $input['description'];
      $date =  $input['date'];

      $query = "INSERT INTO income(user_id,amount,income_source,income_type,description,income_date) VALUES(?,?,?,?,?,?)";

      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("iissss",$user_id,$amount,$income_source,$income_type,$description,$date);

      if(!$stmt->execute()){
        return['status' => 'error', 'message'=>'Failed to record income: '. $stmt->error];
        }else{

        return['status' => 'OK',
        'message' => 'income created successfully'];
        }
}

public function getUserIncomes($user_id){
$query = "SELECT
income_id,
user_id,
 amount,
 income_source,
income_type,
description,
income_date
FROM income
 WHERE user_id = ?
ORDER BY income_date DESC";


        $stmt = $this->conn->prepare($query);


        // if (!$stmt) {

        //     return [
        //         'status' => 'error',
        //         'message' =>
        //             'Failed to prepare query: '
        //             . $this->conn->error
        //     ];

        // }


        $stmt->bind_param(
            "i",
            $user_id
        );


        if (!$stmt->execute()) {

            return [
                'status' => 'error',
                'message' =>
                    'Failed to retrieve incomes: '
                    . $stmt->error
            ];

        }


        $result = $stmt->get_result();


        $incomes = [];


        while (
            $row = $result->fetch_assoc()
        ) {

            $incomes[] = $row;

        }


        return [
            'status' => 'OK',
            'data' => $incomes
        ];
    }



















}





















?>