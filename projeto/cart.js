// Função para adicionar um item ao carrinho e salvar no localStorage
function addToCart(name, price) {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    // Procurar pelo produto e aumentar a quantidade se ele já estiver no carrinho
    const existingProduct = carrinho.find(item => item.name === name);
    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        carrinho.push({ name, price, quantity: 1 });
    }

    localStorage.setItem('carrinho', JSON.stringify(carrinho));
    alert(`${name} foi adicionado ao carrinho!`);
}

// Função para exibir o carrinho na página "cart.html"
function displayCarrinho() {
    const carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
    const carrinhoItemsDiv = document.getElementById('cart-items');
    const totalPriceEl = document.getElementById('total-price');

    carrinhoItemsDiv.innerHTML = '';
    let totalPrice = 0;

    cart.forEach(item => {
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;

        const itemEl = document.createElement('div');
        itemEl.classList.add('cart-item');
        itemEl.innerHTML = `
            <p>${item.name} - Quantidade: ${item.quantity} - Preço: R$${itemTotal.toFixed(2)}</p>
            <button onclick="removeFromCart('${item.name}')">Remover</button>
        `;
        carrinhoItemsDiv.appendChild(itemEl);
    });

    totalPriceEl.textContent = `Total: R$${totalPrice.toFixed(2)}`;
}

// Função para remover um item do carrinho
function removeFromCarrinho(name) {
    let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];

    carrinho = carrinho.filter(item => item.name !== name);
    localStorage.setItem('carrinho', JSON.stringify(carrinho));

    displayCarrinho();
}

// Função para limpar todo o carrinho
function clearCarrinho() {
    localStorage.removeItem('carrinho');
    displayCarrinho();
}

// Carregar o carrinho ao entrar na página "cart.html"
if (window.location.pathname.includes('carrinho.html')) {
    displayCarrinho();
}
