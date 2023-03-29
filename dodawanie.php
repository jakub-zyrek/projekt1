<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum internetowe| Logowanie</title>
    <link href="bootstrap.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.tiny.cloud/1/rteoicy470xacx65d435deq50dtul1au9nij82h2ri3bm1zf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

    <div class="container ">
        <div class="col">
            <div class="card mb-4 rounded-3 shadow-sm">
              <div class="card-header py-3 bg-info-subtle text-center">
                <p class="text-start">Jakub Żyrek | PHP</p>
                <h4 class="my-0 fw-normal text-start">Siemano wszystkim. Jak zrobić komentarz wieloliniowy w PHP?????</h4>
                <br><br>
                
              </div>
              <div class="card-body w-75" style="margin-left: auto;">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                      <div class="card-header py-3 bg-success-subtle text-center">
                        <p class="text-start">Jakub Żyrek | PHP</p>

                      </div>
                      <div class="card-body" style="padding-left: 5%;">
                        <textarea name="odpowiedz" id="odpowiedz" style="width: 100%; border-radius: 1vw; padding: 2%;" rows="20"> 
                        </textarea>
                        <br>
                        <button type="button" class="btn btn-lg btn-outline-info" style="display: flex; margin: auto; justify-content: center; align-items: center; font-size: 1rem;">
                          ODPOWIEDZ&nbsp;
                          <svg xmlns="http://www.w3.org/2000/svg" style="width: 1rem;" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg>
                      </button>
                        
                      </div>
                    </div>
                  
                  
              </div>
            </div>
          </div>
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
     
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'autolink codesample emoticons link lists casechange linkchecker a11ychecker mergetags inlinecss',
      toolbar: 'blocks fontsize | bold italic underline strikethrough | align |  numlist bullist | indent outdent | emoticons | codesample | removeformat',
      menubar: '',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
    });
  </script>
  </body>
</html>