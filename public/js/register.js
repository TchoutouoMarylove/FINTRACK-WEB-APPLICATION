const registerForm = document.getElementById("registerForm"); const messageBox = document.getElementById("message"); registerForm.addEventListener("submit", async function (event) { 
   event.preventDefault();  
   
    const formData = new FormData(registerForm);
     try {  
       const response = await fetch( window.location.href, { method: "POST", body: formData } );  
       
       const result = await response.json();

         messageBox.textContent = result.message;  
        messageBox.classList.remove("success", "error");   
         if (result.status === "OK") { messageBox.classList.add("success");

          } else { messageBox.classList.add("error"); }  setTimeout(function () { messageBox.textContent = ""; messageBox.classList.remove("success", "error"); }, 3000); } catch (error) { messageBox.textContent = "Something went wrong. Please try again."; messageBox.classList.add("error"); console.error(error); } });