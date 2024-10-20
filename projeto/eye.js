// Seleciona o campo de senha e o ícone de olho
    const togglePassword = document.querySelector('.olho');
    const password = document.querySelector('box');

    // Adiciona um evento de clique no ícone
    togglePassword.addEventListener('click', () => {
        // Verifica o tipo atual do campo de senha
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        // Altera o tipo para mostrar ou ocultar a senha
        password.setAttribute('type', type);

        // Altera o estado do ícone para indicar se a senha está visível ou oculta
        if (type === 'text') {
            togglePassword.innerHTML = `
                <lord-icon
                    src="https://cdn.lordicon.com/dicvhxpz.json"
                    trigger="hover"
                    colors="primary:black,secondary:black"
                    style="width:25px;height:25px">
                    </lord-icon>
            `;
        } else {
            togglePassword.innerHTML = `
                <lord-icon
                    src="https://cdn.lordicon.com/dicvhxpz.json"
                    trigger="hover"
                    state="hover-cross"
                    colors="primary:black,secondary:black"
                    style="width:25px;height:25px">
                    </lord-icon>
            `;
        }
    });
