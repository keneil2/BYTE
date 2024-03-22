let addtoCart=document.getElementsByClassName("Addbutton");

function addEvent(){
  let deleteBtn=document.getElementsByClassName("removeBtn");
Array.from(deleteBtn).forEach(function(Btn){
Btn.addEventListener("click",function(){
console.log("Button clicked");
})
})
console.log(deleteBtn);
}
function addToCart(product,amount,price){
    let xhr= new XMLHttpRequest();
    xhr.open("GET","/addtocart?Product_id="+ product +"&quanity="+amount+"&price="+price,true);
    xhr.onreadystatechange=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
          document.getElementById("cartDetails").innerHTML=xhr.responseText;
        }
    }
    xhr.send();
}


document.addEventListener("DOMContentLoaded",function(){
    let xhr= new XMLHttpRequest();
    xhr.open("GET","/getcartdata",true);
    xhr.onreadystatechange=function(){
        if(xhr.readyState==XMLHttpRequest.DONE && xhr.status==200){
          document.getElementById("cartDetails").innerHTML=xhr.responseText;
        }
    }
    xhr.send(); 
})
 Array.from(addtoCart).forEach(function(element){
  element.addEventListener("click",function(){
    const productId=this.getAttribute("data-id");
  let amount=document.getElementById("number").innerHTML;
  let price = this.parentElement.querySelector(".price").dataset.price;
  addToCart(productId,amount,price)

  })
 
 

})