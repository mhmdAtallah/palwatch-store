
const toggle = document.getElementById("auth-link"); 
const dropdown = document.getElementById("dropdown"); 
let showDropdown  = false; 


function toggleDropdown() { 
    showDropdown = !showDropdown

    if(showDropdown) { 
    dropdown.style.visibility="visible";

    }else  { 
    dropdown.style.visibility="hidden";

    }

}

toggle.addEventListener('click' , toggleDropdown)