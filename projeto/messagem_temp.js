// Função para ocultar mensagens após 3 segundos com efeito de fade out
function hideMessages() {
    const successMessage = document.getElementById('success-message');
    const errorMessage = document.getElementById('error-message');


    // Verifica e oculta a mensagem de sucesso
    if (successMessage) {
        setTimeout(() => {
            successMessage.classList.add('fade-out-hidden'); // Adiciona a classe para o efeito
            setTimeout(() => {
                successMessage.style.display = 'none'; // Remove o elemento do DOM
            }, 1000); // Tempo igual ao da transição (1 segundo)
        }, 1000); // 3000 ms = 3 segundos
    }

    // Verifica e oculta a mensagem de erro
    if (errorMessage) {
        setTimeout(() => {
            errorMessage.classList.add('fade-out-hidden'); // Adiciona a classe para o efeito
            setTimeout(() => {
                errorMessage.style.display = 'none'; // Remove o elemento do DOM
            }, 1000); // Tempo igual ao da transição (1 segundo)
        }, 1000); // 3000 ms = 3 segundos
    }
}


// Chamar a função ao carregar a página
window.onload = hideMessages;