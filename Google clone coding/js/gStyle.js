// var pics = document.getElementById('rightMenu');
var personalMen = document.getElementById('personalMen');
var plusMen = document.getElementById('plusMen');
var personalDe = document.getElementById('personalDe');
var plusDe = document.getElementById('plusDe');


personalMen.addEventListener("click", showMenu1);

function showMenu1() {
  if(personalDe.style.display === "none") {
    personalDe.style.display = "block";
  } else {
    personalDe.style.display = "none"
  }  
}

plusMen.addEventListener("click", showMenu2);

function showMenu2() {
  if(plusDe.style.display === "none") {
    plusDe.style.display = "block";
  } else {
    plusDe.style.display = "none"
  }  
}

var indiv = document.getElementById('indiv');
var indivDe = document.getElementById('indivDe');

indiv.addEventListener("click", showMenu3);

function showMenu3() {
  if(indivDe.style.display === "none") {
    indivDe.style.display = "block";
  } else {
    indivDe.style.display = "none"
  }
}