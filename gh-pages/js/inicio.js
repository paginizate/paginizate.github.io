// STICKY MENU
window.addEventListener('scroll', function() {
  var navbar = document.querySelector('.nav_container');
  var imgLogo = document.querySelector('.img_nav');
  var navA = document.querySelectorAll('.navA');
  var menuICON = document.getElementById('menuICON');
  var imgNavContainer = document.querySelector('.imgNavContainer');

  if (window.scrollY > 200) {
    navbar.classList.add('sticky');
    imgLogo.classList.add('sticky');
    menuICON.classList.add('sticky');
    imgNavContainer.classList.add('sticky');

    for (var i = 0; i < navA.length; i++) {
      navA[i].classList.add('sticky');
    }

  } else {
    navbar.classList.remove('sticky');
    imgLogo.classList.remove('sticky');
    menuICON.classList.remove('sticky');
    imgNavContainer.classList.remove('sticky');

    for (var i = 0; i < navA.length; i++) {
      navA[i].classList.remove('sticky');
    }
  }
});

// MENU DE HAMBURGUESA RESPONSIVE, HACER APARECER EL NAV
function mostrarNAV() {
  document.querySelector(".nav").classList.toggle("show")
}





// ABRIR POP UP DE RESEÑAS(PARA PUBLICAR RESEÑAS)
function mostrarPopupPublicarResena() {
  document.getElementById("popup").style.display = "block";
}

function ocultarPopupPublicarResena() {
  document.getElementById("popup").style.display = "none";
}


// minimizar imagen grande
function minimizarIMG() {
  document.getElementById("popup_galeria").style.display = "none";
}


// Oculatar el popup de ver reseñas grandes
function ocultarPopupVerResena() {
  document.getElementById("popupresenavis").style.display = "none";
}


// CERRAR LISTA DE VER TODAS LAS RESEÑAS
function ocultarVerAllResena() {
  document.getElementById("verAllResenas_Container").style.display = "none";
}



// cuando se clica fuera del div
window.onclick = function(event) {
  if (event.target == document.getElementById("popupresenavis")) {
    ocultarPopupVerResena();
  }
  if (event.target == document.getElementById("popup")) {
    ocultarPopupPublicarResena();
  }
  if (event.target == document.getElementById("centrarVerticalPopupImg")) {
    minimizarIMG();
  }
  if (event.target == document.getElementById("verAllResenas_Container")) {
    ocultarVerAllResena();
  }
}




// VALIDAR SI HAN PUESTO NOTA EN FORM
function validarFormulario() {
        var calificacion = document.querySelector('input[name="rate"]:checked');
        if (!calificacion) {
                alert("Por favor, seleccione una calificación antes de enviar la reseña.");
    
                return false;
        }
        return true;
}
const resenaForm = document.getElementById('resenaForm');
resenaForm.addEventListener('submit', validarFormulario);



