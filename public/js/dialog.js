"use strict;"
goodsContents.addEventListener("click", e =>{
  if(e.target.className === "img"){
    const id=e.target.parentNode.parentNode.dataset.id;
    fetch("?action=dialog",{
      method:"POST",
      body:new URLSearchParams({
        text:id
      })
    })
    .then(response =>{
      return response.json();
    })
    .then(json =>{
      console.log(json);
    })
  }
})
