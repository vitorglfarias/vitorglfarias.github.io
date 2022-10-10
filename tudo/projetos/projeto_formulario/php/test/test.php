<!DOCTYPE html> <!--Alunos: Giovane, Henrique, Vinicius e Vitor - 3 Info 2.-->
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../html-css-js/capa.css" />
    <link rel="icon" type="image/png" href="../../images/minilogo.png" />
    <title>Página de Cadastro</title>
</head>
<body>

    <header>
        <img src="../../images/logo.png" id="logo" alt="logo vhg">
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
        echo "<p class='resp'>Seu nome não pode conter espaços, números e nem caracteres especiais, e precisa ter pelo menos 2 caracteres.</p>";
    }

    if (empty($_POST["sobrenon"])){
        echo "<p class='resp'>Insira seu sobrenome.</p>";
    } elseif(!preg_match("/[A-Za-zÀ-ú ']{2,}/", $_POST['sobrenon'])){
        echo "<p class='resp'>Seu sobrenome não pode conter abreviações, números e nem caracteres especiais, e precisa ter pelo menos 2 caracteres.</p>";
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
    } elseif(strlen($_POST['fone']) < 10 || strlen($_POST['fone']) > 11 || !preg_match("/^\d+$/", $_POST['fone'])){
        echo "<p class='resp'>Seu número de telefone precisa ter no mínimo 10 e no máximo 11 caracteres (utilize apenas números).</p>";
    }

    if (empty($_POST["cpf"])){
        echo "<p class='resp'>Insira o CPF.</p>";
    } elseif(strlen($_POST['cpf']) !== 11 || !preg_match("/^\d+$/", $_POST['cpf'])){
        echo "<p class='resp'>Seu número de cpf precisa ter exatamente 11 caracteres (utilize apenas números).</p>";
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
        
        <input type="text" id="nome" placeholder="Nome" name="nome" value="<?=htmlspecialchars(!empty($_POST['nome'])?$_POST['nome']:''); ?>" />
        
        <input type="text" id="sobrenome" placeholder="Sobrenome"  name="sobrenon" value="<?=htmlspecialchars(!empty($_POST['sobrenon'])?$_POST['sobrenon']:''); ?>" />
        
        <input type="text" id="apelido" placeholder="Apelido" name="apeli" value="<?=htmlspecialchars(!empty($_POST['apeli'])?$_POST['apeli']:''); ?>" />
       
        <input type="email" name="mail" id="mail" placeholder="Email" value="<?=htmlspecialchars(!empty($_POST['mail'])?$_POST['mail']:''); ?>" />
        
        <input type="password" name="psw" id="senha" placeholder="Senha" />
        
        <input type="password" name="confpsw" id="confirmsenha" placeholder="Confirmar senha" />
       
        <input type="tel" name="fone" id="fone" placeholder="Telefone" value="<?=htmlspecialchars(!empty($_POST['fone'])?$_POST['fone']:''); ?>" /> 
        
        <input type="text" name="cpf" id="cpf" placeholder="CPF" value="<?=htmlspecialchars(!empty($_POST['cpf'])?$_POST['cpf']:''); ?>" />

        <label for="nasc" id="labelnasc">Data de Nascimento:</label>
        <input type="date" name="nasc" id="nascinput" value="<?=htmlspecialchars(!empty($_POST['nasc'])?$_POST['nasc']:''); ?>" />
        
        <select name="options" id="genero" >
            <option class="select" id="gen" value="" disabled selected>Gênero</option>
            <option value="masculino" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "masculino" ): ?> selected <?php endif ?> >Masculino</option>
            <option value="feminino" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "feminino" ): ?> selected <?php endif ?> >Feminino</option>
            <option value="outro" name="gener" class="select" <?php if(isset($_POST['options']) && $_POST['options'] == "outro" ): ?> selected <?php endif ?> >Outro</option>
        </select>

        <label for="termos" id="licenca">Aceito os <strong>termos de uso</strong> e <strong>política de privacidade</strong></label>
        <input type="checkbox" name="termos" id="termos" />

        <input type="submit" id="enviabtn" value="Enviar" />

    </form>
    
</body>
</html>