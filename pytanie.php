<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe| Logowanie</title>
    <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <style>
  input:focus {
    margin: 0% !important;
    box-shadow: none !important;
  }
</style>
<script>
  var essa = "essa";
  var nic = "";

  var bycz = '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Dodawanie zgłoszenia</h2></div><div class="card-body"><form>Dlaczego chcesz zgłosić tę treść?<br><br><textarea rows="3" class="form-control"></textarea><br><button type="submit" class="form-control btn btn-outline-danger">Wyślij zgłoszenie</button></form></div></div>'
</script>
  </head>
  <body>
  <header class="p-3 text-bg-dark mb-3">
        <div class="pe-5 ps-5">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-xl-start" >
            <a href="index.php" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4" >
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
            </a>
  
            <ul class="nav col-12 col-xl-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
              <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto "  >Strona główna</a></li>
              <li><a href="posty.php"  class="btn btn-outline-info me-2 mb-3 mb-lg-auto " >Posty</a></li>
              <li>
                <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php" data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="kategorie.php?kat=HTML">HTML</a></li>
                  <li><a class="dropdown-item" href="kategorie.php?kat=CSS">CSS</a></li>
                  <li><a class="dropdown-item" href="kategorie.php">Więcej...</a></li>                </ul></li>
                <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2"  >O nas</a></li>
              <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2"  >Pomoc</a></li>
                
              <li><button onclick="location.href = 'cennik.php'" type="button" class="mb-3 mb-xl-auto btn btn-outline-warning me-auto" >PREMIUM</button></li>
            </ul>
  
            <div class="col-12 col-xl-4 col-xxl-3 mb-3 mb-xl-0 me-lg-5">
                <form class="col-12 d-flex" role="search" action="wyszukiwanie.php">
                  <div class="col-6">
                    <input type="search" class="form-control form-control-dark text-bg-dark col-12" placeholder="Wyszukaj..." aria-label="Search">
                  </div>
                  &nbsp;&nbsp;
                  <button type="submit" class="btn btn-outline-light me-2 col-6">Szukaj</button>
                </form>
                
            </div>
           
  
            <div class="text-center mb-2 mb-xl-0 col-12 col-xxl-auto text-xxl-end mt-3 mt-xxl-0">
              <?php
              
              if (isset($_SESSION['zalogowany'])) {
                echo '
                <div class="dropdown">
                  <a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong class="d-none d-lg-inline">'.$_SESSION['imie'].'</strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow ">
                    <li><a class="dropdown-item" href="profil.php">Profil</a></li><li><a class="dropdown-item" href="dodawanie_p.php">Zadaj pytanie</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="script_PHP/wyloguj.php">Wyloguj się</a></li>
                  </ul>
                </div>';
              } else {
                echo '<button type="button" class="btn btn-outline-light me-2" onclick="';
                echo "location.href = 'logowanie.php'";
                echo '">Zaloguj się</button><button type="button" class="btn btn-info" onclick="';
                echo "location.href = 'rejestracja.php'";
                echo '">Zarejestruj się</button>';
              }
              
              ?>
            </div>
          </div>
          </div>
  </header>
    <br><br>

    <div class="container ">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3 bg-info-subtle text-center">
                <p class="text-start">sdg sdg | Angielski</p>
                <h4 class="my-0 fw-normal text-start">Ssgddgs</h4>
                <br><br>
                <?php
                
                if(isset($_SESSION['zalogowany'])) {
                  echo '<div style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">
                  <button type="button" class="col-4 btn btn-lg btn-outline-info" style="display: flex; justify-content: center; align-items: center; font-size: 1rem;">
                    ODPOWIEDZ&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                      </svg>
                  </button>
                  &nbsp;&nbsp;
                  <button type="button" class="btn btn-lg btn-outline-danger col-2" style="display: flex;justify-content: center; align-items: normal; font-size: 1rem; margin-bottom: 2%; margin-top: 2%;" onclick="document.getElementById('."'essa'".').innerHTML = bycz; var a = document.getElementById('."'carde'".'); document.getElementById('."'essa'".').style.top = (a.offsetTop + a.offsetTop + a.offsetTop) + '."'px'".';">
                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                      <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                    </svg>
                    &nbsp;
                  </button>
                </div>';
                }
                
                ?>
              </div>
              <div class="card-body col-12 col-md-10 col-lg-8" style="margin-left: auto;">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header py-3 bg-success-subtle text-center">
                        <p class="text-start">sdg sdg | Projektowanie oprogramowania</p>

                      </div>
                      <div class="card-body" style="padding-left: 5%;">
                        gsd
                        
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header py-3 bg-subtle text-center">
                        <p class="text-start">fsd | PHP</p>

                      </div>
                      <div class="card-body" style="padding-left: 5%;">
                        Wfsd
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header py-3  text-center">
                        <p class="text-start">Mjjj | Polski</p>

                      </div>
                      <div id="carde"  class="card-body" style="padding-left: 5%;">              </div>
                      <div class="card-footer py-2 text-start">
                        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; gap: 3%;">
                          <button type="button" onclick="dzieki();" onmouseover="dzie();" onmouseout="dziek()" id="dzieki" class="btn btn-lg btn-outline-danger" style="display: flex; margin: auto; justify-content: center; align-items: center; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 1;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                            </svg>
                            &nbsp;<span id="po"></span>
                          </button>
                          <button type="button" id="oc" onclick="ocen();" onmouseover="oc()" onmouseout="ocee();" class="btn btn-lg btn-outline-warning" style="display: flex; margin: auto; justify-content: center; align-items: normal; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 1;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                              <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                            </svg>
                            &nbsp;
                          </button>
                          <button onclick="coment();" type="button" class="btn btn-lg btn-outline-dark"  style="display: flex; margin: auto; justify-content: center; align-items: center; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 1;">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                              <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
                            </svg>
                            &nbsp;<span id="komet">Wyświetl komentarze</span>
                          </button>
                          <button type="button" class="btn btn-lg btn-outline-danger" style="display: flex; margin: auto; justify-content: center; align-items: normal; font-size: 1rem; margin-bottom: 2%; margin-top: 2%; flex-grow: 0.2;" onclick="document.getElementById('essa').innerHTML = bycz; var a = document.getElementById('carde'); document.getElementById('essa').style.top = (a.offsetTop + a.offsetTop + a.offsetTop) + 'px';">
                            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-flag-fill" viewBox="0 0 16 16">
                              <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
                            </svg>
                            &nbsp;
                          </button>
                        </div>
                        <div class="card-body col-12" id="ocena" style="margin: auto; text-align: center; transition: 2s ease;">
                          
                        </div>
                        <div class="card-body col-12 col-md-10" id="kome" style="margin-left: auto; transition: 2s ease;">
                          
                        </div>
                  
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
    </div>

    <div id="essa" style="position: absolute; margin: auto; width: 80%; left: 10%;">

                          </div>
  <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>
    
        <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        </a>
    
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Strona główna</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Posty</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">O nas</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pomoc</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">PREMIUM</a></li>
        </ul>
      </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="pytanie.js"></script>
  </body>
</html>