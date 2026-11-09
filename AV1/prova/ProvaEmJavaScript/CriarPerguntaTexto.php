<?php
// ============================================================================
// ETAPA 1: RECEBIMENTO DOS PARÂMETROS
// ============================================================================
// 1. Capta os dados enviados pela requisição AJAX via parâmetro GET:
//    - ID da pergunta ($_GET["ID"])
//    - Enunciado da pergunta ($_GET["Pergunta"])
//    - Resposta esperada ($_GET["Resposta"])

// ============================================================================
// ETAPA 2: GRAVAÇÃO DA PERGUNTA (perguntas.txt)
// ============================================================================
// 1. Verifica se o arquivo "perguntas.txt" existe.
// 2. Se NÃO existir:
//    - Abre em modo de escrita ("w").
//    - Grava o cabeçalho padrão: "ID;Pergunta\n".
//    - Fecha o arquivo.
// 3. Abre "perguntas.txt" em modo append ("a") para adicionar no final.
// 4. Monta a linha com o formato: $ID . ";" . $pergunta . "\n"
// 5. Escreve a linha e fecha o arquivo.

// ============================================================================
// ETAPA 3: GRAVAÇÃO DA RESPOSTA ÚNICA (respostas.txt)
// ============================================================================
// 1. Verifica se o arquivo "respostas.txt" existe.
// 2. Se NÃO existir:
//    - Abre em modo de escrita ("w").
//    - Grava o cabeçalho padrão: "ID;IDResposta;Resposta\n".
//    - Fecha o arquivo.
// 3. Abre "respostas.txt" em modo append ("a").
// 4. Define o IDResposta fixo como 1 (pois é uma pergunta de texto único).
// 5. Monta a linha com o formato: $ID . ";1;" . $respostaTexto . "\n"
// 6. Escreve a linha e fecha o arquivo.

// ============================================================================
// ETAPA 4: RETORNO PARA O JAVASCRIPT
// ============================================================================
// 1. Imprime uma mensagem de confirmação em HTML para o XMLHttpRequest capturar.
?>