<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe| Twój profil</title>
    <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <script>
    var essa = "essa";
    var nic = "";

    var bycz = '<div class="card col-12"><div class="card-header bg-danger-subtle text-end" style="border: 0px !important;"><svg xmlns="http://www.w3.org/2000/svg" onclick="document.getElementById(essa).innerHTML = nic;"style="width: 2rem; cursor: pointer;" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16"><path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/></svg></div><div class="card-header bg-danger-subtle"><h2 class="p-3 text-center">Zgłoszenie nr: 2100</h2></div><div class="card-body"><p>Twoje pytanie pt. "Dlaczego Anna Gałwa przechodzi przez środek ronda" zostało zawieszone z powodu naruszenia zasad regulaminu</p></div></div>'
  </script>
 
  </head>
  <body>
  <header class="p-3 text-bg-dark mb-3">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" >
            <a href="" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4" >
              <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
            </a>
  
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
              <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto "  >Strona główna</a></li>
              <li><a href="posty.php"  class="btn btn-outline-info me-2 mb-3 mb-lg-auto " >Posty</a></li>
              <li>
                <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php" data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="kategorie.php?kat=HTML">HTML</a></li>
                  <li><a class="dropdown-item" href="kategorie.php?kat=CSS">CSS</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul></li>
                <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2"  >O nas</a></li>
              <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2"  >Pomoc</a></li>
                
              <li><button onclick="location.href = 'cennik.php'" type="button" class="mb-3 mb-xl-auto btn btn-outline-warning me-auto" >PREMIUM</button></li>
            </ul>
  
            <form class="col-12 col-lg-auto mb-3 mb-xl-0 me-lg-3 " role="search">
              <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
            </form>
  
            <div class="text-center mb-2 mb-xl-0 col-12 col-xl-auto text-xl-end">
              <button type="button" class="btn btn-outline-light me-2">Login</button>
              <button type="button" class="btn btn-info">Sign-up</button>
            </div>
          </div>
          </div>
  </header>
    <br><br>

  <div class="container">
    <div class="card col-12" style="transition: 2s ease;">
        <div class="card-header bg-info-subtle">
            <h2 class="p-3 text-center ">Twój profil</h2>
        </div>
        <div class="card-body col-12" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
            <div class="card col-12 col-lg-5" style="transition: 1s ease-out;">
                <div class="card-header bg-success-subtle">
                    <h2 class="p-3 text-center">Informacje o Tobie</h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <td>Imię</td>
                            <td class="text-center">Jakub</td>
                        </tr>
                        <tr>
                            <td>Nazwisko:</td>
                            <td class="text-center">Żyrek</td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td class="text-center">bla@gmail.com</td>
                        </tr>
                        <tr>
                            <td>Hasło</td>
                            <td style="display: flex; flex-wrap: wrap; justify-content: center; align-items: center;">
                                <span style="font-size: 1.5rem;">··················&nbsp;&nbsp;</span>
                                <button class="btn btn-outline-dark" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
                                    <span>Pokaż hasło&nbsp;&nbsp;</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                      </svg>
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card col-12 col-lg-6 mt-2 mt-lg-0" style="transition: 1s ease-out;">
                <div class="card-header bg-warning-subtle">
                    <h2 class="p-3 text-center">Twoje zakupy</h2>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tr>
                            <td>PLAN PREMIUM</td>
                            <td class="text-center text-success">Aktywny do 1.04.2022</td>
                            <td class="text-center">34,00 zł</td>
                            <td><button type="button" class="btn btn-outline-danger">Zrezygnuj</button></td>
                        </tr>
                        <tr>
                            <td>PLAN PREMIUM</td>
                            <td class="text-center text-danger">Niektywny od 1.03.2022</td>
                            <td class="text-center">34,00 zł</td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card col-12 col-lg-4 mt-4" style="transition: 1s ease-out;">
                <div class="card-header bg-primary-subtle">
                    <h2 class="p-3 text-center">Zdjęcie profilowe</h2>
                </div>
                <div class="card-body justify-content-center justify-content-lg-between">
                    <img class="rounded-circle" style="margin-left: 12.5%; width: 75%;" src="images/user.png" alt="user">
                    <br><br>
                    <form action="" method="post" class="needs-validation" novalidate>
                        <input class="form-control col-12" type="file" name="zdjecie" accept="image/*" id="file">
                        <br>
                        <input type="submit" value="Zatwierdź zmiany" class="form-control btn btn-outline-primary">
                    </form>
                </div>
            </div>

            <div class="card col-12 col-lg-7 mt-3" id="card" style="transition: 1s ease-out;">
              <div class="card-header bg-danger-subtle">
                  <h2 class="p-3 text-center">Powiadomienia</h2>
              </div>
              <div class="card-body">
                <table class="table table-hover" style="transition: 1s ease-out;">
                  <tr>
                      <td class="col-1">1.</td>
                      <td class="text-danger col-10">Twoja odpowiedź została zgłoszona do administratora z powodu naruszenia regulaminu</td>
                      <td class="col-1 text-end"><button type="button" class="btn btn-outline-warning" onclick="document.getElementById('essa').innerHTML = bycz; var a = document.getElementById('card'); document.getElementById('essa').style.top = (a.offsetTop + 20) + 'px';">Zobacz</button></td>
                  </tr>
                  <tr>
                    <td class="col-1">1.</td>
                    <td class="text-danger col-8">Twoja odpowiedź została zgłoszona do administratora z powodu naruszenia regulaminu</td>
                    <td class="col-3 text-end"><button type="button" class="btn btn-outline-warning">Odwołaj się</button></td>
                </tr>
              </table>
              </div>
          </div>


          <div class="card col-12 mt-3" id="card" style="transition: 1s ease-out;">
            <div class="card-header bg-dark-subtle">
                <h2 class="p-3 text-center">Ustawienia</h2>
            </div>
            <div class="card-body" style="display: flex; justify-content: space-between; flex-wrap: wrap;">
              <div class="card col-12 col-md-6 mt-3" id="card" style="transition: 1s ease-out;">
                <div class="card-header bg-dark-subtle">
                    <h2 class="p-3 text-center">Zmiana hasła</h2>
                </div>
                <div class="card-body">
                  <form action="" method="post" class="needs-validation" novalidate>
                    <div class="col-12" style="display: flex; justify-content: space-between; flex-wrap: nowrap;">
                      <span class="col-2">Stare hasło:</span>
                      <input type="password" class="form-control col-8">
                    </div>
                  </form>
                </div>
              </div>
              <div class="card col-12 col-md-5 mt-3" id="card" style="transition: 1s ease-out;">
                <div class="card-header bg-dark-subtle">
                    <h2 class="p-3 text-center">Usuwanie konta</h2>
                </div>
                <div class="card-body">
                  <form action="" method="post">
                    <p>Tej operacji nie da się odwrócić</p>
                    <div style="display: flex; align-items: center;">
                      <input type="checkbox" name="zgoda" id="zgoda" class="" required>&nbsp;&nbsp;<label for="zgoda">Jestem tego w pełni świadomy</label>
                    </div>
                    <br>
                    <input type="submit" value="Usuń moje konto" class="btn btn-outline-danger form-control">
                  </form>
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
    <script src="formularz.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>