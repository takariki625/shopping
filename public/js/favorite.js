"use strict;"
function favorite(id , target){
  fetch("?action=toggle",{
    method:"POST",
    body:new URLSearchParams({
      id:id
    })
  })
  .then(response =>{
    return response.json();
  })
  .then(json =>{
    console.log(json);
    if(parseInt(json.is_done) === 0){
      target.classList.replace("tf","ff");
      target.textContent="☆";
    }else{
      target.classList.replace("ff","tf");
      target.textContent="★";
    }
  })
}