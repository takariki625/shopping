"use strict;"
//dialog判定
serchText.addEventListener("focus", e =>{
  if(check){
    serchText.blur();
  }
})
document.getElementById("purchase").addEventListener("click", ()=>{
  window.location.href="../purchasePage/purchase.php";
})
document.querySelector("form").addEventListener("submit", e =>{
  e.preventDefault();
  //dialog判定
  if(main.classList.contains("main")){
    return;
  }
  if(serchText.value === "")return;
  fetch("?action=serch",{
    method:"POST",
    body:new URLSearchParams({
      text:serchText.value,
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
  const goodsImg=document.createElement("img");
  goodsImg.classList.add("img");
  goodsImg.src="../../img/"+img+".png";
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
document.getElementById("topPage").addEventListener("click", e =>{
  window.location.href="../../../hp/public/top.php";
})


