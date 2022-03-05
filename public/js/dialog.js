"use strict;"
//dialogcheck
let check=false;
let dialog;
const goodsContents=document.getElementById("goodscontents");
const body=document.querySelector("body");
const main=document.querySelector("main");
body.addEventListener("click", e =>{
  //お気に入り処理
  if(e.target.classList.contains("ff") ||
    e.target.classList.contains("tf")){
    const id=e.target.parentNode.parentNode.dataset.id;
    favorite(id,e.target);
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
      const star=document.createElement("span");
      if(parseInt(json.is_done)===1){
        star.textContent="★"
        star.classList.add("tf");
      }else{
        star.textContent="☆";
        star.classList.add("ff");
      }
      const delBtn=document.createElement("span");
      delBtn.textContent="x";
      const img=document.createElement("img");
      img.src="../img/"+json.img+".png";
      imgDiv.appendChild(star);
      imgDiv.appendChild(delBtn);
      imgDiv.appendChild(img);
      const dialogName=document.createElement("div");
      dialogName.textContent=json.name;
      const dialogPrice=document.createElement("div");
      dialogPrice.textContent=json.price+"円";
      const button=document.createElement("button");
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

