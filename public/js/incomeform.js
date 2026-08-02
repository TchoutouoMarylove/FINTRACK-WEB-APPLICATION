const recordIncomeBtn = document.getElementById("recordIncomeBtn");


const incomeModal= document.getElementById("incomeModal");

const closeModal = document.getElementById("closeModal");

if (recordIncomeBtn) {

    recordIncomeBtn.addEventListener("click",function () {
  incomeModal.style.display = "flex";
 }
);

}

if (closeModal) {
  closeModal.addEventListener("click",function () {
 incomeModal.style.display = "none";
} );

}

const incomeForm = document.getElementById("incomeForm");
 const messageBox = document.getElementById("message"); 
 incomeForm.addEventListener("submit",
   async function (event) { 
   event.preventDefault();  
   
const formData = new FormData(incomeForm);

formData.append(
"action",
"create"
);

try {  
      
const response = await fetch( "../../app/controllers/incomecontroller.php",
 { method: "POST", 
body: formData } );  
       
const result = await response.json();
       

       
       

 messageBox.textContent = result.message;  
 messageBox.classList.remove("success", "error");   
if (result.status === "OK") 
{ messageBox.classList.add("success");
} else { messageBox.classList.add("error"); } 

//  setTimeout( function () {
 //    messageBox.textContent = ""; 
 //    messageBox.classList.remove("success", "error"); }, 3000); 

}catch (error)
{ messageBox.textContent = "Something went wrong. Please try again."; 
messageBox.classList.add("error"); 
console.error(error); 
}
 }
);




const deleteButtons = document.querySelectorAll( ".deleteIncomeBtn");


deleteButtons.forEach(function (button) {

button.addEventListener("click", async function () {

const incomeId = button.dataset.id;
console.log("Income ID:", incomeId);

const confirmDelete = confirm( "Are you sure you want to delete this income?");

if (!confirmDelete) {

  return;
}
  const formData =new FormData();


formData.append( "action","delete");

formData.append( "income_id", incomeId);
try {
  const response = await fetch("../../app/controllers/incomecontroller.php",
{method: "POST",
body: formData
 }
);



console.log(
"Response status:",
response.status
);

const text =
await response.text();
console.log(
"Raw response:",
text
);

const result =
JSON.parse(text);



console.log(
"Delete result:",
result
);



/* CHECK RESULT */

if (
result.status === "OK"
) {


alert(
result.message
);


/* REFRESH PAGE */

window.location.reload();


} else {


alert(
result.message
);

}


} catch (error) {


console.error(
"Delete error:",
error
);


alert("Something went wrong while deleting the income."
);

}

}
);

}
);