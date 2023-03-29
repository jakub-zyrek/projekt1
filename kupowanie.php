<!DOCTYPE html>
<html lang="pl">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forum internetowe| Logowanie</title>
  <link href="bootstrap.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<body>
  <header class="p-3 text-bg-dark mb-3">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="" class="d-flex align-items-center mb-2 mb-xl-0 text-white text-decoration-none me-lg-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor"
            class="bi bi-chat-left-dots-fill" viewBox="0 0 16 16">
            <path
              d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
          </svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 menu">
          <li><a href="index.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Strona główna</a></li>
          <li><a href="posty.php" class="btn btn-outline-info me-2 mb-3 mb-lg-auto ">Posty</a></li>
          <li>
            <a class="btn btn-outline-info dropdown-toggle me-2 mb-3 mb-lg-auto " href="kategorie.php"
              data-bs-toggle="dropdown" aria-expanded="false">Kategorie </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="kategorie.php?kat=HTML">HTML</a></li>
              <li><a class="dropdown-item" href="kategorie.php?kat=CSS">CSS</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li><a href="onas.php" class="mb-3 mb-lg-auto btn btn-outline-info me-2">O nas</a></li>
          <li><a href="pomoc.php" class="mb-3 mb-lg-auto btn btn-outline-danger me-2">Pomoc</a></li>

          <li><button onclick="location.href = 'cennik.php'" type="button"
              class="mb-3 mb-xl-auto btn btn-outline-warning me-auto">PREMIUM</button></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-xl-0 me-lg-3 " role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..."
            aria-label="Search">
        </form>

        <div class="text-center mb-2 mb-xl-0 col-12 col-xl-auto text-xl-end">
          <button type="button" class="btn btn-outline-light me-2">Login</button>
          <button type="button" class="btn btn-info">Sign-up</button>
        </div>
      </div>
    </div>
  </header>


  <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
    <div class="card col-12 col-md-7 m-2">
      <div class="card-header p-3">
        <h2>Kupowanie planu PREMIUM</h2>
      </div>
      <div class="card-body">
        <form class="needs-validation col-11" style="margin-left: auto; margin-right: auto;" method="post" novalidate>
          <h4>Dane osobowe</h4>
          <br>
          <div class="ms-3">
            <div style="display: flex; justify-content: space-between;">
              <div class="col-5">
                <label for="firstName" class="form-label">Imię</label>
                <br>
                <input type="text" class="form-control" id="imie" placeholder="Imię" required>
              </div>
              <div class="col-6">
                <label for="firstName" class="form-label text-start">Nazwisko</label>
                <br>
                <input type="text" class="form-control align-items-center" id="firstName" placeholder="Nazwisko" required>
                <br>
              </div>
            </div>
            <div class="col-12">
              <label for="firstName" class="form-label text-start">Email</label>
              <br>
              <input type="email" class="form-control align-items-center" id="firstName" placeholder="Email" required
                style="margin-left: auto; margin-right: auto;">
              <br>
            </div>
          </div>
          <h4>Adres</h4>
          <br>
          <div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="ms-3">
            <div class="col-12 col-lg-6">
              <label for="firstName" class="form-label">Ulica</label>
              <br>
              <input type="text" class="form-control" id="ulica" placeholder="Ulica"
                style="margin-left: auto; margin-right: auto;" required>
            </div>
            <div class="col-12 col-lg-5 mt-3 mt-lg-0">
              <label for="firstName" class="form-label text-start">Numer</label>
              <br>
              <div style="display: flex; flex-wrap: nowrap; justify-content: space-between; align-items: center;">
                <input type="text" class="form-control align-items-center" id="numer" required>
                <span style="font-size: 1.5rem;">&nbsp;/&nbsp;</span>
                <input type="text" class="form-control align-items-center" id="dom">
              </div>
              <br>
            </div>
          </div>
          <div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="ms-3">
            <div class="col-12 col-lg-3">
              <label class="form-label">Województwo</label>
              <select name="woj" id="woj" class="form-select form-control" required>
                <option value="slask">ŚLĄSKIE</option>
                <option value="malo">MAŁOPOLSKIE</option>
                <option value="pom">POMORSKIE</option>
              </select>
            </div>
            <div class="col-12 col-lg-4 mt-3 mt-lg-0">
              <label class="form-label">Powiat</label>
              <select name="woj" id="woj" class="form-select form-control" required>
                <option value="slask">ŚLĄSKIE</option>
                <option value="malo">MAŁOPOLSKIE</option>
                <option value="pom">POMORSKIE</option>
              </select>
            </div>
            <div class="col-12 col-lg-4 mt-3 mt-lg-0">
              <label class="form-label">Miasto</label>
              <select name="woj" id="woj" class="form-select form-control" required>
                <option value="slask">ŚLĄSKIE</option>
                <option value="malo">MAŁOPOLSKIE</option>
                <option value="pom">POMORSKIE</option>
              </select>
            </div>
          </div>
          <br>
          <h4>Płatność</h4>
          <div class="ms-3">
            <div class="col-12" style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center;">
              <button type="button" class="btn btn-outline-dark col-12 col-lg-5"  onclick="kupno(1)">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-credit-card"
                  viewBox="0 0 16 16">
                  <path
                    d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                  <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                </svg>
                Karta
              </button>
              <button type="button" class="btn  btn-outline-dark col-12 col-lg-6 mt-3 mt-lg-0" onclick="kupno(2)"
                style="display: flex; flex-wrap: none; justify-content: center; align-items: center;">
                <img src="https://www.blik.com/layout/default/dist/gfx/logo/logo.svg" alt="logo_blika"
                  style="width: 30%">&nbsp;&nbsp;
                BLIK
              </button>
            </div>
          </div>
          <div id="platnosc">
            &nbsp;
          </div>
          <div class="align-items-center col-12">
            <br>
            <button type="submit" class="btn btn-warning col-12">Przejdź do PREMIUM</button>
          </div>
        </form>
      </div>
    </div>
    <div class="card col-12 col-md-4 m-2 text-center" >
      <div class="card-header p-3">
        <h3>Podsumowanie zamówienia</h3>
      </div>
      <div class="card-body">
        <div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;">
          <p>PLAN PREMIUM ULTIMATE</p>
          <p>34,00 zł</p>
        </div>
        <div style="display: flex; justify-content: space-between; padding: 2%;">
          <h5>RAZEM:</h5>
          <h5>34,00 zł</h5>
        </div>
        <div style="display: flex; justify-content: end;">
          <p>ZNIŻKA</p>&nbsp;
          <p class="text-success">- 34,00 zł</p>
        </div>
        <div style="display: flex; justify-content: space-between; border-bottom: 1px black solid;">
          <h5>ZE ZNIŻKĄ:</h5>
          <h5>0 zł</h5>
        </div>
        <br>
        <h5 style="text-align: center; margin-bottom: 2%;">KOD RABATAOWY</h5>
        <div class="col-12" style="display: flex; flex-wrap: nowrap; justify-content: space-between;">
          <input type="text" class="form-control" id="numer">&nbsp;&nbsp;
          <button class="btn btn-outline-danger col-3">
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-tag-fill" viewBox="0 0 16 16">
              <path d="M2 1a1 1 0 0 0-1 1v4.586a1 1 0 0 0 .293.707l7 7a1 1 0 0 0 1.414 0l4.586-4.586a1 1 0 0 0 0-1.414l-7-7A1 1 0 0 0 6.586 1H2zm4 3.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
            </svg>
          </button>
        </div>
        

      </div>

    </div>
  </div>


  <div class="container">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
      <p class="col-md-4 mb-0 text-muted">&copy; 2022 Company, Inc</p>

      <a href="/"
        class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32">
          <use xlink:href="#bootstrap" />
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
  <script src="formularz.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>

</html>