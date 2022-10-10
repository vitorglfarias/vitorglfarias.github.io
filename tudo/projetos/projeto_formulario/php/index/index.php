<!DOCTYPE html> <!--Alunos: Giovane, Henrique, Vinicius e Vitor - 3 Info 2.-->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../html-css-js/capa.css" />
    <link rel="icon" type="image/png" href="../../images/minilogo.png" />
    <script src="../../html-css-js/script.js" defer></script>
    <title>Página de Cadastro</title>
</head>
<body>

    <header>
        <img src="../../images/logo.png" id="logo" alt="logo vhg" />
        <h2 id="subt">PÁGINA DE CADASTRO</h2>
    </header>

    <h1 id="titulo">CONTA VHG</h1>

    <?php 

if($_SERVER["REQUEST_METHOD"] === "POST"){ 

    if(empty($_POST["nome"]) == TRUE || !preg_match("/[A-Za-zÀ-ú']{2,}/", $_POST['nome']) == TRUE || empty($_POST["sobrenon"]) == TRUE || !preg_match("/[A-Za-zÀ-ú ']{2,}/", $_POST['sobrenon']) == TRUE || empty($_POST["apeli"]) == TRUE || !preg_match("/^[a-zA-Z0-9_-]{3,16}$/",$_POST['apeli']) == TRUE || empty($_POST["mail"]) == TRUE || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == TRUE || empty($_POST["psw"]) == TRUE || !preg_match("/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/",$_POST["psw"]) == TRUE || (!empty($_POST["psw"]) && empty($_POST["confpsw"])) == TRUE || ($_POST["confpsw"] !== $_POST["psw"]) == TRUE || empty($_POST["fone"]) == TRUE || (strlen($_POST['fone']) < 10 || strlen($_POST['fone']) > 15) == TRUE || empty($_POST["cpf"]) == TRUE || (strlen($_POST['cpf']) < 11 || strlen($_POST['cpf']) > 14) == TRUE || empty($_POST["nasc"]) == TRUE || empty($_POST["termos"]) == TRUE){ //verificação para ver se contém erros, se houver, criará uma div de avisos.
        echo "<div id='avisos'>";
        echo "<img id='imagem-alerta' src='../../images/alerta.png' alt='alerta' />";
    }


    if (empty($_POST["nome"])){
        echo "<p class='resp'>Insira seu nome.</p>";
    } elseif(!preg_match("/[A-Za-zÀ-ú']{2,}/", $_POST['nome'])){
        echo "<p class='resp'>Seu nome não pode conter espaços, números e nem caracteres especiais.</p>";
    }

    if (empty($_POST["sobrenon"])){
        echo "<p class='resp'>Insira seu sobrenome.</p>";
    } elseif(!preg_match("/[A-Za-zÀ-ú ']{2,}/", $_POST['sobrenon'])){
        echo "<p class='resp'>Seu sobrenome não pode conter abreviações, números e nem caracteres especiais.</p>";
    }

    if(empty($_POST["apeli"])){
        echo "<p class='resp'>Nome de usuário não preenchido.</p>";
    } elseif(!preg_match("/^[a-zA-Z0-9_-]{3,16}$/", $_POST['apeli'])){ //uso de preg_match
        echo "<p class='resp'>Seu apelido precisa ter entre 3 e 16 caracteres, sem caracteres especiais.</p>";
    }

    if(empty($_POST["mail"])){
        echo "<p class='resp'>Digite um email.</p>";
    } elseif(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){ //uso de filter_var 
        echo "<p class='resp'>Este email é invalido.</p>";
    }

    if(empty($_POST["psw"])){
        echo "<p class='resp'>Digite uma senha.</p>";
    } elseif(!preg_match("/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/", $_POST['psw'])){
        echo "<p class='resp'>Sua senha deve conter pelo menos 8 caracteres, uma letra maiúscula, uma letra minúscula e um número.</p>";
    }

    if(!empty($_POST["psw"]) && empty($_POST["confpsw"])){
        echo "<p class='resp'>Confirme sua senha.</p>";
    } elseif($_POST["confpsw"] !== $_POST["psw"]){
        echo "<p class='resp'>As senhas estão diferentes, corrija essa joça.</p>";
    }

    if(empty($_POST["fone"])){
        echo "<p class='resp'>Insira seu número de telefone.</p>";
    } elseif(strlen($_POST['fone']) < 10 || strlen($_POST['fone']) > 15){
        echo "<p class='resp'>Seu número de telefone precisa ter no mínimo 10 e no máximo 15 caracteres.</p>";
    }

    if (empty($_POST["cpf"])){
        echo "<p class='resp'>Insira o CPF.</p>";
    } elseif(strlen($_POST['cpf']) < 11 || strlen($_POST['cpf']) > 14){
        echo "<p class='resp'>Seu número de cpf precisa ter 11 caracteres (sem máscara) ou 14 caracteres (com máscara).</p>";
    }

    if(empty($_POST["nasc"])){
        echo "<p class='resp'>Insira sua data de nascimento.</p>";
    }

    echo (empty($_POST["termos"])) ? "<p class='resp'>Assinale os termos para prosseguir.</p>" : "" ;  //ternario


    if(empty($_POST["nome"]) == TRUE || !preg_match("/[A-Za-zÀ-ú']{2,}/", $_POST['nome']) == TRUE || empty($_POST["sobrenon"]) == TRUE || !preg_match("/[A-Za-zÀ-ú ']{2,}/", $_POST['sobrenon']) == TRUE || empty($_POST["apeli"]) == TRUE || !preg_match("/^[a-zA-Z0-9_-]{3,16}$/",$_POST['apeli']) == TRUE || empty($_POST["mail"]) == TRUE || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL) == TRUE || empty($_POST["psw"]) == TRUE || !preg_match("/(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$/",$_POST["psw"]) == TRUE || (!empty($_POST["psw"]) && empty($_POST["confpsw"])) == TRUE || ($_POST["confpsw"] !== $_POST["psw"]) == TRUE || empty($_POST["fone"]) == TRUE || (strlen($_POST['fone']) < 10 || strlen($_POST['fone']) > 15) == TRUE || empty($_POST["cpf"]) == TRUE || (strlen($_POST['cpf']) < 11 || strlen($_POST['cpf']) > 14) == TRUE || empty($_POST["nasc"]) == TRUE || empty($_POST["termos"]) == TRUE){
        echo "</div>";
    }
}

?>

    <form action="<?=$_SERVER['PHP_SELF']?>" method="post" >

        <h3>Seus dados:</h3>
        
        <input type="text" name="nome" id="nome" class="valid-invalid" placeholder="Nome" pattern="[A-Za-zÀ-ú']{2,}" 
        value="<?=htmlspecialchars(!empty($_POST['nome'])?$_POST['nome']:''); ?>" required /> <!--Alphanumeric without space-->
        
        <input type="text" name="sobrenon" id="sobrenome" class="valid-invalid" placeholder="Sobrenome" pattern="[A-Za-zÀ-ú ']{2,}" 
        value="<?=htmlspecialchars(!empty($_POST['sobrenon'])?$_POST['sobrenon']:''); ?>" required /> <!--Alphanumeric with space-->
        
        <input type="text" name="apeli" id="apelido" class="valid-invalid" placeholder="Apelido" pattern="^[a-zA-Z0-9_-]{3,16}$" 
        value="<?=htmlspecialchars(!empty($_POST['apeli'])?$_POST['apeli']:''); ?>" required /> <!-- Alphanumeric string that may include _ and – having a length of 3 to 16 characters -->
       
        <input type="email" name="mail" id="mail" class="valid-invalid" placeholder="Email" pattern="^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$"
        value="<?=htmlspecialchars(!empty($_POST['mail'])?$_POST['mail']:''); ?>" required /> <!--Common email Ids-->
        
        <input type="password" name="psw" id="senha" class="valid-invalid" placeholder="Senha" pattern="(?=(.*[0-9]))((?=.*[A-Za-z0-9])(?=.*[A-Z])(?=.*[a-z]))^.{8,}$" required /> <!--Moderate-->
        
        <input type="password" name="confpsw" id="confirmsenha" class="valid-invalid" placeholder="Confirmar senha" required />
       
        <input type="tel" name="fone" id="fone" class="valid-invalid" placeholder="Telefone" minlength="14" maxlength="15"
        value="<?=htmlspecialchars(!empty($_POST['fone'])?$_POST['fone']:''); ?>" required /> 
        
        <input type="text" name="cpf" id="cpf" class="valid-invalid" placeholder="CPF" minlength="11" maxlength="14"
        value="<?=htmlspecialchars(!empty($_POST['cpf'])?$_POST['cpf']:''); ?>" required /> 

        <label for="nasc" id="labelnasc">Data de Nascimento:</label>
        <input type="date" name="nasc" id="nascinput" class="valid-invalid" 
        value="<?=htmlspecialchars(!empty($_POST['nasc'])?$_POST['nasc']:''); ?>" required />
        
        <select name="options" id="genero" >
            <option class="select" id="gen" value="" disabled selected>Gênero</option>
            <option value="masculino" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "masculino" ): ?> selected <?php endif ?> >Masculino</option>
            <option value="feminino" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "feminino" ): ?> selected <?php endif ?> >Feminino</option>
            <option value="outro" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "outro" ): ?> selected <?php endif ?> >Outro</option>
        </select>

        <label for="termos" id="licenca">Aceito os <strong>termos de uso</strong> e <strong>política de privacidade</strong></label>
        <input type="checkbox" name="termos" id="termos" required />

        <input type="submit" id="enviabtn" value="Enviar" />

    </form>
    
</body>
</html>