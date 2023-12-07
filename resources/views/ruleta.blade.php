<!DOCTYPE html>
<html>

<head>
  <title>Slot Machine</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <style>
    

    .modal-content {
    background-color: #fefefe;
    margin: 15% auto; 
    padding: 20px;
    border: 1px solid #888;
    width: 60%; /* Ajusta al tamaño que prefieras */
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    border-radius: 15px; /* Bordes redondeados para menos cuadratura */
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.modal-content p {
    font-size: 64px; /* Aumenta el tamaño de la fuente del texto del modal */
    color: #333; /* Color de texto más oscuro para mejor legibilidad */
    text-align: center; /* Centrar texto si es necesario */
    margin-top: 20px;
}

.close {
    color: #aaa;
    float: none; /* Quita el float para centrar el botón de cerrar si es necesario */
    font-size: 28px; /* Aumenta el tamaño si es necesario */
    font-weight: bold;
    position: absolute; /* Posiciona absolutamente para colocarlo en la esquina superior derecha */
    right: 20px; /* Espaciado desde el lado derecho del modal */
    top: 20px; /* Espaciado desde la parte superior del modal */
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}


    .canada-theme-button {
        background-color: #c50404; /* Rojo oscuro, similar al de la página */
        color: white; /* Texto en blanco para contraste */
        font-weight: bold; /* Letras en negrita */
        border: none; /* Sin borde */
        border-radius: 5px; /* Bordes redondeados */
        padding: 10px 20px; /* Espaciado interno */
        font-size: 36px; /* Tamaño de fuente */
        cursor: pointer; /* Cambiar cursor a puntero */
        transition: all 0.3s ease; /* Transición suave para efectos */
        box-shadow: 0px 2px 5px rgba(255, 255, 255, 0.6); /* Sombra blanca */
        margin-right: 10px; /* Margen entre botones */
    }

    .canada-theme-button:hover {
        background-color: #ff0000; /* Rojo más brillante al pasar el mouse */
        box-shadow: 0px 4px 20px rgba(255, 255, 255, 0.8); /* Sombra blanca más grande en hover */
    }

    /* ... Resto de tus estilos ... */
</style>


  <style>
    .modal {
    display: none; 
    position: fixed; 
    z-index: 1; 
    left: 0;
    top: 0;
    width: 100%; 
    height: 100%; 
    overflow: auto; 
    background-color: rgb(0,0,0); 
    background-color: rgba(0,0,0,0.4); 
        }
        body {
          background: rgb(255,255,255);
          background: -moz-linear-gradient(342deg, rgba(255,255,255,1) 0%, rgba(220,14,14,0.9430365896358543) 70%);
          background: -webkit-linear-gradient(342deg, rgba(255,255,255,1) 0%, rgba(220,14,14,0.9430365896358543) 70%);
          background: linear-gradient(342deg, rgba(255,255,255,1) 0%, rgba(220,14,14,0.9430365896358543) 70%);
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#ffffff",endColorstr="#dc0e0e",GradientType=1);

            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .slotcontainer {
            display:flex ;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            margin-right: 20px;
        }

        .slot {
        width: 262.5px; /* 150px * 1.75 */
        height: 393.75px; /* 225px * 1.75 */
            border: 1px solid black;
            border-radius: 7.5px;
            display: inline-block;
            overflow: hidden;
            position: relative;
            background: #fafafa;
            box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.4) inset;
        }

        .slot .symbols {
            position: absolute;
            top: 0;
            left: 0;
            transition: top 5s;
        }

        .slot .symbol {
        width: 262.5px; /* Igual al ancho del .slot */
        height: 393.75px; /* Igual al alto del .slot */
        font-size: 157.5px; /* 90px * 1.75 */
        line-height: 262.5px; /* 150px * 1.75 */
            display: block;
            text-align: center;
            padding-top: 37.5px; /* Ajustado para el nuevo tamaño */
        }

        button {
            margin: 0 -335px;
            padding: 10px 20px;
            font-size: 16px;
        }


        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .winners-container {
            width: 200px;
            margin-left: 20px;
            padding: 10px;
            background-color: #fff;
            border: 2px solid red;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background-image: url('path_to_your_canadian_or_christmas_theme_image');
            background-size: cover;
        }

        .winners-container h2 {
            text-align: center;
            color: red;
            font-family: 'Times New Roman', Times, serif;
            margin-bottom: 10px;
        }

        #winnersList {
            list-style: none;
            padding: 0;
        }

        #winnersList li {
            background-color: rgba(255, 255, 255, 0.8);
            margin-bottom: 5px;
            padding: 5px;
            border-radius: 5px;
            font-size: 14px;
        }


        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

  </style>
</head>

<body>
  <div class="container">
    
    <div class="slotcontainer">

      <div class="slot">
        <div class="symbols" id="slot1Symbols"></div>
      </div>

      <div class="slot">
        <div class="symbols" id="slot2Symbols"></div>
      </div>

      <div class="slot">
        <div class="symbols" id="slot3Symbols"></div>
      </div>


        <div class="table-responsive" style="margin-left: 80px; margin-bottom: 240px">
            <table class="table table-striped table-hover table-borderless table-primary align-middle">
                <thead class="table-light">
                    <div class="text-center">
                    <span class="text-light fw-bold" style="font-size: 60px">
                        PISTAS
                    </span>
                    </div>
                    <tr>
                        <th>Column 1</th>
                        <th>Column 2</th>
                        <th>Column 3</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr
                        class="table-primary"
                    >
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                    <tr
                        class="table-primary"
                    >
                        <td scope="row">Item</td>
                        <td>Item</td>
                        <td>Item</td>
                    </tr>
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        
        
        
    </div>
    
    <div style="display: flex;">
        <button class="canada-theme-button" onclick="spin()">GENERAR PISTA</button>
        <button class="canada-theme-button" onclick="spin()">GENERAR PISTA</button>
        
    </div>
  </div>
  <div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <span class="close">&times;</span>
        <p>¡Giro completado!</p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Asegúrate de que esta línea se renderiza correctamente con el ID del participante
    var cedulaParticipante = {{ $participante->cedula }}; // Asegúrate de que esta línea se renderiza correctamente

    const slotSymbols = [
        ['🍁', '🏒', '🥽', '🐻', '🎿', '🏂', '🌲', '🍁', '🎅', '🦌', '🍁', '🛷'],
        ['🥞', '🍁', '🏞️', '🗻', '🌲', '🧊', '🦌', '🐻', '🎅', '🏔️', '🍁', '🛷'],
        ['🧊', '🍁', '🏔️', '🗻', '🌲', '🧊', '🏒', '🎅', '🦌', '🐻', '🏂', '🎅']
    ];

    function createSymbolElement(symbol) {
        const div = document.createElement('div');
        div.classList.add('symbol');
        div.textContent = symbol;
        return div;
    }

    let spun = false;

   function spin() {
    if (!spun) {
        initSlots();
        spun = true;
    }
}

function initSlots() {
    const slots = document.querySelectorAll('.slot');
    slots.forEach((slot, index) => {
        const symbols = slot.querySelector('.symbols');
        symbols.innerHTML = '';
        symbols.appendChild(createSymbolElement('❓'));
        for (let i = 0; i < 3; i++) {
            slotSymbols[index].forEach(symbol => {
                symbols.appendChild(createSymbolElement(symbol));
            });
        }
    });
    startSpin();
}

function startSpin() {
    const slots = document.querySelectorAll('.slot');
    let completedSlots = 0;

    slots.forEach((slot, index) => {
        const symbols = slot.querySelector('.symbols');
        const symbolHeight = symbols.querySelector('.symbol').clientHeight;
        const symbolCount = symbols.childElementCount;
        
        const totalDistance = symbolCount * symbolHeight;
        const randomOffset = -Math.floor(Math.random() * (symbolCount - 1) + 1) * symbolHeight;
        symbols.style.top = `${randomOffset}px`;

        symbols.addEventListener('transitionend', () => {
            completedSlots++;
            if (completedSlots === slots.length) {
                logDisplayedSymbols();
                // Resetear el estado de 'spun' para permitir un nuevo giro
                spun = false;
            }
        }, { once: true });
    });
}

function reset() {
    const slots = document.querySelectorAll('.slot');
    slots.forEach(slot => {
        const symbols = slot.querySelector('.symbols');
        symbols.style.transition = 'none';
        symbols.style.top = '0';
        symbols.offsetHeight; // Trigger a reflow
        symbols.style.transition = '';
    });
    spun = false;
}


    function logDisplayedSymbols() {
        $.ajax({
            url: '/pista-aleatoria/' + cedulaParticipante,
            type: 'GET',
            success: function(data) {
                if (data) {
                    mostrarPistaEnModal(data.titulo, data.pista);
                }
            },
            error: function() {
                alert('!Esas son todas las pistas!');
            }
        });
    }

    function mostrarPistaEnModal(titulo, pista) {
        const modalContent = document.querySelector("#modal .modal-content p");
        modalContent.textContent = titulo + ': ' + pista;
        const modal = document.getElementById('modal');
        modal.style.display = 'block';
    }

    // Configuración del modal
    const modal = document.getElementById('modal');
    const span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    }
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

</script>


  


</body>

</html>