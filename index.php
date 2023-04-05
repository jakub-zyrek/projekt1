<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe</title>
    <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <style>
    table, thead, tbody {
      font-size: 80%;
      width: max-content;
    }
    button {
      text-align: right;
    }
</style>



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
                    <img src="'.$_SESSION['obraz'].'" alt="" width="32" height="32" class="rounded-circle me-2">
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
  <div class="container">
    <h1 class="text-center">Dołącz do naszej społeczności</h1>
  </div>

  <br><br>
  <div class="container w-100 text-white">
    <div class="bg-info p-2 float-start w-100 rounded-5">
      <h3 style="padding: 2%;">Najnowsze pytania bez odpowiedzi</h3>
      <br>
      <div class="w-100">
        <table class="table  col-7 tabelka " style="color: rgb(255, 255, 255); font-size: 1.5rem;">
          <thead  class="text-dark">
            <tr class="text-dark" >
              <th>#</th>
              <th>Pytanie</th>
              <th>Zadał</th>
              <th>Odp</th>
              <th></th>
            </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
              <td>1</td>
              <td>Jak coś tam</td>
              <td>jakubzyrek</td>
              <td>4</td>
              <td><button class="btn btn-outline-warning text-white">Przejdź</button></td>
            </tr>
            <tr>
              <td>2</td>
              <td>Jak coś tam</td>
              <td>jakubzyrek</td>
              <td>4</td>
              <td><button class="btn btn-outline-warning text-white">Przejdź</button></td>
            </tr>
            <tr>
              <td>3</td>
              <td>Jak coś tam</td>
              <td>jakubzyrek</td>
              <td>4</td>
              <td><button class="btn btn-outline-warning text-white">Przejdź</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      
    </div>
      
  </div>

  <div class="container" style=" text-align: center; clear: both;">
    <h2 style="text-align: center; width: 80%; margin: auto; padding-top: 5%; margin-bottom: 2%; font-weight: bolder; font-size: 2.5rem;">Przestrzeń programistów tworzona przez programistów</h2>
    <div style="display: flex; width: 90%; margin: auto; justify-content: space-between; " class="col-12">
      <svg onclick="lewy(i);" xmlns="http://www.w3.org/2000/svg"  fill="black" id="bi-arrow-left-circle" class="bi bi-arrow-left-circle col-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
      </svg>
      <div class=" border-info bycz">
        <p id="ess"></p>
      </div>
      <svg onclick="prawy(i);" xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-arrow-right-circle col-1" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z"/>
      </svg>
    </div>
  </div>
    
  <div class="container float-none" style="clear:both;">
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

    <script>

      var i = 0;

      var tab1 = ["Super! Bardzo pomocne! Ma formę jak portal społecznościowy, można zdobywać punkty, zapraszać, pomagać i dowiadywać się ciekawych rzeczy!", "Super, bo można się pytać innych ludzi o zadania, których się nie umie zrobić. Można odpowiadać na pytania innych ludzi i za to dostaje się punkty", "Epicka apka! Dużo pomagających użytkowników! POLECAM!!! ❤️", "Bardzo pomaga w lekcjach. Nie da jej się opisać słowami. Po prostu jest mega!!!"];
  
      function prawy(a) {
        i = i + 1;
        if (i > 3) {
          i = 0;
        }
       
        document.getElementById('ess').innerText = tab1[i];
      }

      function lewy(b) {
        i = i - 1;
        if (i < 0) {
          i = 3;
        }

        document.getElementById('ess').innerText = tab1[i];
        
      }
  
      prawy(0);
  </script>
  </body>
</html>