// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
  
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()


  var karta = '<div style="display: flex; justify-content: space-between; flex-wrap: wrap;" class="col-12 m-3 "><div class="col-12"><label for="firstName" class="form-label text-start col-12">Numer karty</label><br><input type="karta" class="form-control align-items-center" id="firstName" placeholder="Numer karty" required style="margin-left: auto; margin-right: auto;"><br></div><div style="display: flex; justify-content: space-between; flex-wrap: nowrap;" class="col-12"><div class="col-6"><label for="firstName" class="form-label">Data ważności (MM-YY)</label><br><div style="display: flex; flex-wrap: nowrap; justify-content: space-between; align-items: center;"><input type="number" min="0" max="12" class="form-control align-items-center" id="numer" required><span style="font-size: 1.5rem;">&nbsp;/&nbsp;</span><input type="number" min="22" max="99" class="form-control align-items-center" id="dom" required></div></div>&nbsp;<div class="col-5"><label for="firstName" class="form-label text-start">CSV</label><br><input type="csv" class="form-control align-items-center" id="firstName" placeholder="CSV" maxlength="3" required style="margin-left: auto; margin-right: auto;"><br></div></div></div>';

  var blik = '<div class="col-12 col-md-8 m-3"><label for="firstName" class="form-label">Kod BLIK</label><div style="display: flex; flex-wrap: nowrap; align-items: center;"><input type="text" maxlength="1" class="form-control" id="blik1" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik2" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik3" required><span class="m-3">-</span><input type="text" maxlength="1" class="form-control" id="blik4" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik5" required>&nbsp;<input type="text" maxlength="1" class="form-control" id="blik6" required></div></div>'
  
function kupno(a) {
  if (a == 1) {
    document.getElementById('platnosc').innerHTML = karta;
  } else if (a == 2) {
    document.getElementById('platnosc').innerHTML = blik;
  }
}