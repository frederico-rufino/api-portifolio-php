<?php

    use Util\RotasUtil;
    use Validator\RequestValidator;
    use Util\ConstantesGenericasUtil;
    use Util\JsonUtil;

    include 'bootstrap.php';

    try{
        $requestValidator = new RequestValidator(RotasUtil::getRotas());
        $retorno = $requestValidator->processarRequest();
        
        $JsonUtil = new JsonUtil();
        $JsonUtil->processarArrayParaRetornar($retorno);

    } catch (Exception $exception){
        echo json_encode([
            ConstantesGenericasUtil::TIPO => ConstantesGenericasUtil::TIPO_ERRO,
            ConstantesGenericasUtil::RESPOSTA => utf8_encode($exception->getMessage())
        ]);
        exit;
    }