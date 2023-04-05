$(document).ready(function () {

  // Cargar los datos por defecto al cargar la página
  cargarDatos("");

  // Asignar el evento de búsqueda al input de búsqueda
  $("#busqueda-mascotas").keyup(function () {
    var buscar = $(this).val();
    cargarDatos(buscar);
  });
});

function crearBoton(nombre, id, tokenMascota) {
  var token = tokenMascota
  // Crear el botón
  var boton = document.createElement("button");

  // Establecer el texto y el id del botón
  boton.textContent = nombre;
  boton.id = id;

  // Agregar la clase "btn" y "btn-primary" al botón
  boton.classList.add("btn", "btn-primary");

  // Agregar el botón al DOM
  containerbutton.appendChild(boton);
  boton.onclick = function () {
    console.log("Se hizo clic en el botón " + token);
    if (!token) {
      guardarMascota();
    }else{
      
      editarMascota(token);
    }
  };
}



$('#nuevo').click(function () {
  count = 0;
  document.getElementById("containerbutton").innerHTML = "";
  if (count > 0) {
    console.log('ya has presionado el boton');
  } else {
    crearBoton("guardar", "guardar", "");
    var save = document.getElementById("guardar");
    count++;
  }
})



function limpiarFormulario() {
  $("#form_mascotas")[0].reset();
  $("button[type='submit']").text("Guardar");
  $("#form_mascotas").removeAttr("data-id");
}


function cargarDatos(buscar) {
  // Hacer la petición AJAX
  $.ajax({
    url: "ajax/carga_mascotas.php",
    type: "GET",
    dataType: "json",
    data: { buscar: buscar },
    success: function (resultados) {
      // Limpiar la tabla antes de agregar los datos
      var tbody = $("#tabla-mascotas tbody");
      tbody.empty();

      // Agregar los datos a la tabla
      $.each(resultados, function (index, mascota) {
        var tr = $("<tr>");
        tr.append("<td>" + mascota.nombre + "</td>");
        tr.append("<td>" + mascota.raza + "</td>");
        tr.append("<td>" + mascota.color + "</td>");
        tr.append("<td>" + mascota.peso + "</td>");
        tr.append("<td>" + mascota.altura + "</td>");
        tr.append("<td>" + mascota.sexo + "</td>");
        tr.append("<td>" + mascota.fech_nacimiento + "</td>");
        tr.append("<td>"
          + "<ul class='list-inline m-0'><li class='list-inline-item'>"
          + "<button data-bs-toggle='modal' data-bs-target='#exampleModal' class='btn btn-warning editar-mascota' data-id='" + mascota.token + "'> "
          + "<i class='bi bi-pencil-square'></i>"
          + "</button>"
          + "</li> "
          + "<li class='list-inline-item'>"
          + "<button class='btn btn-danger eliminar-mascota' data-id='" + mascota.token + "'>"
          + "<i class='bi bi-trash2'></i> "
          + "</button></li></ul></td>");

        tbody.append(tr);
      });
      // Asignar el evento de click al botón de edición

      $(".editar-mascota").click(function () {
        var tokenMascota = $(this).data("id");

        // $("#guardar").off("click");
        // $("button[type=submit]").attr("id", "editar")
        // $("#editar").off("click");

        count = 0;
        document.getElementById("containerbutton").innerHTML = "";
        if (count > 0) {
          console.log('ya has presionado el boton');
        } else {
          crearBoton("editar", "editar", tokenMascota);
          var save = document.getElementById("guardar");
          count++;
        }

        // $("#editar").click(function (event) {
        //   event.preventDefault();
        //   editarMascota(tokenMascota);
        // });
        
        //************************************************************************************** */
        // Hacer la petición AJAX para obtener los datos de la mascota a editar
        $.ajax({
          url: "ajax/obtener_mascota.php?tokenMascota=" + tokenMascota,
          type: "GET",
          dataType: "json",
          success: function (mascota) {
            // Llenar los campos del formulario con los datos de la mascota a editar

            $("#nombre").val(mascota.nombre);
            $("#raza").val(mascota.raza);
            $("#color").val(mascota.color);
            $("#peso").val(mascota.peso);
            $("#altura").val(mascota.altura);
            $("#sexo").val(mascota.sexo);
            $("#fech_nacimiento").val(mascota.fech_nacimiento);


            // Cambiar el texto del botón de submit para indicar que se está editando
            $("button[type='submit']").text("Editar");

            // Agregar el atributo data-id al formulario para enviar el ID de la mascota a editar
            $("#form_mascotas").attr("data-id", tokenMascota);

          },
          error: function () {
            alert("Error al obtener los datos de la mascota");

          },
        });
      });
      /************************************************************************************************* */
      // Asignar el evento de click al botón de eliminación
      $(".eliminar-mascota").click(function () {
        var tokenMascota = $(this).data("id");

        Swal.fire({
          title: '¿Estas seguro?',
          text: "No hay vuelta atras despues de esta accion!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Eliminar!',
          cancelButtonText: 'Cancelar'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "ajax/eliminar_mascota.php?token=" + tokenMascota,
              type: "GET",
              success: function () {
                Swal.fire({
                  icon: 'success',
                  title: 'Mascota Eliminada',
                  text: 'Satisfactoriamente!'
                })
                // Recargar la tabla de mascotas para mostrar los cambios
                cargarDatos("");
                $("#cerrarModal").click();
              },
              error: function () {
                alert("Error al eliminar la mascota");
              },
            });
          }
        })


        // Hacer la petición AJAX para eliminar el registro

      });
    },
    error: function () {
      alert("Error al cargar los datos");
    },
  });
}


function guardarMascota() {
  var datos = $("#form_mascotas").serialize(); // serializa los datos del formulario
  $.ajax({
    url: "gmascotas.php",  // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {
      Swal.fire({
        icon: 'success',
        title: 'Mascota guardada Satisfactoriamente',
        showConfirmButton: false,
        timer: 1500
      })
      $("#form_mascotas")[0].reset();
      $("#cerrarModal").click();
      // hacer algo en respuesta exitosa del servidor
      cargarDatos("");
    },
    error: function (xhr, status, error) {
      alert("Error al guardar la mascota");
      // manejar el error del servidor
    },
  });
}


function editarMascota(tokenMascota) {

  
  var token = tokenMascota;
  var datos = $("#form_mascotas").serialize(); // serializa los datos del formulario
  console.log(token);
  console.log(datos);
  $.ajax({
    url: "ajax/actualizar_mascota.?token=" + token, // archivo PHP para procesar los datos
    type: "GET",
    data: datos,
    success: function (response) {

      alert("Mascota modificada exitosamente");
      $("#form_mascotas")[0].reset();
      $("#cerrarModal").click();
      cargarDatos("");

    },
    error: function (xhr, status, error) {

      console.log('function error');
      alert("Error al guardar la mascota");
      // manejar el error del servidor
    },
  });
}

