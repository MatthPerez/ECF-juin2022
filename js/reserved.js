const reserve = document.getElementById("reserve");
reserve.onclick = () => {
  document.getElementById("reserve").style.backgroundColor = "#abf495";
  document.getElementById("reserve").innerHTML = "Suite réservée !";
}