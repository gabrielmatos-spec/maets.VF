<?php

include "conexaoBD.php";


// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // =========================
    // DADOS DO JOGO
    // =========================

    $nome = $_POST["nomeJogo"];
    $descricao = $_POST["descricaoJogo"];
    $categoria = $_POST["categoriaJogo"];
    $preco = $_POST["precoJogo"];


    // =========================
    // PASTA DAS IMAGENS
    // =========================

    $pasta = "assets/img/";


    // Cria a pasta caso ela não exista
    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }


    // =========================
    // FUNÇÃO PARA SALVAR IMAGEM
    // =========================

    function salvarImagem($arquivo, $pasta)
    {

        // Verifica se o arquivo existe
        if (!isset($arquivo)) {
            return "";
        }


        // Verifica se houve erro no upload
        if ($arquivo["error"] != UPLOAD_ERR_OK) {
            return "";
        }


        // Extensão original
        $extensao = strtolower(
            pathinfo($arquivo["name"], PATHINFO_EXTENSION)
        );


        // Extensões permitidas
        $extensoesPermitidas = [
            "jpg",
            "jpeg",
            "png",
            "webp"
        ];


        if (!in_array($extensao, $extensoesPermitidas)) {
            return "";
        }


        // Verifica se é realmente uma imagem
        $tipoImagem = getimagesize($arquivo["tmp_name"]);


        if ($tipoImagem === false) {
            return "";
        }


        // Cria nome único
        $nomeArquivo = uniqid("jogo_", true) . "." . $extensao;


        // Caminho completo
        $caminhoCompleto = $pasta . $nomeArquivo;


        // Move a imagem
        if (
            move_uploaded_file(
                $arquivo["tmp_name"],
                $caminhoCompleto
            )
        ) {

            return $caminhoCompleto;
        }


        return "";
    }


    // =========================
    // SALVAR A CAPA
    // =========================

    // O formulário pode continuar usando:
    // name="capaJogo"

    $imagem = salvarImagem(
        $_FILES["capaJogo"],
        $pasta
    );


    // =========================
    // VERIFICAR IMAGEM
    // =========================

    if ($imagem == "") {

        echo "<script>
                alert('Erro ao salvar a imagem do jogo.');
                history.back();
              </script>";

        exit;
    }


    // =========================
    // CADASTRAR NO BANCO
    // =========================

    $sql = "INSERT INTO jogos (
                nomeJogo,
                descricaoJogo,
                categoriaJogo,
                precoJogo,
                imagemJogo
            ) VALUES (
                ?,
                ?,
                ?,
                ?,
                ?
            )";


    // Prepara a consulta
    $stmt = mysqli_prepare($conn, $sql);


    if (!$stmt) {

        // Remove a imagem caso tenha dado erro
        if (file_exists($imagem)) {
            unlink($imagem);
        }


        echo "<script>
                alert('Erro ao preparar o cadastro do jogo.');
                history.back();
              </script>";

        exit;
    }


    // =========================
    // VINCULAR OS DADOS
    // =========================

    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $nome,
        $descricao,
        $categoria,
        $preco,
        $imagem
    );


    // =========================
    // EXECUTAR
    // =========================

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Jogo cadastrado com sucesso!');
                window.location.href = 'loja.php';
              </script>";

    } else {


        // Remove a imagem caso o cadastro dê erro
        if (file_exists($imagem)) {
            unlink($imagem);
        }


        echo "<script>
                alert('Erro ao cadastrar o jogo no banco de dados.');
                history.back();
              </script>";
    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

?>