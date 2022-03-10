"use strict";
//dialogが表示されてる間はtrue
let check=false;
//dialogを消したいとき
//let dialog;
const serchText=document.querySelector("input[type='text']");
const goodsContents=document.getElementById("goodscontents");
const body=document.querySelector("body");
const main=document.querySelector("main");

class Tag
{
  static span(){
    return document.createElement("span");
  }
  static img(){
    return document.createElement("img");
  }
  static input(){
    return document.createElement("input");
  }
  static div(){
    return document.createElement("div");
  }
  static button(){
    return document.createElement("button");
  }
  static select(){
    return document.createElement("select");
  }
  static option(){
    return document.createElement("option");
  }
  static li(){
    return document.createElement("li");
  }
  static ul(){
    return document.createElement("ul");
  }
}