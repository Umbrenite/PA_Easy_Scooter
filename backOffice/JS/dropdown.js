var dropdown = document.getElementsByClassName("dropdown-btn");
var icon_element = Array.prototype.slice.call(document.querySelectorAll('.dropdown-container')); //ON RECUP L'INDEX GRÂCE À CE DOMLIST
var icon_change = Array.prototype.slice.call(document.querySelectorAll('.fa-solid')); //ON CHANGE LA CLASSE DE L'INDEX TROUVE
var i;
for (i = 0; i < dropdown.length; i++) {

  dropdown[i].addEventListener("click", function() { //On renvoie l'elément qui est cliqué
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    var index = icon_element.indexOf(dropdownContent); //Index de l'elément cliqué
    console.log(index);
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
      icon_change[index].className='right fa-solid fa-angle-left pt-2'; //On remet la classe initiale si le dropdown est fermé
    } else {
      dropdownContent.style.display = "block";
      icon_change[index].className='right fa-solid fa-angle-down pt-2'; //On remplace l'icone par une autre grâce au chanement de classe
    }
  });
}