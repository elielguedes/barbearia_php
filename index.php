<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Barbearia</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gs-baber</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Clientes
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-cliente">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-cliente">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            servico
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-servico">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-servico">Listar</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Barbeiros
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-barbeiro">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-barbeiro">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            agendamento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-agendamento">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-agendamento">Listar</a></li>

                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Paguamento
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-paguamento">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-paguamento">Listar</a></li>

                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container mt-03">
        <div class="row">
            <div class="col">
                <?php
                //incluir conecção do banco
                include('config.php');
                switch (@$_REQUEST['page']) {
                    //cliente
                    case 'cadastrar-cliente':
                        include('cadastrar_cliente.php');
                        break;
                    case 'listar-cliente':
                        include("listar-cliente.php");
                        break;
                    case 'editar-cliente':
                        include("editar-cliente.php");
                        break;
                    case 'salvar-cliente':
                        include("salvar-cliente.php");
                        break;
                    //servico
                    case 'cadastrar-servico':
                        include("cadastrar-servico.php");
                        break;
                    case 'salvar-servico':
                        include('salvar-servico.php');
                        break;
                    case 'listar-servico':
                        include("listar-servico.php");
                        break;
                    case 'editar-servico':
                        include("editar-servico.php");
                        break;
                    //barbeiro
                    case 'salvar-barbeiro':
                        include("salvar-barbeiro.php");
                        break;
                    case 'cadastrar-barbeiro':
                        include('cadastrar-barbeiro.php');
                        break;
                    case 'listar-barbeiro':
                        include("listar-barbeiro.php");
                        break;
                    case 'editar-barbeiro':
                        include("editar-barbeiro.php");
                        break;
                    //agendamento
                    case 'cadastrar-agendamento':
                        include('cadastrar-agendamento.php');
                        break;
                    case 'listar-agendamento':
                        include("listar-agendamento.php");
                        break;
                    case 'editar-agendamento':
                        include("editar-agendamento.php");
                        break;
                    case 'salvar-agendamento':
                        include("salvar-agendamento.php");
                        break;
                    //paguamento
                    case 'cadastrar-paguamento':
                        include('cadastrar-paguamento.php');
                        break;
                    case 'listar-paguamento':
                        include("listar-paguamento.php");
                        break;
                    case 'editar-paguamento':
                        include("editar-paguamento.php");
                        break;
                    case 'salvar-paguamento':
                        include("salvar-paguamento.php");
                        break;
                    default:
                        print '<br><h1>Bem vindo ao sistema da Gs-baber</h1><br>';
                }
                ?>
            </div>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>