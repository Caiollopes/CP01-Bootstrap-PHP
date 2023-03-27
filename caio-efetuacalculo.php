<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>CP - Caio</title>
    </head>
    <body>
        <form method="GET">
                <h1>Cálculo Salário</h1>
                <!-- Nome -->
                <label for="nome" class="form-label">Nome:</label>
                <div class="mb-3 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text inp" id="inputGroup-sizing-lg"><i class="bi bi-emoji-sunglasses d-flex align-items-center"></i></span>
                    </div>          
                    <input type="text" class="form-control-sm inp" id="nome" name="nome"
                    placeholder="Digite seu nome">
                </div>
                <!-- Salario -->
                <label for="salario" class="form-label">Salário Bruto:</label>
                <div class="mb-3 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text inp" id="inputGroup-sizing-lg"><i class="bi bi-coin d-flex align-items-center"></i></span>
                    </div>          
                    <input type="float" class="form-control-sm inp" id="salario" name="salario"
                    placeholder="Insira seu salario">
                </div>
                <!-- Dependentes -->
                <label for="dependentes" class="form-label">Numero de dependentes:</label>
                <div class="mb-3 input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text inp" id="inputGroup-sizing-lg"><i class="bi bi-people d-flex align-items-center"></i></span>
                    </div> 
                    <input type="text" class="form-control-sm inp" id="dependentes" name="dependentes"
                    placeholder="N de dependentes">
                </div>
                <!-- Botoes submit e reset -->
                <div>
                    <button type="submit">
                        <i class="bi bi-check"></i>
                    </button>
                    <a href="caio-efetuacalculo.php">
                        <button type="button">
                        <i class="bi bi-x"></i>
                        </button>
                    </a>
                </div>
        </form>
        <?php
            include "caio-calculosalario.php";
            if (isset($_GET["salario"]) && isset($_GET["dependentes"]) && isset($_GET["nome"])) {
                $nome = $_GET['nome'];
                
                echo 'Ola, ' . $nome;
                echo calcularINSS();
            }
            ?>
    </body>
</html>