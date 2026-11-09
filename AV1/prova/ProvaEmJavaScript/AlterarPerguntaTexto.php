<?php
// ============================================================================
// ETAPA 1: CAPTURA DOS NOVOS DADOS
// ============================================================================
// 1. Recebe via GET o ID da pergunta a alterar, a nova Pergunta e a nova Resposta.

// ============================================================================
// ETAPA 2: REESCRITA DA PERGUNTA (perguntas.txt -> perguntas_temp.txt)
// ============================================================================
// 1. Se "perguntas.txt" existir:
//    - Abre "perguntas.txt" para leitura ("r").
//    - Cria/Abre "perguntas_temp.txt" para escrita ("w").
//    - Percorre o arquivo original com enquanto(!feof($arqAntigo)) usando fgets().
//    - Para cada linha válida (não vazia):
//      * Separa os dados com explode(";", $linha).
//      * Compara se o ID ($dados[0]) é igual ao ID buscado.
//      * Se for igual: substitui a linha pelo novo texto formatado ($ID . ";" . $novaPergunta . "\n").
//      * Grava a linha (alterada ou original) no arquivo temporário.
//    - Fecha ambos os arquivos.
//    - Remove o original ("perguntas.txt") e renomeia o temporário para "perguntas.txt".

// ============================================================================
// ETAPA 3: REESCRITA DA RESPOSTA ÚNICA (respostas.txt -> respostas_temp.txt)
// ============================================================================
// 1. Se "respostas.txt" existir:
//    - Abre "respostas.txt" em modo leitura ("r").
//    - Cria "respostas_temp.txt" em modo escrita ("w").
//    - Percorre cada linha com fgets() e explode(";").
//    - Se o ID da linha for igual ao ID informado:
//      * Substitui a linha por: $ID . ";1;" . $novaResposta . "\n"
//    - Grava no arquivo temporário.
//    - Fecha os arquivos, remove "respostas.txt" e renomeia o temporário.

// ============================================================================
// ETAPA 4: RESPOSTA DA REQUISIÇÃO
// ============================================================================
// 1. Retorna mensagem de confirmação da alteração para o front-end.
?>