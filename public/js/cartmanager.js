var cartManager = {

    cart: null,

    init: function() {
        this.setDirty();
        var buttons = document.querySelectorAll('.product-btn');

        for(var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', cartManager.addItemToCart, false);
        }

        window.addEventListener('scroll', cartManager.handleScroll, false);
        window.addEventListener('touchmove', cartManager.handleScroll, false);

        cartManager.cart = new Cart(document.getElementById('thecart'));
        cartManager.cart.syncCart(this.syncButtons.bind(this));
    },

    handleScroll: function(ev) {
        var cart = document.getElementById('thecart');
        if(document.body.scrollTop > 400) {
            cart.className = 'fixit';
        } else {
            cart.className = '';
        }
    },

    setDirty: function() {
        var dirt = document.getElementById('dirty-bit');
        dirt.value = 1;
        console.log('setting dirt');
    },

    addItemToCart: function(ev) {
        var button = ev.target;

        if(button.className === 'button product product-btn added') {
            return;
        }
        var buttonId = button.getAttribute('data-product-id');

        button.innerHTML = 'Adding...';

        var added = function() {
            button.innerHTML = 'In Your Cart';
            button.className = 'button product product-btn added';
        }

        var failed = function() {
            button.innerHTML = 'Add to Cart';
            alert('Failed to add to cart');
        }
        cartManager.cart.requestAddition(buttonId, added, failed);
    },

    syncButtons: function(idList) {
        var id;
        var buttons = document.querySelectorAll('.product-btn');
        _.times(buttons.length, function(i) {
            id = parseInt(buttons[i].id.substr(4));
            if(_.indexOf(idList, id) !== -1) {
                buttons[i].className = 'button product product-btn added';
                buttons[i].innerHTML = 'In Your Cart';
            } else {
                buttons[i].className = 'button product product-btn';
                buttons[i].innerHTML = 'Add To Quote';
            }
        });
    }
}
//# sourceMappingURL=cartmanager.js.map
