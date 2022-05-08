window.onload = ()=>{
    const cart = JSON.parse(localStorage.getItem("cart") || "[]")
    const cartTotal = cart.reduce((a,item) => a+(item.quantity*item.price),0) 
    const total = document.getElementById("total");
    total.innerText = "$ " + (cartTotal);
    const tbody = document.getElementById("items");
    cart.forEach(item => {
        if(item.quantity > 0){
            const tr = document.createElement('tr');
            tr.id = item.id
            const sku = document.createElement('td');
            sku.innerText = item.sku;
    
            const name = document.createElement('td');
            name.innerText = item.name;
    
            const price = document.createElement('td');
            price.innerText = item.price;
    
            const quantity = document.createElement('td');
            quantity.classList.add("row");
            quantity.classList.add("mx-0");
            
            const quanity_amount = document.createElement('div');
            quanity_amount.id = `quantity-${item.id}`
            quanity_amount.innerText = item.quantity;
            quanity_amount.classList.add('col');
            quanity_amount.classList.add('text-end');
            quantity.appendChild(quanity_amount);
    
    

    
            const update = document.createElement('div');
            update.classList.add("col");
            update.classList.add("text-end");
    
            const add = document.createElement('button');
            add.id = `add-${item.id}`
            add.onclick = addQuantity
            add.classList.add('p-0');
            add.style.border = "none";
            add.style.backgroundColor = "transparent";
            if(item.quantity >= item.max_count){
                add.disabled =  true;
            }


            const remove = document.createElement('button');
            remove.id = `add-${item.id}`
            remove.onclick = removeQuantity;
            remove.classList.add('p-0');
            remove.style.border = "none";
            remove.style.backgroundColor = "transparent";
    
            const image_add = new Image();
            image_add.src = "public/images/plus-icon.png"
            image_add.width = 25;
            const image_remove = new Image();
            image_remove.src = "public/images/minus-icon.png"
            image_remove.width = 25;
    
            add.appendChild(image_add);
            remove.appendChild(image_remove);
    
            update.appendChild(add);
            update.appendChild(remove);
    
            quantity.appendChild(update);
    
            tr.appendChild(sku)
            tr.appendChild(name)
            tr.appendChild(price)
            tr.appendChild(quantity)
    
            tbody.appendChild(tr)
            const item_id = document.createElement('input');
            const item_quantity = document.createElement('input');
            item_quantity.type = "hidden";
            item_quantity.value = item.quantity;
            item_quantity.name = `products[${item.name}][quantity]`
            item_id.type = "hidden";
            item_id.value = item.id;
            item_id.name = `products[${item.name}][id]`
            tbody.appendChild(item_id);
            tbody.appendChild(item_quantity)
        }
        const form =  document.getElementById('form');
        const totalPrice = document.createElement('input')
        totalPrice.value = cartTotal;
        totalPrice.type = "hidden";
        totalPrice.name = 'total-price';

        form.appendChild(totalPrice);
        
    });  

}

function addQuantity(e){
    const cart = JSON.parse(localStorage.getItem("cart") || "[]")
    const id = e.target.parentNode.id.split('-')[1]

    const cartTotal = cart.reduce((a,item) => a+(item.quantity*item.price),0) 
    const item = cart.find((product) => product.id == id)
    const add_button = document.getElementById(`add-${id}`);


    const total = document.getElementById("total");
    total.innerText = "$ " + parseInt(cartTotal + item.price);

    const quantity = e.target.parentNode.parentNode.parentNode.firstChild;
    quantity.textContent = parseInt(quantity.innerText) + 1;
    const newCart = cart.map((item) => {
        if(item.id == id && item.quantity <= item.max_count){
            item.quantity++;
            if(item.quantity >= item.max_count){
                add_button.disabled = true;
            }
        }
        return item;
    })
    localStorage.setItem("cart",JSON.stringify(newCart));
}

function removeQuantity(e){
    const container = e.target.parentNode.parentNode.parentNode.parentNode;



    const id = e.target.parentNode.id.split('-')[1]

    const add_button = document.getElementById(`add-${id}`);
    

    const cart = JSON.parse(localStorage.getItem("cart") || "[]")

    const cartTotal = cart.reduce((a,item) => a+(item.quantity*item.price),0) 
    const item = cart.find((product) => product.id == id)
    const total = document.getElementById("total");
    const totalNow = parseInt(cartTotal - item.price);
    if(item.quantity <=1 ){
        container.remove()
    }
    total.innerText = totalNow <= 0 ? "$ 0" : "$ " + totalNow;

    const quantity = e.target.parentNode.parentNode.parentNode.firstChild;
    quantity.innerText = parseInt(quantity.innerText) > 0? (parseInt(quantity.innerText) - 1) : "0";
    const newCart = cart.map((item) => {
        if(item.id == id){

            if(item.quantity > 0){
                item.quantity--;
                if(item.quantity < item.max_count){
                    add_button.disabled = false;
                }

                return item;
            }
            
        }else{
            return item;
        }
    }).filter((item) => item.quantity > 0);
    localStorage.setItem("cart",JSON.stringify(newCart));
}