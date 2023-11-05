<?php

namespace Service {

    use Entity\TodoList;
    use Repository\TodoListRepository;

    interface TodoListService {
        function showTodoList(): void;

        function addTodoList(string $todo): void;

        function removeTodoList(int $number): void;
    }

    class TodoListServiceImpl implements TodoListService {
        private TodoListRepository $todoListRepository;

        public function __construct(TodoListRepository $todoListRepository) {
            $this->todoListRepository = $todoListRepository;
        }

        function showTodoList(): void {
            echo "TODO LIST" . PHP_EOL;

            foreach ($this->todoListRepository->findAll() as $number => $value) {
                echo "$number. ". $value->getTodo() . PHP_EOL;
            }
        }

        function addTodoList(string $todo): void {
            $todoList = new TodoList($todo);

            $this->todoListRepository->save($todoList);
            echo "SUKSES MENAMBAH TODO LIST" . PHP_EOL;
        }

        function removeTodoList(int $number): void {
            if ($this->todoListRepository->remove($number)) {
                echo "SUKSES MENGHAPUS TODO LIST" . PHP_EOL;
            } else {
                echo "GAGAL MENGHAPUS TODO LIST" . PHP_EOL;
            }
        }
    }
}