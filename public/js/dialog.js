"use strict;"
//dialogcheck
body.addEventListener("click", e =>{
  //カート処理
  if(e.target.id === "cartBtn"){
    const id=e.target.parentNode.dataset.id;
    fetch("?action=cart",{
      method:"POST",
      body:new URLSearchParams({
        id:id
      })
    })
    .then(response =>{
      return response.json();
    })
    .then(json =>{
      if(json){
        dialog.remove();
        const cartSpan=document.createElement("span");
        cartSpan.textContent="追加しました";
        cartSpan.id="cartSpan";
        body.appendChild(cartSpan);
        const timer=function(){
          let count=0;
          const countTimer=setInterval(alertTime,100);
          function alertTime(){
            count++;
            if(count >=30){
              check=false;
              main.classList.remove("main");
              cartSpan.remove();
              clearInterval(countTimer);
              return;
            }
          }
        }
        timer();
      }else{
        alert("すでに追加してあります。");
        return;
      }
    })
  }
  //delete
  if(e.target.id === "delBtn" && main.classList.contains("main")){
    main.classList.remove("main");
    dialog.remove();
    check=false;
    return;
  }
  if(check)return;
  //dialog処理
  if(e.target.classList.contains("img")){
    const id=e.target.parentNode.parentNode.dataset.id;
    const goodsName=e.target.parentNode.parentNode.children[1].textContent;
    const price=e.target.parentNode.parentNode.children[2].textContent;
    //srcそのものを持ってくる
    const img=e.target.src;
    dialog=document.createElement("div");
    dialog.id="dialog";
    dialog.dataset.id=id;
    const imgDiv=document.createElement("div");
    imgDiv.id="dialogDiv";
    const delBtn=document.createElement("span");
    delBtn.id="delBtn";
    delBtn.textContent="x";
    const dialogImg=document.createElement("img");
    dialogImg.src=img;
    imgDiv.appendChild(delBtn);
    imgDiv.appendChild(dialogImg);
    const dialogName=document.createElement("div");
    dialogName.textContent=goodsName;
    const dialogPrice=document.createElement("div");
    dialogPrice.textContent=price;
    const button=document.createElement("button");
    button.id="cartBtn";
    button.textContent="カートに入れる";
    dialog.appendChild(imgDiv);
    dialog.appendChild(dialogName);
    dialog.appendChild(dialogPrice);
    dialog.appendChild(button);
    body.appendChild(dialog);
    main.classList.add("main");
    check=true;
  }
})

