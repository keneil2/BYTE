let addtoCart = document.getElementsByClassName("Addbutton");
let increaseBtn = document.querySelectorAll(".increaseBtn");
let decreaseBtn = document.querySelectorAll(".decreaseBtn");
let deleteBtn = document.querySelectorAll("#removeBtn");
let count = 0;
// let  amount = document.getElementById("number").innerText;
function addEvent() {
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("removeBtn")) {
      const productId = event.target.getAttribute("data-id");
      console.log(productId);
      // Call a function to handle removal of the item with productId
      removeItemFromCart(productId);
    }
  });
}
function removeItemFromCart(productId) {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/addtocart?cart_id=" + productId, true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
      console.log(xhr.responseText);
      document.getElementById("cartDetails").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}

// sending requset to the addtocart controller prevents the page from reloading when a request is sent
function addToCart(product, amount, price) {
  let xhr = new XMLHttpRequest();
  xhr.open(
    "GET",
    "/addtocart?Product_id=" +
      product +
      "&quanity=" +
      amount +
      "&price=" +
      price,
    true
  );
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
      console.log(xhr.responseText);
      document.getElementById("cartDetails").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
}

// loads the cart when the user enters or loads the website
document.addEventListener("DOMContentLoaded", function () {
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "/getcartdata", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
      document.getElementById("cartDetails").innerHTML = xhr.responseText;
    }
  };
  xhr.send();
  addEvent();
});
function quantityBtn() {
  console.log(decreaseBtn);
  decreaseBtn.forEach(function (decreaseBtn) {
    decreaseBtn.addEventListener("click", function () {
      count--;
      if (count >= 0) {
        updateQuantity(
          count,
          this.parentElement.querySelector("#number"),
          this.parentElement.querySelector("#availableQuantity"),
          this.parentElement.querySelector("#feedback")
        );
        // updateQuantity(count)
      }
      console.log(count);
    });
  });

  increaseBtn.forEach(function (increaseBtn) {
    increaseBtn.addEventListener("click", function () {
      count++;
      console.log(count);
      updateQuantity(
        count,
        this.parentElement.querySelector("#number"),
        this.parentElement.querySelector("#availableQuantity"),
        this.parentElement.querySelector("#feedback")
      );
    });
  });
}

// allows the user to use the plus button and decrement button form the amount of item they would like to have in their cart
function updateQuantity(newCount, targetElement, availableQuantity, targetdiv) {
  let availableQuan = parseInt(availableQuantity.dataset.quantity);
  if (availableQuan >= newCount) {
    targetElement.innerText = newCount;
  }
  if (availableQuan < newCount) {
    let para = document.createElement("p");
    node = document.createTextNode("out of stock");
    para.appendChild(node);
    element = document.getElementById("quantity");
    targetdiv.appendChild(para);
  }
  if (availableQuan > newCount) {
    targetdiv.innerHTML = "";
  }
  console.log(availableQuan, newCount);
}
quantityBtn();
// event listener fo the button  that will send the request
Array.from(addtoCart).forEach(function (element) {
  element.addEventListener("click", function () {
    const productId = this.getAttribute("data-id");
    // let amount = document.querySelector("#number").innerHTML;
    // console.log(amount);
    let price = this.parentElement.querySelector(".price").dataset.price;
    addToCart(productId, 1, price);
  });
});
// document.addEventListener("DOMContentLoaded",function () {
//   let deliveryprice=document.getElementById("delivery");
// let Pickupprice=document.getElementById("Pickup");
// let total=document.getElementById("total");
// deliveryprice.addEventListener("change",function(){
//   let Totalprice=total.innerHTML;
//   console.log( Totalprice);
//   Totalprice+=10;
// })
// })