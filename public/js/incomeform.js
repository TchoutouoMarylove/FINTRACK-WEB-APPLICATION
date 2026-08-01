const recordIncomeBtn = document.getElementById("recordIncomeBtn");

const incomeModal= document.getElementById("incomeModal");

const closeModal = document.getElementById("closeModal");

recordIncomeBtn.addEventListener("click", function(){
incomeModal.style.display ="flex"

closeModal.addEventListener("click", function(){
  incomeModal.style.display= "none"
})



});



