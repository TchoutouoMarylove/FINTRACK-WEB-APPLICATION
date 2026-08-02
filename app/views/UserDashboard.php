<?php
session_start();
$username = $_SESSION['username'];

?>









<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
    <link rel="stylesheet" href="../../public/css/UserDashboard.css">
</head>
<body>
<div class="page">

<div class="header">

<h2 style="
color:
">HELLO, <?= ($username)?></h2> 
 

</div>

<div class="pageProper">
<div class="side-bar">

<div class="sideContent">

<div class="topSide">
  <h3  style="color: lightblue;">FINTRACK</h3>
</div>

<div class="middleSide">
   <div id="incomeDiv">
    <a href="./home.php"
     style="
  text-decoration: none;
  color: inherit;
  cursor: pointer;
  "
    
    >Home</a>
  </div>

  <div>
    Dashboard
  </div>
  <div id="incomeDiv">
    <a href="./recincomePage.php"
     style="
  text-decoration: none;
  color: inherit;
  cursor: pointer;
  "
    
    >Income</a>
  </div>

  <div>
    Expenses
  </div>

  <div>
    Budget
  </div>
  <div>
    Transactions
  </div>
</div>


<div class="endSide">
  <div>Notification</div>
</div>
</div>







</div>

<div class="mainbar">
  
<div class="infosection">
<div class="income">
<p>Total income</p>
 <p>$90000</p>

<button id="recordIncomeBtn"> + Record income</button>




</div>
<div>
<p>Total expenses</p>
 <p>$240000</p>

<button id="recordIncomeBtn"
> - Record expenses</button>

</div>
<div>
<p>Total balance</p>
 <p>$255000</p>


</div>
<div>
<p>Budget Status</p>

<p>Within status
</p>
<button>Record Budget</button>

</div>
</div>



<div class="transactionDetails">
 <div class="transanctionProper">


  <div style="color: white; ">RECENT TRANSACTION</div>

<table class="table">
<thead class="info">
<tr>
  <td>Date</td>
  <td>Description</td>
  <td>Category</td>
  <td>Amount</td>
  <td>Type</td>
</tr>

</thead>

<tbody>
<tr>
<td>2025-03-17</td>
<td>Monthly Salary</td>
<td>Salary</td>
<td>Income</td>
<td>+100,000</td>




</tr>

</tbody>

</table>
 </div>



</div>



</div>


</div>
</div>  



<!--The INCOME MODAL-->

<div id="incomeModal" class="modal-income">
  <div class="income-form">

<h2 style="color: white;font-size: 30px;">Record Income</h2>
<br>
<form id="incomeForm"   action="" method="POST">
<div>
<label for="">Amount</label>
<br>
<input type="number" name="amount" id="" placeholder="Enter the amount" required>

</div>
<br>

<div>

<label for="">Income source</label>

<input type="text" placeholder="e.g Employer"
name="incomeSource" required>
</div>
<br>
<div>
  <label for="">Income Type</label>
  <br>
 <select name="incomeType" id="incomeType" required >
  <option value="Salary">Salary</option>
  <option value="Business">Business</option>
  <option value="Freelance">Freelance</option>
  <option value="Investment">Investment</option>
  <option value="Gift">Gift</option>
  <option value="others">others</option>
 </select>

</div>
<br>
<div>
<label for="">Description</label>
<br> 
<input type="text" name="description" required>

</div>
<br>
<div>
<label for="">Date</label> <br>
<input type="date" name="date" id="">

</div>
<br><br>
<div id="message">


</div>
<div>
<button type="submit"
style="width: 140px;
height: 30px;"
>Save income</button>
<!-- <button type="submit"
style="width: 140px;
height: 30px;"
>Cancel Income</button> -->



</div>
<br>
<button id="closeModal" type="button">X</button>

</form>
 </div>
</div>

<script src="../../public/js/incomeform.js">

  
// document.getElementById("incomeDiv").addEventListener("click", function(){
//    window.location.href ="./recincomePage.php"
// })

</script>
</body>
</html>

