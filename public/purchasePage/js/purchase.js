"use strict;"
let dtList=[];
list.forEach(val => dtList.push(val.dt));
let newDtList=dtList.filter(function (x,i,index){
  return index.indexOf(x) === i;
})

newDtList.forEach(val =>{
  let total=0;
  const flame=Tag.div();
  flame.classList.add("flame");
  flame.textContent=val;
  const ul=Tag.ul();
  list.forEach(li =>{
    if(val === li.dt){
      const Li=Tag.li();
      Li.dataset.id=li.id;
      const img=Tag.img();
      img.src="../../img/"+li.img+".png";
      const name=Tag.div();
      name.textContent=li.name;
      const comment=Tag.div();
      comment.textContent=li.comment;
      const price=Tag.div();
      price.textContent=li.price+"円";
      const quantity=Tag.div();
      quantity.textContent=li.quantity+"個";
      Li.appendChild(img);
      Li.appendChild(name);
      Li.appendChild(comment);
      Li.appendChild(price);
      Li.appendChild(quantity);
      ul.appendChild(Li);
      flame.appendChild(ul);
      main.appendChild(flame);
      total+=li.price * li.quantity;
    }
  })
  const totalSpan=Tag.span();
  totalSpan.textContent=total+"円";
  flame.insertBefore(totalSpan,flame.children[0]);
})
document.getElementById("topPage").addEventListener("click",e=>{
  window.location.href="../topPage/index.php";
})














