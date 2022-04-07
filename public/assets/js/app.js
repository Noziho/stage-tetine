const burger = document.querySelector('#burger');

burger.addEventListener("click", ()=> {
    $('.responsive-menu').toggleClass('hide', 'show')
})

const price = document.querySelectorAll('.price-order');

function totalOrder() {
    let total = 0;
    $(price).each(function(){
        total += parseFloat(this.innerHTML)
    });
    $('#total').text(total);
    console.log(total)
}
totalOrder();

