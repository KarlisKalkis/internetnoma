var searchButton = document.getElementById("search-button");
searchButton.addEventListener("click", function() {
  var searchInput = document.getElementById("search-input").value;
  var searchedElements = document.getElementsByClassName(searchInput);
  for (var i = 0; i < searchedElements.length; i++) {
    if (searchedElements[i].id === searchInput) {
      console.log(searchedElements[i]);
    }
  }
});

// Shopping cart js
import { add, total } from 'cart-localstorage' 

add({id: 1, name: "Product 1", price: 100})
add({id: 2, name: "Product 2", price: 100}, 2)

console.log(total()) 

cartLS.add({id: 1, name: "Product 1", price: 100})
cartLS.add({id: 2, name: "Product 2", price: 100}, 2)
cartLS.add({id: 4, name: "Product 4", price: 100}, 4)

console.log(cartLS.total()) 

const myproduct = {id: 3, name: "Vans", price: 75}
add(myproduct, 2)
get(1)

exists(21)

list()

remove(1)
update(1,'price',200)
quantity(22,-1) 
total()

destroy()