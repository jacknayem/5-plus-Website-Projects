var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 1000);
}

function showPage() {
  document.getElementById("cooking").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

