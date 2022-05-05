const cart = document.getElementById("cart");
const count = document.getElementById("count");

window.onload = () =>{
    const currentCart = JSON.parse(localStorage.getItem("cart") || "[]")
    if(currentCart.length > 0){
        cart.classList.remove("visually-hidden");
        count.innerText = "" + currentCart.reduce((a,b) => a + b.quantity,0)
    }
}

function addToCart(e){
    const currentCart = JSON.parse(localStorage.getItem("cart") || "[]")
    const item = e.target.parentNode.parentNode;
    const values = Array.from(item.querySelectorAll(`#sku-${item.id},#name-${item.id},#price-${item.id},#description-${item.id}`),item => item.textContent.trim());
    let obj = {
        "id" : item.id,
        "sku" : values[0],
        "name" : values[1],
        "price" : values[2],
        "description" : values[3],
        "quantity" : 1
    }
    
    let notExists = currentCart.filter(product => product.id == item.id);
    let newCart = notExists.length == 0 ? currentCart.concat(obj) : currentCart.map((product) => {
        if(product.id == item.id){
            product.quantity++
        }
        return product;
    })
    localStorage.setItem("cart",JSON.stringify(newCart));

    cart.classList.remove("visually-hidden");
    count.innerText = "" + (parseInt(count.innerText || 0) + 1) 

}   