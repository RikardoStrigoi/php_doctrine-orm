<?php

use Alura\Doctrine\Entity\Aluno;
use Alura\Doctrine\Entity\Telefone;
use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

 $alunoRepository = $entityManager->getRepository(Aluno::class);

 $alunoList = $alunoRepository->findAll();

 /**@var Aluno[] $alunoList */
 foreach ($alunoList as $aluno) {
   $telefones = $aluno->getTelefones()->map(function (Telefone $telefone) {
      return $telefone->getNumero();
   })->toArray();
    echo "ID: {$aluno->getId()} \nNome: {$aluno->getName()}\n";
    echo "Telefones: " . implode(', ', $telefones) . PHP_EOL . PHP_EOL;
 }

 $helo = $alunoRepository->find(2);
 echo $helo->getName() . PHP_EOL;

//  $ari = $alunoRepository->find($argv[1]);
//  echo $ari->getName() . PHP_EOL;

//  $cleideFerreira = $alunoRepository->findOneBy([
//     'name' => 'Cleide Ferreira',
//  ]);

//  var_dump($cleideFerreira);