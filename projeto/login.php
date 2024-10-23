<!DOCTYPE HTML>
<html lang="pt-br">
	<link rel="icon" href="assets/cinecon.png" type="image/x-icon">
	
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="cinema.css">
	<link rel="stylesheet" href="variables.css">
	<link rel="stylesheet" href="responsivo.css">
    <script src="messagem_temp.js"></script>
    <script src="eye.js"></script>
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

        <fieldset class="form__login">
            <div class="legend">ENTRAR</div><br><br>
            <form method="post" action="login.php">
                
                <label class="label__form__login" for="email">Email:</label>
                <input class="box" type="email" id="box" name="email"><br><br>
                
                <label class="label__form__login" for="senha">Senha:</label>
                <input class="box" type="password" id="box" name="senha"><br><br>

                <div class="input__login">
                    <input class="button2__login" type="submit" value="ENTRAR" name="submit"> 
                </div>
            </form>
        </fieldset>



    <?php
	if (isset($_POST['submit'])) {
		include_once('conexao.php');

		// Sanitizar e validar entradas
		$senha = filter_var($_POST['senha']);
		$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

		// Verifica usuário e senha
		$sql   =   mysqli_query($conexao, " SELECT email, senha FROM cadastro WHERE 
		email='$email' AND senha='$senha'") or die("ERRO NO COMANDO SQL");

		//Linhas afetadas pela consulta
		$row   =  mysqli_num_rows($sql);

		//Verifica se retornou algo
		if ($row == 0) {
			echo "<p id='error-message'> Usuário ou senha inválidos</p>";
		} else {

			while ($dados = mysqli_fetch_assoc($sql)) {
				session_start();
				$_SESSION["id"]    =  $dados['id'];
				$_SESSION["nome"]  =  $dados['nome'];
				header("Location: index.html");
			}
		}
	}
	?>
</body>

</html>




