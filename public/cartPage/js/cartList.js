"use strict;"
const ul=document.getElementById("cartList");
body.addEventListener("click", e =>{
  if(e.target.id === "purchaseBtn"){
    let quantityCheck=true;
    const quantity=document.querySelectorAll(".quantity");
    quantity.forEach(c =>{
      if(c.value <= 0){
        quantityCheck=false;
        return;
      }
    })
    if(quantityCheck){
      fetch("?action=purchase",{
        method:"POST"
      })
      .then(response =>{
        return response.json();
      })
      .then(json =>{
        if(json){
          while(ul.hasChildNodes()){
            ul.firstChild.remove();
          }
          const timeCount=setInterval(setTime,100);
          let count=0;
          function setTime(){
            count++;
            if(count >= 5){
              clearInterval(timeCount);
              window.location.href="../topPage/index.php";
            }
          }
        }
      })
    }else{
      alert("個数を入力してください");
      return;
    }
  }
  //dialogcheck
  if(check){
    check=false;
    main.classList.remove("main");
    dialog.remove();
    return;
  }
  if(e.target.classList.contains("delBtn")){
    if(confirm(e.target.parentNode.children[2].textContent+"を削除しますか？")){
      fetch("?action=delete",{
        method:"POST",
        body:new URLSearchParams({
          id:e.target.parentNode.dataset.id,
        })
      })
      e.target.parentNode.remove();
      emptyCheck();
    }else{
      return;
    }
    }
    if(e.target.type === "number"){
      e.preventDefault();
      e.target.addEventListener("change", e=>{
        e.target.blur();
        fetch("?action=toggle",{
          method:"POST",
          body:new URLSearchParams({
            id:e.target.parentNode.dataset.id,
            value:e.target.value,
          })
        })
      })
    }
    if(e.target.id === "purchase"){
      if(ul.childElementCount === 0)return;
      dialog=Tag.div();
      dialog.id="dialog";
      const total=Tag.span();
      let count=0;
      for(let i=0; i<=ul.childElementCount-1; i++){
        const oneFlame=Tag.div();
        oneFlame.classList.add("oneFlame");
        oneFlame.dataset.id=ul.children[i].dataset.id;
        const img=Tag.img();
        img.src=ul.children[i].children[0].src;
        const name=Tag.span();
        name.textContent=ul.children[i].children[2].textContent;
        const price=Tag.span();
        price.textContent=ul.children[i].children[5].textContent
        const quantity=Tag.span();
        quantity.textContent=ul.children[i].children[3].value +"個";
        oneFlame.appendChild(img);
        oneFlame.appendChild(name);
        oneFlame.appendChild(price);
        oneFlame.appendChild(quantity);
        dialog.appendChild(oneFlame);
        count+=quantity.textContent.replace("個","") * price.textContent.replace("円","");
      }
      const text=Tag.span();
      text.textContent="合計";
      total.textContent=count+"円";
      dialog.appendChild(text);
      dialog.appendChild(total);
      const purchase=Tag.button();
      purchase.textContent="購入";
      purchase.id="purchaseBtn";
      dialog.appendChild(purchase);
      body.appendChild(dialog);
      main.classList.add("main");
      check=true;
    }
})
window.onload=emptyCheck;
function emptyCheck(){
  if(ul.childElementCount === 0){
    const div=Tag.div();
    const a=document.createElement("a");
    a.href="../topPage/index.php";
    a.textContent="トップページに戻る";
    div.appendChild(a);
    main.appendChild(div);
    console.log(ul.childElementCount);
  }
}