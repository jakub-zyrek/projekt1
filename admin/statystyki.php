<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel administratora | Statystyki</title>

    <link href="./../bootstrap.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  
        .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
  
        .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
  
          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
          z-index: 1500;
        }
      </style>
    
</head>
<body class="col-12 bg-dark" style="display: flex; ">
    <main class="d-flex flex-nowrap" id="e">
      
        <div class="p-3 text-bg-dark col-12">
          <a href="/" class="col-1 mb-3 mb-md-0 me-md-auto text-white text-decoration-none ">
            <span class="fs-4 d-none d-xxl-inline">Forum internetowe</span>
            <svg xmlns="http://www.w3.org/2000/svg" style="width: 3rem; margin: auto;" fill="currentColor" class="bi bi-chat-left-dots-fill d-xxl-none" viewBox="0 0 16 16">
                <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
              </svg>
          </a>
          <hr>
          <nav class="nav col-12 col-xxl-12 text-center text-xl-start">
            <div class="nav-item btn btn-outline-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
                    <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
                  </svg>
                  <span class="d-none d-xl-inline">
                    &nbsp;&nbsp;Główna
                  </span>
                
            </div>
            <div class="nav-item btn btn-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                    <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                  </svg><span class="d-none d-xl-inline">
                    &nbsp;&nbsp;Statystyki
                  </span>
            </div>
            <div class="nav-item btn btn-outline-primary text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                  </svg><span class="d-none d-xl-inline">
                    &nbsp;&nbsp;Użytkownicy
                  </span>
            </div>
            <div class="nav-item btn btn-outline-danger text-xl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                    <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
                  </svg><span class="d-none d-xl-inline">
                    &nbsp;&nbsp;Zgłoszenia
                  </span>
            </div>
            <div class="nav-item btn btn-outline-warning text-xxl-start text-white col-10 p-2 rounded-2 mt-3 align-items-center align-self-center">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.5rem;" fill="currentColor" class="bi bi-cone-striped" viewBox="0 0 16 16">
                    <path d="m9.97 4.88.953 3.811C10.159 8.878 9.14 9 8 9c-1.14 0-2.158-.122-2.923-.309L6.03 4.88C6.635 4.957 7.3 5 8 5s1.365-.043 1.97-.12zm-.245-.978L8.97.88C8.718-.13 7.282-.13 7.03.88L6.275 3.9C6.8 3.965 7.382 4 8 4c.618 0 1.2-.036 1.725-.098zm4.396 8.613a.5.5 0 0 1 .037.96l-6 2a.5.5 0 0 1-.316 0l-6-2a.5.5 0 0 1 .037-.96l2.391-.598.565-2.257c.862.212 1.964.339 3.165.339s2.303-.127 3.165-.339l.565 2.257 2.391.598z"/>
                  </svg><span class="d-none d-xxl-inline" style="font-size: small;">
                    &nbsp;&nbsp;Przerwa techniczna
                  </span>
            </div>
          </nav>
          <hr>
          <div class="dropdown" style="position: absolute;">
            <a href="#" class="d-flex align-items-center  text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
              <strong class="d-none d-lg-inline">zyrekjakub</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow ms-3" style="position: absolute;">
              <li><a class="dropdown-item" href="#">Profil</a></li>
              <li><a class="dropdown-item text-info" href="#">Przejdź do forum</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="#">Wyloguj się</a></li>
            </ul>
           </div>
        </div>
      
        </main>

        <main class="col-10" style="background-color: gainsboro;">
            <div class="col-11" style="display: flex; flex-wrap: wrap; justify-content: center; align-items: start; ">
                <div class="col-11 col-lg-6 col-xxl-4 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                        &nbsp;Użytkownicy
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <span class="">Ogółem: <b>&nbsp;&nbsp;200</b></span>
                            <br>
                            <span class="text-warning">Użytkowników PREMIUM: <b>&nbsp;&nbsp;20</b></span>
                            <br>
                            <span class="text-success">Ekspertów: <b>&nbsp;&nbsp;100</b></span>
                        </div>
                    </div>
                </div>
                <div class="col-5 col-lg-4 col-xxl-3 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3vw;" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                          </svg>
                        &nbsp;Zarobki
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <h1 class="text-center text-success">203,04 zł</h1>
                        </div>
                    </div>
                </div>
                <div class="col-5 col-lg-4 col-xxl-3 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem;" fill="currentColor" class="bi bi-clipboard-x-fill" viewBox="0 0 16 16">
                            <path d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3Zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3Z"/>
                            <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5v-1Zm4 7.793 1.146-1.147a.5.5 0 1 1 .708.708L8.707 10l1.147 1.146a.5.5 0 0 1-.708.708L8 10.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 10 6.146 8.854a.5.5 0 1 1 .708-.708L8 9.293Z"/>
                          </svg>
                        &nbsp;Zgłoszenia
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <h1 class="text-center text-danger">203</h1>
                        </div>
                    </div>
                </div>

                <div class="col-5 col-lg-4 col-xxl-3 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                            <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                          </svg>
                        &nbsp;Pytań
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <h1 class="text-center text-info">50</h1>
                        </div>
                    </div>
                </div>
                <div class="col-5 col-lg-4 col-xxl-3 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3rem" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
                            <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
                          </svg>
                        &nbsp;Odpowiedzi
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <h1 class="text-center text-info">200</h1>
                        </div>
                    </div>
                </div>


                <div class="col-5 col-lg-4 col-xxl-3 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" style="width: 2.3vw;" fill="currentColor" class="bi bi-chat-left-dots" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M5 6a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                          </svg>
                        &nbsp;Komentarzy
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <div class="p-1" style="font-size: 1.5rem;">
                            <h1 class="text-center text-info">400</h1>
                        </div>
                    </div>
                </div>
                <div class="col-11 m-3 bg-white p-2">
                    <div class="col-12 p-1" style="display: flex; align-items: center; justify-content: start; flex-wrap: nowrap; font-size: 1.5rem;">
                        Statystyki szczegółowe
                    </div>
                    <hr>
                    <div class="ps-3 pb-2">
                        <canvas class="my-4 w-100" id="myChart" width="900" height="250"></canvas>
                    </div>
                </div>
            </div>
        </main>
      <script src="sidebars.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js" integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script><script src="dashboard.js"></script>
      <script src="bootstrap.bundle.min.js"></script>
      <script>
        /* globals Chart:false, feather:false */

(() => {
  'use strict'

  feather.replace({ 'aria-hidden': 'true' })

  // Graphs
  const ctx = document.getElementById('myChart')
  // eslint-disable-next-line no-unused-vars
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        'dasd',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          15339,
          21345,
          18483,
          24003,
          23489,
          24092,
          12034
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        borderWidth: 4,
        pointBackgroundColor: '#007bff'
      }]
    },
    options: {
      plugins: {
        legend: {
          display: false
        },
        tooltip: {
          boxPadding: 3
        }
      }
    }
  })
})()

      </script>
</body>
</html>