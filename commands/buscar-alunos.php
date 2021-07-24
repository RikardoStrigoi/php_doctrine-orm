<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

 $alunoRepository = $entityManager->getRepository(Aluno::class);

 $alunoList = $alunoRepository->findAll();

 /**@var Aluno[] $alunoList */
 foreach ($alunoList as $aluno) {
    echo "ID: {$aluno->getId()} \nNome: {$aluno->getName()}\n\n";
 }

 $helo = $alunoRepository->find(3);
 echo $helo->getName() . PHP_EOL;

 $ari = $alunoRepository->find($argv[1]);
 echo $ari->getName() . PHP_EOL;

 $cleideFerreira = $alunoRepository->findOneBy([
    'name' => 'Cleide Ferreira',
 ]);

 var_dump($cleideFerreira);