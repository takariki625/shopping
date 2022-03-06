"use strict;"
//dialogcheck
let check=false;
let dialog;
const goodsContents=document.getElementById("goodscontents");
const body=document.querySelector("body");
const main=document.querySelector("main");
body.addEventListener("click", e =>{
  //カート処理
  if(e.target.id === "cartBtn"){
    const id=e.target.parentNode.dataset.id;
    console.log(id);
    fetch("?action=add",{
      method:"POST",
      body:new URLSearchParams({
        id:id
      })
    })
  }
  if(check)return;
  //dialog処理
  if(e.target.className === "img"){
    const text=e.target.parentNode.parentNode.children[1];
    fetch("?action=serch",{
      method:"POST",
      body:new URLSearchParams({
        text:text.textContent.trim()
      })
    })
    .then(response =>{
      return response.json();
    })
    .then(json => {
      dialog=document.createElement("div");
      dialog.id="dialog";
      dialog.dataset.id=json.id;
      const imgDiv=document.createElement("div");
      imgDiv.id="dialogDiv";
      const delBtn=document.createElement("span");
      delBtn.textContent="x";
      const img=document.createElement("img");
      img.src="../img/"+json.img+".png";
      imgDiv.appendChild(delBtn);
      imgDiv.appendChild(img);
      const dialogName=document.createElement("div");
      dialogName.textContent=json.name;
      const dialogPrice=document.createElement("div");
      dialogPrice.textContent=json.price+"円";
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
    })
  }
})
//dialog以外を押したときの処理
main.addEventListener("click", e =>{
  if(!check)return;
  if(main.classList.contains("main")){
    main.classList.remove("main");
    dialog.remove();
    check=false;
  }
})

