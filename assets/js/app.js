fetch("industerials.json")
  .then(function (response) {
    return response.json();
  })
  .then(function (products) {
    let placeholder = document.querySelector("#products-data");
    let product_card = "";
    for (let product of products) {
      product_card += `       
      <div class="card" style="width: 18rem; margin:0.5em;">
        <img class="card-img-top" src="${product.image}" alt="Card image cap">
        <div class="card-body">
            <h5>${product.name}</h5>
            <a type="button" class="btn btn-link" href="${product.link}">Read More</a>
        </div>
      </div>
      `;
    }

    placeholder.innerHTML = product_card;
  });
fetch("households.json")
  .then(function (response) {
    return response.json();
  })
  .then(function (products) {
    let placeholder = document.querySelector("#products-data-household");
    let product_card = "";
    for (let product of products) {
      product_card += `       
      <div class="card" style="width: 18rem; margin:0.5em;">
        <img class="card-img-top" src="${product.image}" alt="Card image cap">
        <div class="card-body">
            <h5>${product.name}</h5>
            <a type="button" class="btn btn-link" href="${product.link}">Read More</a>
        </div>
      </div>
      `;
    }

    placeholder.innerHTML = product_card;
  });

fetch("horeca.json")
  .then(function (response) {
    return response.json();
  })
  .then(function (products) {
    let placeholder = document.querySelector("#products-data-horeca");
    let product_card = "";
    for (let product of products) {
      product_card += `       
      <div class="card" style="width: 18rem; margin:0.5em;">
        <img class="card-img-top" src="${product.image}" alt="Card image cap">
        <div class="card-body">
            <h5>${product.name}</h5>
            <a type="button" class="btn btn-link" href="${product.link}">Read More</a>
        </div>
      </div>
      `;
    }
    placeholder.innerHTML = product_card;
  });
