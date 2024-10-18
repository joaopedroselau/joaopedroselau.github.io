<!DOCTYPE HTML>
<html lang="pt-br">
	<link rel="icon" href="assets/cinecon.png" type="image/x-icon">
	
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cinema.css">
	<link rel="stylesheet" href="variables.css">
	<link rel="stylesheet" href="responsivo.css">
    <script src="messagem_temp.js"></script>
	<title>Cineastro's cinema</title>
</head>

<body>

	<header class="cab">
		<div class="cab__background"></div>
		<a href="index.html"><img class="cab__image" src="assets/cine.png"></a>
		<nav class="cab__menu">
			<ul>
				<li><a href="index.html" target="_self">CINEASTRO</a></li>
				<li><a href="programacao.html" target="_self">PROGRAMAÇÃO</a></li>
				<li><a href="filmes.html" target="_self">FILMES</a></li>
				<li><a href="noticias.html" target="_self">NOTÍCIAS</a></li>
				<li><a href="alimentos.html" target="_self">SNACK BAR</a></li>
				<li><a href="contato.html" target="_self">CONTATO</a></li>
			</ul>
		</nav>
		<nav class="cab__tools">
            <ul>
                <li><a href="ajuda/faq.html" target="_self">Ajuda</a></li>
                <li>|</li>
                <li><a href="signup.php" target="_self">Cadastro</a></li>
                <li>|</li>
                <li><a href="login.php" target="_self">Entrar</a></li>
			</ul>
			<div class="cab__social">
				<a href= "carrinho.html"><img class="cab__social__cart" src="https://pngimg.com/d/shopping_cart_PNG4.png"></a>
				<a href="https://www.instagram.com/cineastro.taubate/?utm_source=ig_web_button_share_sheet"><img src="https://www.edigitalagency.com.au/wp-content/uploads/new-Instagram-icon-white-png.png"></a>
				<a href="https://x.com/Cineastro_tbt"><img src="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/x-social-media-white-icon.png"></a>
			</div>
        </nav>
	</header>

        <fieldset class="form">
            <legend>CADASTRO DO CLIENTE</legend><br><br>
            <form method="post" action="signup.php">
                <label class="label_form" for="nome">Nome:</label>
                <input type="text" id="box" name="nome"><br><br>

                <label class="label_form" for="nascimento">Nascimento:</label>
                <input type="date" id="box" name="nascimento"><br><br>

                <label class="label_form" for="telefone">Telefone:</label>
                <input type="phone" id="box" name="telefone"><br><br>
                
                <label class="label_form" for="email">Email:</label>
                <input type="email" id="box" name="email"><br><br>

                
                <label class="label_form" for="senha">Senha:</label>
                <input type="password" id="box" name="senha"><br><br>

                <div class="input">
                    <input class="button2" type="submit" value="ENVIAR" name="submit">
                    <input class="button2" type="reset" value="LIMPAR TUDO" name="limpar">
                </div>
            </form>
        </fieldset>



    <?php
if (isset($_POST['submit'])) {
    include_once('conexao.php');

    // Sanitizar e validar entradas
    $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
    $nascimento = filter_var($_POST['nascimento'], FILTER_SANITIZE_STRING);
    $telefone = filter_var($_POST['telefone'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $senha = filter_var($_POST['senha'], FILTER_SANITIZE_STRING);


    if ($nome && $nascimento && $telefone && $email && $senha) {
        $stmt = $conexao->prepare("INSERT INTO cadastro (nome, nascimento, telefone, email, senha) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nome, $nascimento, $telefone, $email, $senha);

        try{
            if ($stmt->execute()) {
                echo "<p id='success-message'> Cadastro realizado com sucesso!</p>";
            } else {
                echo "<p id='error-message'> Erro ao realizar cadastro. Por favor, tente novamente.</p>";
            }
        } catch(Exception $e) {
            
                echo "<p id='error-message'> Email já cadastrado. Por favor, tente novamente.</p>";
            
        }

        $stmt->close();
    } else {
        echo "<p id='error-message'>Dados inválidos.</p>";
    }

    $conexao->close();
}
?>
</body>

</html>




