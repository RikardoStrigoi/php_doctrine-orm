<?php

use Alura\Doctrine\Helper\EntityManagerFactory;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

$id = $argv[1];

/*
Com find, perca de performance por primeiro consultar e depois seguir pro remove
$aluno = $entityManager->find(Aluno::class, $id);
*/

//Com getReference, já monitora a variável para fazer o remove depois
$aluno = $entityManager->getReference(Aluno::class, $id);

$entityManager->remove($aluno);
$entityManager->flush();