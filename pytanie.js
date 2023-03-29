var i = 0;
var essa = 'essa';
var px = 'px';
var carde = 'carde';

function coment() {
    if (i == 0) {
        document.getElementById('kome').innerHTML = "<div class='card-body' style='padding-left: 5%; background-color: white; border-radius: 1vw;'><div style='margin-left: 3%;'><div><p><b>Jakub Żyrek:</b>&nbsp;&nbsp; Byczes dlaczego</p></div><div style='display: flex;  width: 100%;'><button type='button' class='btn btn-lg btn-outline-danger' style='display: flex; margin: auto; justify-content: center; align-items: normal; font-size: 0.5rem;' onclick='document.getElementById(essa).innerHTML = bycz; var a = document.getElementById(carde); document.getElementById(essa).style.top = (a.offsetTop + a.offsetTop + a.offsetTop) + px;'><svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem;' fill='currentColor' class='bi bi-flag-fill' viewBox='0 0 16 16'><path d='M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001'/></svg></button><p><b>Maria Dazdd`ur:</b>&nbsp;&nbsp; Elo mordo</p></div><form action='' method='post' class='needs-validation col-12' novalidate><br><label for='kom' class='form-label col-12' style='width: 100%; margin: 0%;display: flex; align-items: center; justify-content: center;'><b style='width: 24%;'>Jakub Żyrek:</b><input type='text' class='form-control' id='kom' placeholder='Wprowadź komentarz' required style='border: none; border-bottom: black 1px solid; border-radius: 0px; outline: none; width: 60%;'><button type='submit' class='btn btn-outline-dark text-center' style='width: 10%; margin-left: 2%; padding: 1%;'><svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem;' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'><path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/></svg></button></label><div class='invalid-feedback'>Nic nie wpisano</div></form></div></div>";

        document.getElementById('komet').innerText = " Ukryj komentarze";
        i = 1;
    } else {
        document.getElementById('kome').innerHTML = "";
        document.getElementById('komet').innerText = " Pokaż komentarze";
        i = 0;
    }
}

var a = 0;

function dzieki() {
    if (a == 0) {
        // document.getElementById('po').innerText = "Podziękowałeś";
        document.getElementById("dzieki").style.backgroundColor = "#dc3545";
        document.getElementById("dzieki").style.color = "white";
        a = 1;
    } else {
        // document.getElementById('po').innerText = "Podziękuj";       
        document.getElementById("dzieki").style.backgroundColor = "white";
        document.getElementById("dzieki").style.color = "#dc3545"; 
        a = 0;
    }
}

function dzie() {
    document.getElementById("dzieki").style.backgroundColor = "#dc3545";
    document.getElementById("dzieki").style.color = "white";
}

function dziek() {
    if (a == 0) {
        document.getElementById("dzieki").style.backgroundColor = "white";
        document.getElementById("dzieki").style.color = "#dc3545";
    }
}

var b = 0;

function ocen() {
    if (b == 0) {
        document.getElementById('ocena').innerHTML = '<svg id="g1" xmlns="http://www.w3.org/2000/svg" onmouseover="jeden(1);" onmouseout="jede(1);" onclick="jed(1);" style="width: 2rem;" fill="black" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>&nbsp;<svg id="g2" xmlns="http://www.w3.org/2000/svg"  onmouseover="jeden(2);"  onmouseout="jede(2);" onclick="jed(2);" style="width: 2rem;" fill="black" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>&nbsp;<svg id="g3" xmlns="http://www.w3.org/2000/svg" onmouseover="jeden(3);"  onmouseout="jede(3);" onclick="jed(3);" style="width: 2rem;" fill="black" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>&nbsp;<svg id="g4" xmlns="http://www.w3.org/2000/svg" onmouseover="jeden(4);"  onmouseout="jede(4);" onclick="jed(4);" style="width: 2rem;" fill="black" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>&nbsp;<svg id="g5" xmlns="http://www.w3.org/2000/svg" onmouseover="jeden(5);"  onmouseout="jede(5);" onclick="jed(5);" style="width: 2rem;" fill="black" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>';
        document.getElementById("oc").style.backgroundColor = "#ffc107";
        document.getElementById("oc").style.color = "black";
        b = 1;
    } else {
        document.getElementById('ocena').innerHTML = "";
        document.getElementById("oc").style.backgroundColor = "white";
        document.getElementById("oc").style.color = "#ffc107";
        b = 0;
    }
}

function oc() {
    document.getElementById("oc").style.backgroundColor = "#ffc107";
    document.getElementById("oc").style.color = "black";
}

function ocee() {
    if (b == 0) {
        document.getElementById("oc").style.backgroundColor = "white";
        document.getElementById("oc").style.color = "#ffc107";
    }
}

var aa = 0;

function jeden(g) {
    if (aa == 0) {
        for (var ii = 1; ii < (g+1); ii++) {
            document.getElementById("g" + ii).style.fill = "#ffc107";
        }
    }
}

function jede(g) {
    if (aa == 0) {
        for (var ii = 1; ii < (g+1); ii++) {
            document.getElementById("g" + ii).style.fill = "black";
        }
    }
}

function jed(g) {
    if (aa == 0) {
        for (var ii = 1; ii < (g+1); ii++) {
            document.getElementById("g" + ii).style.fill = "#ffc107";
        }
        aa = 1;
    } else {
        for (var ii = 1; ii < 6; ii++) {
            document.getElementById("g" + ii).style.fill = "black";
        }
        aa = 0;
    }
}