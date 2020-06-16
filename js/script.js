var car = {}; // корзина

function init() {
  //вычитуем файл goods.json
 //$.getJSON("goods.json", goodsOut);
$.post(
    "admin/core.php",
    {
      "action":"loadGoods"
    },
  goodsOut
);

}

function goodsOut(data) {
data = JSON.parse(data);
  var out='';
  var i = 1;
  for (var key in data) {

    out +='<div class="phcard">';

    out +=`<p class="pprodname">${data[key].name}</p>`;
    out +=`<img class = "redmi" src="img/${data[key].img}" alt="">`;
    out +=`<p class="pprice">${data[key].cost} грн.</p>`;
    out +='<a class="button" href="#"><img data-id="'+key+'" onclick="document.getElementById(\'buybtn'+i+'\').src=\'img/buck.svg\'" id="buybtn'+i+'" src="img/buybtn.svg"></a>';
    out +='</div>';
    i++;
  }
  $('.catalog').html(out);
  $('#buybtn1').on('click', addToCart);
  $('#buybtn2').on('click', addToCart);
  $('#buybtn3').on('click', addToCart);
  $('#buybtn4').on('click', addToCart);
  $('#buybtn5').on('click', addToCart);
  $('#buybtn6').on('click', addToCart);
  $('#buybtn7').on('click', addToCart);
  $('#buybtn8').on('click', addToCart);
}

function addToCart() {
  //добавляем товар в корзину
  var id = $(this).attr('data-id');
  // console.log(id);
  if (car[id]==undefined) {
    car[id] = 1; //если в корзине нет товара - делаем равным 1
  }
  else {
    car[id]++; //если такой товар есть - увеличиваю на единицу
  }
  saveCart();
}

function saveCart() {
  //сохраняю корзину в localStorage
  localStorage.setItem('car', JSON.stringify(car)); //корзину в строку
}

function loadCart() {
  //проверяю есть ли в localStorage запись cart
  if (localStorage.getItem('car')) {
    // если есть - расширфровываю и записываю в переменную cart
    car = JSON.parse(localStorage.getItem('car'));

  }
}

$(document).ready(function () {
  init();
  loadCart();
});

