<!DOCTYPE html>
<html>

<head>
  <title>Slot Machine</title>
  <link rel="stylesheet" href="css/stylee.css"/>
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
/* big credit for the design: https://codepen.io/1isten/pen/wvMdNPp */

body {
    background-color: #ffffff;
        background-image: linear-gradient(147deg, #ffffff 0%, #c50404 74%);margin: 0;
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
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 20px;
    margin-right: 20px;
}

.slot {
    width: 150px; /* 50% más ancho */
    height: 225px; /* 50% más alto */
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
    width: 150px; /* Nuevo ancho */
    height: 225px; /* Nuevo alto */
    font-size: 90px; /* Ajustado para el nuevo tamaño */
    line-height: 150px; /* Ajustado para el nuevo tamaño */
    display: block;
    text-align: center;
    padding-top: 37.5px; /* Ajustado para el nuevo tamaño */
}

button {
    margin: 0 10px;
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
    <form action="{{ route('seleccionar.ganador') }}" method="POST">
        @csrf <!-- Protección CSRF -->
        <button type="submit" class="btn btn-primary">Seleccionar Ganador</button>
    </form>
  </div>
    
</body>

</html>

