<?php


require_once __DIR__ . "/../Entity/TodoList.php";
require_once __DIR__ . "/../Repository/TodoListRepository.php";
require_once __DIR__ . "/../Service/TodoListService.php";

use Entity\TodoList;
use Service\TodoListServiceImpl;
use Repository\TodoListRepositoryImpl;

function testShowTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todoListRepository); 

    $todoListService->showTodoList();
}

function testAddTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todoListRepository); 
    $todoListService->addTodoList('Belajar PHP OOP');
    $todoListService->addTodoList('Belajar PHP Database');

    $todoListService->showTodoList();
}

function testRemoveTodoList(): void {
    $todoListRepository = new TodoListRepositoryImpl();

    $todoListService = new TodoListServiceImpl($todoListRepository); 
    $todoListService->addTodoList('Belajar PHP');
    $todoListService->addTodoList('Belajar PHP OOP');
    $todoListService->addTodoList('Belajar PHP Database');

    $todoListService->showTodoList();

    $todoListService->removeTodoList(1);

    $todoListService->showTodoList();
}

testRemoveTodoList(); 
