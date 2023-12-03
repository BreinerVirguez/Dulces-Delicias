//Ejecutando funciones
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciarSesion);
document.getElementById("btn__registrarse").addEventListener("click", register);
window.addEventListener("resize", anchoPage);

//Declarando variables
var formulario_login = document.querySelector(".formulario__login");
var formulario_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");

    //FUNCIONES

function anchoPage(){

    if (window.innerWidth > 850){
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "block";
    }else{
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        formulario_login.style.display = "block";
        contenedor_login_register.style.left = "0px";
        formulario_register.style.display = "none";   
    }
}

anchoPage();


    function iniciarSesion(){
        if (window.innerWidth > 850){
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "10px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.opacity = "1";
            caja_trasera_login.style.opacity = "0";
        }else{
            formulario_login.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_register.style.display = "none";
            caja_trasera_register.style.display = "block";
            caja_trasera_login.style.display = "none";
        }
    }

    function register(){
        if (window.innerWidth > 850){
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "410px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.opacity = "0";
            caja_trasera_login.style.opacity = "1";
        }else{
            formulario_register.style.display = "block";
            contenedor_login_register.style.left = "0px";
            formulario_login.style.display = "none";
            caja_trasera_register.style.display = "none";
            caja_trasera_login.style.display = "block";
            caja_trasera_login.style.opacity = "1";
        }
}
function validar(formulario)
{

if(formulario.txtid_postre.value=='')
{
alert('Sr Usuario debe ingresar el codigo');
formulario.txtcodigo.focus();
return false;
}

if (isNaN(formulario.txtid_postre.value))
{
alert("El codigo ingresado no es un n�mero");
formulario.txtcodigo.focus();
formulario.txtcodigo.value='';
return false;
}

if(formulario.txtnombre.value=='')
{
alert('Sr Usuario debe ingresar el nombre');
formulario.txtnombre.focus();
return false;
}
if(formulario.txtdescripcion.value=='')
{
alert('Sr Usuario debe ingresar la descripcion');
formulario.txtnombre.focus();
return false;
}
if(formulario.txtprecio.value=='')
{
alert('Sr Usuario debe ingresar un valor');
formulario.txtprecio.focus();
formulario.txtprecio.value='';
return false;
}
if(formulario.txtcantidad.value=='')
{
alert('Sr Usuario debe ingresar la cantidad');
formulario.txtcantidad.focus();
formulario.txtcantidad.value='';
return false;
}
if(formulario.categoria.value==0)
{
alert('Sr Usuario debe seleccionar la categoria');
formulario.categoria.focus();
return false;
}

return true;
}
function validar(formulario)
{
	if(form1.txtid_postre.value=='')
	{
		alert('Sr Usuario debe ingresar el codigo  a consultar');
		formulario.txtid_postre.focus();
		return false;
	}
	else if (isNaN(form1.txtid_postre.value))
	{
		alert("El valor ingresado no es un n�mero");
		formulario.txtid_postre.focus();
		return false;
	}
	return true;
}

function validar(formulario)
{

if(formulario.txtid_postre.value=='')
{
alert('Sr Usuario debe ingresar el codigo');
formulario.txtid_postre.focus();
return false;
}
else if (isNaN(formulario.txtid_postre.value))
{
alert("El codigo ingresado no es un n�mero");
formulario.txtid_postre.focus();
return false;
}

if(formulario.txtnombre.value=='')
{
alert('Sr Usuario debe ingresar el(los) nombre(s)');
formulario.txtnombre.focus();
return false;
}

return true;
}





    function loadTable(url) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("table-container").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }

    // Asigna eventos de clic a los botones
    document.getElementById("btnIngresarProductos").addEventListener("click", function () {
        loadTable("php/ingresaproductos.php");
    });

    document.getElementById("btnConsultaProductos").addEventListener("click", function () {
        loadTable("php/menu_consulta.php");
    });

    document.getElementById("btnModificarProductos").addEventListener("click", function () {
        loadTable("php/lista_modificar.php");
    });


    

