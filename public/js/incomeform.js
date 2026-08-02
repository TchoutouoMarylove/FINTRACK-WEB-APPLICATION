const recordIncomeBtn = document.getElementById("recordIncomeBtn");

const incomeModal= document.getElementById("incomeModal");

const closeModal = document.getElementById("closeModal");

recordIncomeBtn.addEventListener("click", function(){
incomeModal.style.display ="flex"


});

closeModal.addEventListener("click", function(){
  incomeModal.style.display= "none"
})

const incomeForm = document.getElementById("incomeForm");
 const messageBox = document.getElementById("message"); 
 incomeForm.addEventListener("submit",
   async function (event) { 
   event.preventDefault();  
   
    const formData = new FormData(incomeForm);
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

            } catch (error)
             { messageBox.textContent = "Something went wrong. Please try again."; 

              messageBox.classList.add("error"); 
              console.error(error); 
            }
           }
          );