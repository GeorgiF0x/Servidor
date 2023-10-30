function crearNuevoElemento(titulo, ruta) {
    const li = document.createElement("li");
    li.className = "list-group-item d-flex justify-content-between align-items-center fs-4 fw-bold fst-italic";
    
    const div = document.createElement("div");
    div.className = "d-flex align-items-center";
  
    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
    svg.width = 32;
    svg.height = 32;
    svg.setAttribute("fill", "currentColor");
    svg.className = "bi bi-journal-bookmark me-2";
    svg.setAttribute("viewBox", "0 0 16 16");
  
    const path1 = document.createElement("path");
    path1.setAttribute("fill-rule", "evenodd");
    path1.setAttribute("d", "M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z");
  
    const path2 = document.createElement("path");
    path2.setAttribute("d", "M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z");
  
    const path3 = document.createElement("path");
    path3.setAttribute("d", "M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z");
  
    svg.appendChild(path1);
    svg.appendChild(path2);
    svg.appendChild(path3);
  
    const tituloSpan = document.createElement("span");
    tituloSpan.textContent = titulo;
  
    div.appendChild(svg);
    div.appendChild(tituloSpan);
  
    const enlace = document.createElement("a");
    enlace.href = ruta;
    enlace.className = "btn btn-dark text-white fw-bold"; // Agrega las clases aquí
    enlace.textContent = "Ver tarea";
  
    li.appendChild(div);
    li.appendChild(enlace);
  
    return li;
  }

  // Función para manejar el evento de agregar nueva tarea
  function agregarNuevaTarea(btn, listaId) {
    btn.addEventListener("click", function() {
      const lista = document.getElementById(listaId);

      const inputTitulo = document.createElement("input");
      inputTitulo.type = "text";
      inputTitulo.placeholder = "Título de la tarea";

      const inputRuta = document.createElement("input");
      inputRuta.type = "text";
      inputRuta.placeholder = "Ruta de la tarea";

      const agregarBoton = document.createElement("button");
      agregarBoton.className = "btn btn-dark fw-bold";
      agregarBoton.textContent = "Agregar Tarea";

      agregarBoton.addEventListener("click", function() {
        const titulo = inputTitulo.value;
        const ruta = inputRuta.value;
        if (titulo && ruta) {
          const nuevoElemento = crearNuevoElemento(titulo, ruta);
          lista.appendChild(nuevoElemento);
          inputTitulo.value = "";
          inputRuta.value = "";
        }
      });

      lista.appendChild(inputTitulo);
      lista.appendChild(inputRuta);
      lista.appendChild(agregarBoton);

      // Ocultar el botón "Nueva Tarea"
      btn.style.display = "none";
    });
  }

  // Agregar eventos a los botones "Nueva Tarea"
  agregarNuevaTarea(document.getElementById("agregarTarea1"), "practicas-list");
  agregarNuevaTarea(document.getElementById("agregarTarea2"), "ejercicios-list");