<?php

require_once "../controllers/incomecontroller.php";


$result =
    $incomeController
    ->getUserIncomes();


$incomes = [];


if ($result['status'] === 'OK') {

    $incomes =
        $result['data'];

}


$totalIncome = 0;


foreach ($incomes as $income) {

    $totalIncome +=
        $income['amount'];

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Income</title>

   <link rel="stylesheet" href="../../public/css/recincomePage.css">
</head>
<body>
<div class="page">
<nav>
<div class="navInfo">
  <div>
    <div  style="font-size: 29px;
    color: skyblue"
    
    >FINTRACK</div>
</div>

   <div class="linkTopages">

   <div><a href="./UserDashboard.php"
  style="
  text-decoration: none;
  color: inherit;
  cursor: pointer;
  "

   >Dashboard</a></div>
<div>Income</div>

<div>Expenses</div>
   </div>




</div>



</nav>

<!--main section-->

<div class="mainSection">
<div class="firstMain">

<div class="mainContent">
<h2 style="color: white;">My income</h2>
<p style="color: white;" >Track and manage all your income</p>
</div>


<div class="buttonAdd"
style=" height: 50px;"
>

<button 
style="   padding: 10px;
 border-radius: 10px;
 border: none;"
> +Add Income</button>
</div>
</div>







<div class="UserIncomes">
<table>
<thead>
<tr>
<td>
  Amount
</td>
<td>source</td>
<td>Type</td>
<td>Description</td>
<td>Date</td>
  <td>Actions</td>
</tr>

</thead>
  <tbody>

 <?php if (empty($incomes) ): ?>
<tr>
     <td colspan="6" style="
text-align: center;
color: white; ">
 No income records found.

 </td>
</tr>
 <?php else: ?><?php foreach ($incomes as $income ): ?>
<tr>
    
<td><?= number_format($income['amount']) ?>FCFA</td>


<td>
    <?= htmlspecialchars(
$income['income_source']) ?>

</td>
<td>

<?= htmlspecialchars($income['income_type']) ?>

</td>

 <td>
<?= htmlspecialchars( $income['description']) ?>

</td>
   <td>

<?= htmlspecialchars($income['income_date']
) ?>

 </td>

 <td><Button type="button" 
 class="editIncomeBtn"

 data-id = "<?= $income['income_id'] ?>"
 >Edit</Button>

 <button
type="button"
class="deleteIncomeBtn"
data-id="<?= $income['income_id'] ?>">
Delete</button>

</td>
</tr>

<?php endforeach; ?>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</div> 





<script src="../../public/js/incomeform.js">



</script>

</body>
</html>








