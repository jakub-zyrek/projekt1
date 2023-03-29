<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum internetowe| O nas</title>
  <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300&family=Roboto:wght@100&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: Roboto;
    }
  </style>
</head>

<body>
  <header class="p-3 text-bg-dark mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
          <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Strona główna</a></li>
          <li><a href="posty.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Posty</a></li>
          <li>
            <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php" data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="kategorie.php?kat=HTML">HTML</a></li>
              <li><a class="dropdown-item" href="kategorie.php?kat=CSS">CSS</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2">O nas</a></li>
          <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2">Pomoc</a></li>

          <li><button onclick="location.href = 'cennik.php'" type="button" class="mb-3 mb-xl-auto btn btn-outline-warning me-auto">PREMIUM</button></li>
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

  <div class="container">
    <h1 class="text-center">O nas</h1>
    <br>
    <div class="col-12" style="text-align: justify;">
      <p>
        Misją naszego forum programistycznego jest tworzenie społeczności programistów, którzy dzielą się swoją wiedzą, doświadczeniem i najlepszymi praktykami w dziedzinie programowania. Chcemy, aby nasza strona była miejscem, gdzie programiści o różnych poziomach zaawansowania mogą wymieniać się informacjami i pomagać sobie nawzajem w rozwiązywaniu problemów technicznych.
<br><br>
        Celem naszej społeczności jest również promowanie dobrych praktyk programistycznych oraz zachęcanie do nauki i rozwoju w tej dziedzinie. Dążymy do tego, aby nasze forum było miejscem, gdzie programiści będą mogli zdobywać nowe umiejętności, rozwijać się w swoich karierach zawodowych i nawiązywać wartościowe kontakty z innymi specjalistami z branży.
<br><br>
        W naszej misji kładziemy także duży nacisk na tolerancję i szacunek wobec innych uczestników naszej społeczności. Chcemy, aby nasze forum było miejscem, gdzie wszyscy programiści, niezależnie od swojego doświadczenia i poziomu wiedzy, będą czuli się bezpiecznie i szanowani, a wszelkie zachowania łamiące nasze zasady zostaną natychmiast usuwane.
      </p>
    </div>
    <br>
    <br>
    <br>
    <h1 class="text-center">Nasz zespół</h1>
    <br>
    <div class="col-12 col-lg-10 text-center" style=" display: flex; flex-wrap: wrap; margin: auto; justify-content: space-between; align-items: center;">
      <div class="col-12 col-md-5">
        <img src="images/jolanta.jpg" class="rounded-circle col-7 col-md-10 p-2 p-md-4" alt="Jolanta Kałamaga" style=" text-align: center;">
      </div>
      <div class="col-12 col-md-7 p-4" >
        <h1 class="text-center">Jolanta Kałamaga</h1>
        <h4 class="text-center text-info">MODERATOR</h4>
        <br>
        <p style="text-align: justify;">Osoba odpowiedzialna za moderowanie forum internetowego, czyli kontrolowanie postów i komentarzy użytkowników, aby zapewnić, że są one zgodne z regulaminem forum. Moderator odpowiada również na pytania użytkowników i pomaga rozwiązywać problemy związane z funkcjonowaniem forum.</p>
      </div>
    </div>
    <br>
    <div class="col-12 col-lg-10 text-center" style=" display: flex; flex-wrap: wrap; margin: auto; justify-content: space-between; align-items: center;">
      <div class="col-12 col-md-5">
        <img src="images/kazimierz.jpg" class="rounded-circle col-7 col-md-10 p-2 p-md-4" alt="Jolanta Kałamaga" style=" text-align: center;">
      </div>
      <div class="col-12 col-md-7 p-4" >
        <h1 class="text-center">Kazimierz Kazimierski</h1>
        <h4 class="text-center text-info">ADMINISTRATOR</h4>
        <br>
        <p style="text-align: justify;"> Osoba zarządzająca i nadzorująca całe forum internetowe. Administrator dba o bezpieczeństwo forum, aktualizuje oprogramowanie, zarządza bazą danych i podejmuje decyzje związane z rozwojem forum.</p>
      </div>
    </div>
    <br>
    <div class="col-12 col-lg-10 text-center" style=" display: flex; flex-wrap: wrap; margin: auto; justify-content: space-between; align-items: center;">
      <div class="col-12 col-md-5">
        <img src="images/borzena.jpeg" class="rounded-circle col-7 col-md-10 p-2 p-md-4" alt="Jolanta Kałamaga" style=" text-align: center;">
      </div>
      <div class="col-12 col-md-7 p-4" >
        <h1 class="text-center">Borzena PZ</h1>
        <h4 class="text-center text-info">OSOBA DS. MARKETINGU</h4>
        <br>
        <p style="text-align: justify;">Osoba zajmująca się promocją forum internetowego. Specjalista ds. marketingu tworzy kampanie reklamowe, pozycjonuje forum w wyszukiwarkach internetowych, tworzy strategie marketingowe i działań mających na celu przyciągnięcie nowych użytkowników.</p>
      </div>
    </div>
    <br>
    <div class="col-12 col-lg-10 text-center" style=" display: flex; flex-wrap: wrap; margin: auto; justify-content: space-between; align-items: center;">
      <div class="col-12 col-md-5">
        <img src="images/mariusz.jpg" class="rounded-circle col-7 col-md-10 p-2 p-md-4" alt="Jolanta Kałamaga" style=" text-align: center;">
      </div>
      <div class="col-12 col-md-7 p-4" >
        <h1 class="text-center">Mariusz Noraj</h1>
        <h4 class="text-center text-info">GRAFIK</h4>
        <br>
        <p style="text-align: justify;">Osoba odpowiedzialna za tworzenie graficznej części naszego forum internetowego.</p>
      </div>
    </div>
  </div>



  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

      <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          
        </svg>
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
</body>

</html>