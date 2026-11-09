<?php
// ============================================================================
// ETAPA 1: RECEBIMENTO DOS PARÂMETROS
// ============================================================================
// 1. Capta os dados enviados via GET:
//    - ID da pergunta ($_GET["ID"])
//    - Enunciado da pergunta ($_GET["Pergunta"])

// ============================================================================
// ETAPA 2: GRAVAÇÃO DA PERGUNTA (perguntas.txt)
// ============================================================================
// 1. Checa a existência de "perguntas.txt".
// 2. Se não existir, cria com o cabeçalho "ID;Pergunta\n".
// 3. Abre em modo append ("a") e escreve o ID e o Enunciado da pergunta.
// 4. Fecha o arquivo.

// ============================================================================
// ETAPA 3: GRAVAÇÃO DAS 4 RESPOSTAS EM LAÇO (respostas.txt)
// ============================================================================
// 1. Checa a existência de "respostas.txt".
// 2. Se não existir, cria com o cabeçalho "ID;IDResposta;Resposta\n".
// 3. Abre "respostas.txt" em modo append ("a").
// 4. Executa um laço for de $i = 1 até 4:
//    - Constrói dinamicamente o nome do parâmetro GET: "resposta_" . $i
//    - Pega o valor correspondente: $_GET[$nomeCampo]
//    - O IDResposta recebe o índice do loop ($i)
//    - Monta a linha: $ID . ";" . $i . ";" . $textoResposta . "\n"
//    - Escreve a linha no arquivo.
// 5. Fecha o arquivo após o término do loop.

// ============================================================================
// ETAPA 4: RETORNO PARA O JAVASCRIPT
// ============================================================================
// 1. Imprime a mensagem de sucesso que será injetada no container HTML da página.
?>