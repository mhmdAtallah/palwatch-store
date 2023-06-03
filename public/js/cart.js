 let showCart = false ; 
const cart= document.getElementById("cart")
const cartList= document.getElementById("cart-list")
const cartHeader= document.getElementById("cart-header")
const cartName= document.getElementById("cart-name")



function toggleCart() { 
    if(!showCart)  {
        cartList.classList.add("show")
        cartList.classList.remove("hide");
        cart.classList.remove("collapse");
        cart.classList.add("cart")
        cart.style.transition= " ease .7s"
        cartName.innerHTML="&ensp; Hide Cart"


    }else { 
   cartList.classList.add("hide")
   cartList.classList.remove("show");
   cart.classList.add("collapse")
   cart.style.transition= " ease .7s"
   cartName.innerHTML="&ensp; Show Cart"



    }
    showCart= !showCart; 
}



cartHeader.addEventListener('click'  , toggleCart);


window.addEventListener('load' , ()=> {
     showCart = false ; 
     console.log("loaded");
})
