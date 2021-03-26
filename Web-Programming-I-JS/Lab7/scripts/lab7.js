// Create a public method called addPrice(). This method will add the price of thegum to the shopping cart total.

function addPrice(name) {
    let c;
    let n;
    for(let i=0;i<4;i++){
        if(brands[i].brand===name){
            c=brands[i].price;
        }
    }
    let p = parseFloat(document.getElementById("total").innerHTML);
    p+=c;
    document.getElementById("total").innerHTML = p;

    let i = parseInt(document.getElementById("item").innerHTML);
    i+=1;
    document.getElementById("item").innerHTML = i;
}
// Create a public method called clear(). This method will set the Shopping CartTotal and Shopping Cart Items to 0.

function clear() {
    document.getElementById("total").innerHTML = 0;
    document.getElementById("item").innerHTML = 0;

}
// Create a private array that contains objects that describe the gum brands and theprices.

var brands = [{ brand: "extra", price: 1.50 },
{ brand: "trident", price: 1.00 },
{ brand: "doubleMint", price: 1.50 },
{ brand: "bubble", price: 2.00 }];

// Add a click event to the Extra gum image that will execute the addPrice() method.

document.getElementById("extra").addEventListener("click", function () { addPrice("extra"); });


// Add a click event to the Double Mint gum image that will execute the addPrice()method.

document.getElementById("doubleMint").addEventListener("click", function () { addPrice("doubleMint"); });


// Add a click event to the Trident gum image that will execute the addPrice()method.

document.getElementById("trident").addEventListener("click", function () { addPrice("trident"); });


// Add a click event to the Bubble Gum image that will execute the addPrice()method.

document.getElementById("bubble").addEventListener("click", function () { addPrice("bubble"); });


// Add a click event to the Clear button to set the Shopping Cart Items and ShoppingCart Total to 0.

document.getElementById("clear").addEventListener("click", function () { clear("clear"); });