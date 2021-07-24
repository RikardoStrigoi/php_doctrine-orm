<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

/*
Não é necessário buscar repository para dar find em apenas UM "aluno"
$alunoRepository = $entityManager->getRepository(Aluno::class);
*/

$id = $argv[1];
$novoNome = $argv[2];

/*
Busca do id usando o repository:
$aluno = $alunoRepository->find($id);
*/

//busca sem passar pelo repository; direto no entity manager. Não tem "findAll"
$aluno = $entityManager->find(Aluno::class, $id);
$aluno->setName($novoNome);

$entityManager->flush();