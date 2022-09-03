const myModal = document.getElementById('myModal');
const myInput = document.getElementById('myInput');

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
});

$('#cadastro').on('submit', function (e) {
  e.preventDefault();
  CalcAoSalvar();
});

function CalcAoSalvar(){
  $(".kcaldiaria").html("Meta diária: " + calorias + " Calorias");
  $(".protdiaria").html("x g Consumidas de" + proteina + " g Necessárias");
  $(".carbdiaria").html("x g Consumidas de" + carboidrato + " g Necessárias");
  $(".gorddiaria").html("x g Consumidas de" + gordura + " g Necessárias");

};

  