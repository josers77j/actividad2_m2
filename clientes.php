<!doctype html>
<html lang="en">
<?php include('menu.php'); ?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Clientes</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <form method="post" action="">
                    <div class="form-group">
                        <label for="my-input">Buscar:</label>
                        <input id="q" class="form-control" type="text" name="q">
                    </div>
                </form>
            </div>
            <div class="col-6">
                col 2
            </div>
        </div>
    </div>

    <div class="container">
        <button id="add">agrega un boton</button>
    </div>
    <div id="buttoncontainer"></div>

<script>
// Seleccionar el contenedor de botones
// Obtener el botón por su ID
var button = document.getElementById("add");
var count = 0;


// Agregar un evento onclick al botón


function crearBoton(nombre, id) {
  // Crear el botón
  var boton = document.createElement("button");
  
  // Establecer el texto y el id del botón
  boton.textContent = nombre;
  boton.id = id;
  
  // Agregar el botón al DOM
  buttoncontainer.appendChild(boton);
}

button.addEventListener("click", function() {
    if (count>0) {
    console.log('ya has presionado el boton') ;
  }else{
    crearBoton("guardar", "guardar");
    var save = document.getElementById("guardar");
    count++;
  }

    save.addEventListener("click", function(){
        console.log("hola");
    })

    
//   // Aquí es donde se ejecuta el código cuando se hace clic en el botón
  
  

    

    
// const buttonContainer = document.getElementById("button-container");

// // Crear un nuevo botón
// const newButton = document.createElement("button");
// newButton.textContent = "Nuevo botón";

// // Agregar el nuevo botón al contenedor
// buttonContainer.appendChild(newButton);
//     console.log("Haz hecho clic en el botón!");
//     count++;
 
//   }
  
});

</script>
    <!-- Optional JavaScript; choose one of the two! -->
    <script src="jquery/jquery.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>