"use strict;"
document.querySelector("form").addEventListener("submit", e =>{
  e.preventDefault();
  const serch=document.querySelector("input[type='text']");
  if(serch.value === "")return;
  fetch("?action=serch",{
    method:"POST",
    body:new URLSearchParams({
      text:serch.value,
    })
  })
  .then(response =>{
    return response.json();
  })
  .then(json =>{
    if(!json === false){  
      if(goodsContents.childElementCount === 0){
        document.getElementById("serchLose").remove();
        createGoodsContents(goodsContents,json.id,json.name,json.price,json.img);
      }else{
        for(let i=0; i<=goodsContents.childElementCount-1; i++){
          if(goodsContents.children[i].dataset.id === json.id){
            goodsContents.insertBefore(goodsContents.children[i],goodsContents.firstChild);
            return;
          }
        }
        createGoodsContents(goodsContents,json.id,json.name,json.price,json.img,json.is_done);
      }
    }else{
      window.location.href="serchLose.php";
    }
  })
})
function createGoodsContents(box, id , name , price , img,is_done){
  const li=document.createElement("li");
  li.dataset.id=id;
  const imgDiv=document.createElement("div");
  imgDiv.classList.add("image");
  const goodsStar=document.createElement("span");
  if(parseInt(is_done) === 0){
    goodsStar.classList.add("ff");
    goodsStar.textContent="☆";
  }else{
    goodsStar.classList.add("tf");
    goodsStar.textContent="★";
  }
  const goodsImg=document.createElement("img");
  goodsImg.src="../img/"+img+".png";
  imgDiv.appendChild(goodsStar);
  imgDiv.appendChild(goodsImg);
  const goodsName=document.createElement("div");
  goodsName.textContent=name;
  const goodsPrice=document.createElement("div");
  goodsPrice.textContent=price+"円";
  li.appendChild(imgDiv);
  li.appendChild(goodsName);
  li.appendChild(goodsPrice);
  box.insertBefore(li,box.firstChild);
}


