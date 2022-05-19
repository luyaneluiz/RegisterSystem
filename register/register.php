<?php

$erroName = "";
$erroSurname = "";
$erroEmail = "";
$erroPass = "";
$erroPass2 = "";

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //VALIDAÇÃO NAME

      //Verificar se o POST name está vazio
      if (empty($_POST['name'])) {
        $erroName = "Preencha seu nome.";
      } 
      
      //Limpa o valor do POST name
      else {
        $name = limpaPost($_POST['name']);

        //Verifica se há somente letras
        if(!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
          $erroName = "Digite apenas letras.";
        }
      }
    
    //VALIDAÇÃO SURNAME

      //Verificar se o POST surname está vazio
      if (empty($_POST['surname'])) {
        $erroSurname = "Preencha seu sobrenome.";
      } 
      
      //Limpa o valor do POST surname
      else {
        $surname = limpaPost($_POST['surname']);

        //Verifica se há somente letras
        if(!preg_match("/^[a-zA-Z-' ]*$/", $surname)) {
          $erroSurame = "Digite apenas letras.";
        }
      }

    //VALIDAÇÃO EMAIL

      //Verificar se o POST email está vazio
      if (empty($_POST['email'])) {
        $erroEmail = "Preencha seu email.";
      } 
      
      //Limpa o valor do POST email
      else {
        $email = limpaPost($_POST['email']);

        //Verifica se foi inserido um email válido
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $erroEmail = "E-mail inválido.";
        }
      }
    
    //VALIDAÇÃO SENHA

      //Verificar se o POST password está vazio
      if (empty($_POST['pass'])) {
        $erroPass = "Por favor, insira uma senha.";
      } 
      
      //Limpa o valor do POST password
      else {
        $pass = limpaPost($_POST['pass']);

        //Verifica se a senha tem mais de 8 digitos
        if(strlen($pass < 8)) {
          $erroPass = "A senha precisa ter no mínimo 8 dígitos.";
        }
      }
    
    //VALIDAÇÃO REPETE SENHA

      //Verificar se o POST repeat password está vazio
      if (empty($_POST['pass2'])) {
        $erroPass2 = "Por favor, repita a senha.";
      } 
      
      //Limpa o valor do POST repeat password
      else {
        $pass2 = limpaPost($_POST['pass2']);
        //Verifica se há somente letras

        if($pass2 !== $pass) {
          $erroPass2 = "As senhas precisam ser iguais.";
        }
      }

    if(($erroName == "") && ($erroSurname == "") && ($erroEmail == "") && ($erroPass == "") && ($erroPass2 == "")) {
      include_once('../config.php');

      $name = $_POST['name'];
      $surname = $_POST['surname'];
      $gener = $_POST['gener'];
      $birthday = $_POST['birthday'];
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $pass2 = $_POST['pass2'];

      $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,surname,gener,birthday,email,pass,repeat_pass) VALUES ('$name','$surname','$gener','$birthday','$email','$pass','$pass2')");

      $alert = "Usuário cadastrado com sucesso!";
    }
  }

  function limpaPost($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
    return $valor;
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="stylesheet" href="./register.css" />
    <link rel="shortcut icon" href="../img/logo.png" />
    <title>Register</title>
  </head>

  <body>
    <div class="container">
      <header>
        <img
          src="../img/logo.png"
          alt="logo ovelha laranja"
          style="height: 60px"
        />
        <h1>Welcome!</h1>
        <p>Create your account.</p>
      </header>
      <main>
        <form method="POST">
          <section>
            <div class="name">
              <div class="first-name">
                <label for="name">Name <span>*</span></label>
                <input 
                  type="text" 
                  name="name" 
                  required
                  <?php if(!empty($erroName)){echo "class='invalido'";} ?>
                />
                <span class="erro"> <?php echo $erroName; ?> </span>
              </div>
              <div class="surname">
                <label for="Surname">Surname <span>*</span></label>
                <input 
                  type="text" 
                  name="surname" 
                  required
                  <?php if(!empty($erroSurname)){echo "class='invalido'";} ?>
                />
                <span class="erro"> <?php echo $erroSurname; ?> </span>
              </div>
            </div>
            <div class="select">
              <div class="gener">
                <label for="gener">Gener <span>*</span></label>
                <select name="gener" required>
                  <option value=""></option>
                  <option value="Man" name="gener">Man</option>
                  <option value="Woman" name="gener">Woman</option>
                  <option value="Other" name="gener">Other</option>
                </select>
              </div>
              <div class="birth">
                <label for="Birthday">Birthday <span>*</span></label>
                <input type="date" name="birthday" required/>
              </div>
            </div>
            <div class="email">
              <label for="email">E-mail <span>*</span></label>
              <input 
                type="email" 
                name="email"
                required
                <?php if(!empty($erroEmail)){echo "class='invalido'";} ?>
              />
              <span class="erro"> <?php echo $erroEmail; ?> </span>
            </div>
            <div class="password">
              <div class="pass">
                <label for="password">Password <span>*</span></label>
                <input 
                  type="password" 
                  class="pass1" 
                  name="pass"
                  required
                  <?php if(!empty($erroPass)){echo "id='invalido'";} ?>
                />
                <span class="erro"> <?php echo $erroPass; ?> </span>
              </div>
              <div class="repeat-pass">
                <label for="password">Repeat Password <span>*</span></label>
                <input 
                  type="password" 
                  class="pass2" 
                  name="pass2"
                  required
                  <?php if(!empty($erroPass2)){echo "id='invalido'";} ?>
                />
                <span class="erro"> <?php echo $erroPass2; ?> </span>
              </div>
            </div>
          </section>

          <div class="submit">
            <button type="submit" name="submit" >REGISTER</button>
          </div>
        </form>
      </main>
      <footer>
        <p>
          Alredy have an account?
          <a href="../login/index.php">Login.</a>
        </p>
      </footer>
    </div>
  </body>
</html>
