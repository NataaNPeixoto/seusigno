<?php include('layouts/header.php'); ?>

<div class="container zodiac-sign">
  <h1>O seu signo é:</h1>
  <?php
  // Obtém a data de nascimento enviada pelo formulário
  $data_nascimento = $_POST['data_nascimento'];

  // Carrega os dados dos signos do arquivo XML
  $signos = simplexml_load_file("signos.xml");

  // Converte a data de nascimento para um objeto DateTime para facilitar as comparações
  $data_nascimento = new DateTime($data_nascimento);

  // Inicializa uma flag para indicar se o signo foi encontrado
  $signo_encontrado = false;

  // Itera sobre cada signo no arquivo XML
  foreach ($signos->signo as $signo) {
    // Obtém as datas de início e fim do signo atual e as converte para objetos DateTime
    $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

    // Ajusta as datas para o ano da data de nascimento
    $data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
    $data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

    // Corrige um possível problema com signos que começam no final do ano e terminam no início do ano seguinte
    if ($data_inicio > $data_fim) {
      $data_fim->modify('+1 year');
    }

    // Verifica se a data de nascimento está entre as datas de início e fim do signo atual
    if ($data_nascimento->format('Y-m-d') >= $data_inicio->format('Y-m-d') &&
        $data_nascimento->format('Y-m-d') <= $data_fim->format('Y-m-d')) {
      // Se a data de nascimento estiver dentro do intervalo, exibe o nome e a descrição do signo
      echo "<h2>" . $signo->signoNome . "</h2>";
      echo "<p>" . $signo->descricao . "</p>";
      // Marca o signo como encontrado e interrompe a iteração
      $signo_encontrado = true;
      break;
    }
  }

  // Se nenhum signo foi encontrado, exibe uma mensagem de erro
  if (!$signo_encontrado) {
    echo "<p>Não foi possível determinar seu signo. Verifique a data informada.</p>";
  }
  ?>

  <a href="index.php" class="btn">Voltar</a>
</div>

<?php include('layouts/footer.php'); ?>