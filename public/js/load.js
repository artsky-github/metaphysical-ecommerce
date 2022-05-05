window.onload = ()=>{

    const items = JSON.parse(localStorage.getItem("cart") || "[]")
    const tbody = document.getElementById("items");
    items.forEach(item => {
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
    });
    

}
function addQuantity(e){
    const id = e.target.parentNode.id.split('-')[1]
    const cart = JSON.parse(localStorage.getItem("cart") || "[]")
    const quantity = e.target.parentNode.parentNode.parentNode.firstChild;
    quantity.textContent = parseInt(quantity.innerText) + 1;
    const newCart = cart.map((item) => {
        if(item.id == id){
            item.quantity++;
        }
        return item;
    })
    localStorage.setItem("cart",JSON.stringify(newCart));
}

function removeQuantity(e){
    const id = e.target.parentNode.id.split('-')[1]
    const cart = JSON.parse(localStorage.getItem("cart") || "[]")
    const quantity = e.target.parentNode.parentNode.parentNode.firstChild;
    quantity.innerText = parseInt(quantity.innerText) > 0 ? (parseInt(quantity.innerText) - 1) : "0";
    const newCart = cart.map((item) => {
        if(item.id == id){
            if(item.quantity > 0){
                item.quantity--;
            }
        }
        return item;
    })
    localStorage.setItem("cart",JSON.stringify(newCart));
}