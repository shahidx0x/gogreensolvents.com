fetch("products.json")

.then(function(response){
   return response.json();
})
.then(function(products){

   let placeholder = document.querySelector("#products-data");
   let product_card = "";
   for(let product of products){
      product_card += `       
      <div class="card" style="width: 18rem; margin:0.5em;">
        <img class="card-img-top" src="${product.imge}" alt="Card image cap">
        <div class="card-body">
            <h5>${product.Product_Name}</h5>
            <a type="button" class="btn btn-link" href="${product.URL}#${product.id}">Read More</a>
        </div>
      </div>
      `;
   }

   placeholder.innerHTML = product_card;
})

