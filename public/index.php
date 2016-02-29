<?php
require_once '../bootstrap.php';
use Symfony\Component\HttpFoundation\Response;

use Code\Sistema\Service\ClienteService;
use Code\Sistema\Service\InterecessesService;
use Symfony\Component\HttpFoundation\Request;

$response = new Response();
$app['ClienteService'] = function ()use($em){
    $ClienteService = new ClienteService($em);
    return $ClienteService ;
};

$app['InterecessesService'] = function ()use($em){
    $InterecessesService = new InterecessesService($em);
    return $InterecessesService;
};


$app->get('/api/clientes', function() use($app){ 
      $array = $app['ClienteService']->all();
        return  $app->json($array);
    
}); 

$app->post('/api/clientes',function(Request $request)use($app){
    $dados['nome']=$request->get('Nome');
    $dados['email']=$request->get('Email');
    $dados['cpf']=$request->get('Cpf');
    $dados['rg']=$request->get('Rg');
    $dados['intereceses']=$request->get('Interesses');
    $return = $app['ClienteService']->insert($dados);
    return $app->json($return);
});


$app->get('/api/buscaremail/{email}', function($email) use($app){ 
    $results = $app['ClienteService']->buscaremail($email);
    return var_dump($results)  ;
    
});
$app->put('/api/clientes/{id}',function($id,Request $request)use($app){
    $dados['id']=$id;
    $dados['nome']=$request->getNome();
    $dados['email']=$request->getEmail();
    return $app->json($dados);
});
   $app->get('/', function() use($app){ 
        return  $app['twig']->render('index.twig',[]);
    
});




    $app->get('/nome/{nome}', function($nome) use($app){ 
        return  $app['twig']->render('nome.twig',['nome'=>$nome]);
    
}); 
  $app->get('/listar', function() use($app){ 
      $array = $app['ClienteService']->all();
        return  $app['twig']->render('clientes.twig',['clientes'=>$array]);
    
}); 

$app->get('/api/cliente', function() use($app){ 
    $data['nome']="isaac";
    $data['email'] = "isaac@gmail.com";
    $retorno = $app['ClienteService']->insert($data);
    return $app->json($retorno);
}); 

$app->post('/api/interecesses',function(Request $request)use($app){
    $dados['nome']=$request->get('Nome');
    $return = $app['InterecessesService']->insert($dados);
    return $app->json($return);
});


$app->run();

