<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require('includes/html/head.php') ?>
    <title>Lovatel Car - Sistema</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <button class="nav-link" onclick="loadPage(event, 'includes/new/marca.php')">Marcas</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="loadPage(event, 'includes/new/modelo.php')">Modelos</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="loadPage(event, 'includes/new/veiculo.php')">Veículos</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="loadPage(event, 'includes/view/leads.php')">Leads</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" onclick="loadPage(event, 'includes/new/imagem.php')">Imagens</button>
                    </li>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div id="root" class="container">
        <h1>Bem vindo ao sistema.</h1>

    </div>

    <script>
        function loadPage(event, url) {
            event.preventDefault();
            fetch(url)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('root').innerHTML = html;
                })
                .catch(error => {
                    console.error('Erro ao carregar a página:', error);
                });
        }
    </script>
</body>