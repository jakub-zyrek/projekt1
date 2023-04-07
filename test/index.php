<!DOCTYPE html>
<html>
    <head>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <link rel="stylesheet" href="./../bootstrap.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body>
        <script type="text/javascript">
            
            
            function szukaj(formularz) {
                // Zamienianie znaków specjalnych
                
                formularz.q.value = formularz.q.value.replaceAll("+", '%2B');
                formularz.q.value = formularz.q.value.replaceAll("!", '%21');
                formularz.q.value = formularz.q.value.replaceAll("#", '%23');
                formularz.q.value = formularz.q.value.replaceAll("$", '%24');
                formularz.q.value = formularz.q.value.replaceAll("&", '%26');
                formularz.q.value = formularz.q.value.replaceAll("(", '%28');
                formularz.q.value = formularz.q.value.replaceAll(")", '%29');
                formularz.q.value = formularz.q.value.replaceAll("*", '%2A');
                formularz.q.value = formularz.q.value.replaceAll(",", '%2B');
                
                plik = 'skrypt.php?q=' + formularz.q.value;
                
                xml = null;
                try {
                    xml = new ActiveXObject("Microsoft.XMLHTTP"); // IE
                } catch(e) {
                    try {
                    xml = new XMLHttpRequest(); // Mozilla/FireFox/Opera
                    } catch(e) {
                    xml = null;
                    }
                }
                if (xml != null) {
                    xml.open("POST", plik, true);
                    xml.send(null);
                }

                //formularz.q.value = "";
                return false;
            }
           
            </script>

            <form action="" method="get" onsubmit="return szukaj(this)" class='needs-validation col-12 d-flex flex-wrap' novalidate>
                <span style="display: flex; align-items: baseline;" class="col-12 col-xl-10">
                    <b class="">Jakub Żyrek:&nbsp;&nbsp;</b>
                    <input class="form-control" name="q" type='text' placeholder='Wprowadź komentarz' required style='border: none; border-bottom: black 1px solid; border-radius: 0px; outline: none; width: max-content;'>
                </span>
                                
                <button type='submit' class='btn btn-outline-dark text-center col-12 col-xl-2 mt-3 mt-xl-0' style='flex-grow: 2; display: flex; justify-content: center; align-items: normal; font-size: 0.5rem; padding: 10px;'>
                    <svg xmlns='http://www.w3.org/2000/svg' style='width: 1rem;' fill='currentColor' class='bi bi-send-fill' viewBox='0 0 16 16'>
                        <path d='M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z'/>
                    </svg>
                </button>
            </form>
                            <div id="wynik"></div>
          
    </body>
</html>