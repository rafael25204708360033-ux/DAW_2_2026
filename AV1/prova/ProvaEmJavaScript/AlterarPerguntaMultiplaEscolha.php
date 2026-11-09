<?php
// ============================================================================
// ETAPA 1: RECEBIMENTO DOS PARÂMETROS VIA GET
// ============================================================================
// 1. Recebe o ID da pergunta e o novo enunciado.
// 2. As respostas atualizadas virão nos parâmetros GET dinamizados ("resposta_1", "resposta_2", etc).

// ============================================================================
// ETAPA 2: ATUALIZAÇÃO DO ENUNCIADO (perguntas.txt)
// ============================================================================
// 1. Abre "perguntas.txt" ("r") e "perguntas_temp.txt" ("w").
// 2. Loop feof(): lê linha por linha.
// 3. Se o ID bater com o ID procurado, substitui a linha pela nova pergunta.
// 4. Copia as demais linhas normalmente para o temporário.
// 5. Fecha os arquivos, apaga "perguntas.txt" e renomeia o temporário.

// ============================================================================
// ETAPA 3: ATUALIZAÇÃO DAS 4 RESPOSTAS (respostas.txt)
// ============================================================================
// 1. Abre "respostas.txt" ("r") e "respostas_temp.txt" ("w").
// 2. Loop feof() lendo linha por linha com fgets() e explode(";").
// 3. Captura o ID da pergunta ($dados[0]) e o número da alternativa/IDResposta ($dados[1]).
// 4. Se o ID da pergunta bater com o ID buscado:
//    - Monta dinamicamente a chave do campo: "resposta_" . $IDRespostaArquivo
//    - Pega o novo valor recebido via GET: $_GET[$nomeCampo]
//    - Atualiza a linha com: $ID . ";" . $IDRespostaArquivo . ";" . $novaRespTexto . "\n"
// 5. Escreve a linha (alterada ou original) no arquivo temporário.
// 6. Fecha, apaga "respostas.txt" e renomeia "respostas_temp.txt".

// ============================================================================
// ETAPA 4: FINALIZAÇÃO
// ============================================================================
// 1. Imprime o status de sucesso para a função de retorno do JavaScript.
?>