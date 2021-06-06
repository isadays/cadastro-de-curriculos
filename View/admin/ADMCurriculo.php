<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/cadastro-de-curriculos/Resources/Styles/style.css">
    <title>Visualizar Currículo</title>

</head>
<body class="w3-light-grey">
<?php
// Imports
include_once '../Controller/UsuarioController.php';
include_once '../Model/Usuario.php';
include_once '../Controller/FormacaoAcadController.php';
include_once '../Controller/ExperienciaProfissionalController.php';
include_once '../Controller/OutrasFormacoesController.php';

// Session
if (!isset($_SESSION)) {
    session_start();
}
?>
<!-- Navbar -->
<nav class="w3-sidebar w3-bar w3-block w3-center w3-amber shadow-lg">
    <a href="#home"
       class="w3-bar-item w3-button w3-block w3-cell w3-hover-sand w3-hover-text-orange w3-text-sand w3-text-dark-grey">
        <i class="fa fa-home w3-xxlarge"></i>
        <p> Tela Principal </p>
    </a>
    <a href="#dPessoais"
       class="w3-bar-item w3-button w3-block w3-cell w3-hover-sand w3-hover-text-orange w3-text-sand w3-text-dark-grey">
        <i class="fa fa-address-book-o w3-xxlarge"></i>
        <p>Dados Pessoais</p>
    </a>
    <a href="#formacao"
       class="w3-bar-item w3-button w3-block w3-cell w3-hover-sand w3-hover-text-orange w3-text-sand w3-text-dark-grey">
        <i class="fa fa-mortar-board w3-xxlarge"></i>
        <p>Formação Acadêmica</p>
    </a>
    <a href="#oFormacao"
       class="w3-bar-item w3-button w3-block w3-cell w3-hover-sand w3-hover-text-orange w3-text-sand w3-text-dark-grey">
        <i class="fa fa-line-chart w3-xxlarge"></i>
        <p>Outras Formações</p>
    </a>
    <a href="#eProfissional"
       class="w3-bar-item w3-button w3-block w3-cell w3-hover-sand w3-hover-text-orange w3-text-sand w3-text-dark-grey">
        <i class="fa fa-briefcase  w3-xxlarge"></i>
        <p>Experiências Profissionais</p>
    </a>
</nav>

<div class="w3-padding-large exibicao" id="main">
    <!-- Tela Principal -->
    <header class="w3-container w3-center title-section" id="home">
        <h1 class="titulo-principal w3-text-dark-grey">
            CURRICULO
        </h1>
    </header>

    <!-- Dados Pessoais -->
    <div class="w3-padding-128 w3-content w3-text-grey card mb-5 shadow" id="dPessoais">
        <h2 class="card-title w3-text-dark-grey title-section mb-2">
            <i class="fa fa-address-book-o w3-xx-large w3-center me-3"></i>
            Dados Pessoais
        </h2>

        <div class="card-body container">
            <h3 class="container m-3">Id:</h3>
            <h3 class="container m-3">Nome:</h3>
            <h3 class="container m-3">Data de Nascimento:</h3>
            <h3 class="container m-3">Email:</h3>
        </div>
    </div>
    <!-- Formação Acadêmica-->
    <div class="w3-padding-128 w3-content w3-text-grey card shadow mb-5" id="formacao">
        <h2 class="card-title w3-text-dark-grey title-section mb-5">
            <i class="fa fa-mortar-board w3-xx-large me-3"></i>
            Formação Acadêmica
        </h2>
        <!--Tabela de exibição das Formações Acadêmicas-->
        <div class="w3-container mb-5">
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center w3-amber">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Descrição</th>
                </tr>
                <thead>

                <?php
                $fCon = new FormacaoAcadController();
                $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)

                    while ($row = $results->fetch_object()) {
                        echo '<tr>';

                        echo '<td style="width: 18%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 18%;">' . $row->fim . '</td>';
                        echo '<td style="width: 64%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>

    <!--Outras Formações-->
    <div class="w3-padding-128 w3-content w3-text-grey card shadow mb-5" id="oFormacao">
        <h2 class="card-title w3-text-dark-grey title-section mb-5">
            <i class="fa fa-line-chart w3-xx-large me-3"></i>
            Outras Formações
        </h2>
        <!--Tabela de exibição das Outras Formações-->
        <div class="w3-container mb-5">
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center w3-amber">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Descrição</th>
                </tr>
                <thead>

                <?php
                $fCon = new OutrasFormacoesController();
                $results = $fCon->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)

                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 18%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 18%;">' . $row->fim . '</td>';
                        echo '<td style="width: 64%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>

    <!-- Experiência Profissional -->
    <div class="w3-padding-128 w3-content w3-text-grey card shadow mb-5" id="eProfissional">
        <h2 class="card-title w3-text-dark-grey title-section mb-5">
            <i class="w3-xx-large fa fa-briefcase me-3" aria-hidden="true"></i>
            Experiência Profissional
        </h2>
        <!-- Tabela Experiência Profissional -->
        <div class="w3-container mb-5">
            <table class="w3-table-all w3-centered">
                <thead>
                <tr class="w3-center w3-amber">
                    <th>Início</th>
                    <th>Fim</th>
                    <th>Empresa</th>
                    <th>Descrição</th>
                </tr>
                <thead>

                <?php
                $ePro = new ExperienciaProfissionalController();
                $results = $ePro->gerarLista(unserialize($_SESSION['Usuario'])->getID());
                if ($results != null)

                    while ($row = $results->fetch_object()) {
                        echo '<tr>';
                        echo '<td style="width: 15%;">' . $row->inicio . '</td>';
                        echo '<td style="width: 15%;">' . $row->fim . '</td>';
                        echo '<td style="width: 10%;">' . $row->empresa . '</td>';
                        echo '<td style="width: 55%;">' . $row->descricao . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>
