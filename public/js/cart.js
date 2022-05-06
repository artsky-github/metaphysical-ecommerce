const cart = document.getElementById("cart");
const count = document.getElementById("count");

window.onload = () =>{
    const flash = document.getElementById("flash");
    const flash_content = document.getElementById("flash-message")

    if(getCookie("Success") != null){
        flash.classList.remove("visually-hidden");
        flash.classList.add("alert-success")
        localStorage.clear();
        flash_content.innerText = getCookie("Success");
        setTimeout(()=>{
            flash.classList.add("visually-hidden");
            flash_content.innerText='';
        },5000)
    }

    const currentCart = JSON.parse(localStorage.getItem("cart") || "[]")
    
    if(currentCart.length > 0){
        cart.classList.remove("visually-hidden");
        count.innerText = "" + currentCart.reduce((a,b) => a + b.quantity,0)
    }
}
function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 
function addToCart(e){
    const currentCart = JSON.parse(localStorage.getItem("cart") || "[]")
    const item = e.target.parentNode.parentNode;
    const values = Array.from(item.querySelectorAll(`#sku-${item.id},#name-${item.id},#price-${item.id},#description-${item.id}`),item => item.textContent.trim());
    let obj = {
        "id" : item.id,
        "sku" : values[0],
        "name" : values[1],
        "price" : parseInt(values[2].split('$')[1]),
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