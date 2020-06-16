var car={};
function init(){
    $.post(
        "admin/core.php",
        {
            "action" : "loadGoods"
        },
        showCart
    );
}


function loadCart(data) {
    //проверяю есть ли в localStorage запись cart
    if (localStorage.getItem('car')) {
        // если есть - расширфровываю и записываю в переменную cart
        car = JSON.parse(localStorage.getItem('car'));
        init();
    }
    else {
        $('.bucketlist').html('Корзина пуста!');
    }
}

function showCart(data) {
    if (!isEmpty(car) && data) {
        $('.bucketlist').html('Корзина пуста!');
    }
    var goods = JSON.parse(data);
            var out = '';
            var total = 0;
            for (let goodsId in car) {
                for (let key in goods) {
                    if (goods[key].id === goodsId) {
                        out += `<div class="product">`;
                        out += `<button data-id="${goodsId}" class="del-goods">x</button>`;
                        out += `<img class="productimg" src="img/${goods[key].img}">`;
                        out += `<div class="addelem"> <button class="minus" data-id="${goodsId}" ><i class="fas fa-minus"></i></button><p class="value">${car[goodsId]}</p> <button class="plus" data-id="${goodsId}"><i class="fas fa-plus"></i></button></div>`;
                        out += `<p class="productname">${goods[key].name}</p>`;
                        out += `<p class="productprice">${car[goodsId] * goods[key].cost}</p>`;
                        out += '</div>';
                        out += `<div class="sum"><p class="sumtitle">Сума:</p><p class="totalvalue">${total += car[goodsId] * goods[key].cost}</p><button class="bucketbtn"><img src="img/buy.svg"></button></div>`
                    }
                }
            }

            $('.bucketlist').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus').on('click', plusGoods);
            $('.minus').on('click', minusGoods);
    }


function delGoods(data) {
    //удаляем товар из корзины
    var id = $(this).attr('data-id');
    delete car[id];
    saveCart();

    loadCart(data);
}
function plusGoods(data) {
    //добавляет товар в корзине
    var id = $(this).attr('data-id');
    car[id]++;
    saveCart();
    loadCart(data);
}
function minusGoods(data) {
    //уменьшаем товар в корзине
    var id = $(this).attr('data-id');
    if (car[id]==1) {
        delete car[id];
    }
    else {
        car[id]--;
    }
    saveCart();
    loadCart(data);
}

function saveCart() {
    //сохраняю корзину в localStorage
    localStorage.setItem('car', JSON.stringify(car)); //корзину в строку
}

function isEmpty(object) {
    //проверка корзины на пустоту
    for (var key in object)
        if (object.hasOwnProperty(key)) return true;
    return false;
}


$(document).ready(function () {
    loadCart();
});