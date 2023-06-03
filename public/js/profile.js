const editBtn = document.getElementById("edit-btn") ; 
const form = document.getElementById("edit-form") ; 
const main = document.getElementById("main") ; 

 




editBtn.addEventListener('click' , ()=>{ 
form.style.display="block"
main.style.display="none"
})



form.addEventListener('submit' , ()=>{ 
    form.style.display="none"
    main.style.display="block"
    })