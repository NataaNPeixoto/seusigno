<?php
include('layouts/header.php'); // Inclui o cabeçalho da página

// Contêiner principal da seção do signo
<div class="container zodiac-sign">
    <h1>O seu signo é:</h1>

    <?php
    // Obtém a data de nascimento do formulário
    $data_nascimento = $_POST['data_nascimento'];

    // Carrega os dados dos signos do arquivo XML
    $signos = simplexml_load_file("signos.xml");

    // Converte a data de nascimento para um objeto DateTime
    $data_nascimento = new DateTime($data_nascimento);

    // Flag para indicar se o signo foi encontrado
    $signo_encontrado = false;

    // Itera sobre cada signo no XML
    foreach ($signos->signo as $signo) {
        // Cria objetos DateTime para as datas de início e fim do signo
        $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

        // Define o ano da data de início e fim como o mesmo da data de nascimento
        $data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
        $data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

        // Corrige caso a data de fim seja anterior à data de início (signos que se estendem para o próximo ano)
        if ($data_inicio > $data_fim) {
            $data_fim->modify('+1 year');
        }

        // Verifica se a data de nascimento está entre as datas de início e fim do signo
        if ($data_nascimento->format('Y-m-d') >= $data_inicio->format('Y-m-d') && 
            $data_nascimento->format('Y-m-d') <= $data_fim->format('Y-m-d')) {
            // Se a data estiver dentro do intervalo, exibe o signo e sua descrição
            echo "<h2>" . $signo->signoNome . "</h2>";
            echo "<p>" . $signo->descricao . "</p>";
            $signo_encontrado = true;
            break; // Interrompe o loop quando o signo é encontrado
        }
    }

    // Se nenhum signo foi encontrado, exibe uma mensagem de erro
    if (!$signo_encontrado) {
        echo "<p>Não foi possível determinar seu signo. Verifique a data informada.</p>";
    }
    ?>

    <a href="index.php" class="btn">Voltar</a>
</div>

<?php include('layouts/footer.php'); // Inclui o rodapé da página ?>