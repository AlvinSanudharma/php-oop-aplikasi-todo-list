<?php


namespace View {
    use Helper\InputHelper;
    use Service\TodoListService;

    class TodoListView {
        private TodoListService $todoListService;

        public function __construct(TodoListService $todoListService) {
            $this->todoListService = $todoListService;
        }

        function showTodoList():void {
            while (true) {
                $this->todoListService->showTodoList();
        
                echo "MENU" . PHP_EOL;
                echo "1. Tambah Todo" . PHP_EOL;
                echo "2. Hapus Todo" . PHP_EOL;
                echo "x. Keluar" . PHP_EOL;
        
                $pilih = InputHelper::input('Pilih');
        
                if ($pilih == '1') {
                    $this->addTodoList();
                } else if ($pilih == '2') {
                    $this->removeTodoList();
                } else if ($pilih == 'x') {
                    break;
                } else {
                    echo "Pilihan tidak tersedia" . PHP_EOL;
                }
            }
        
            echo "End" . PHP_EOL;
        }

        function addTodoList():void {
            echo "Menambah Todo" . PHP_EOL;

            $todo = InputHelper::input("Mau ngapain? (Ketik x untuk membatalkan)");
        
            if ($todo == 'x') {
                echo "Batal menambahlan Todo" . PHP_EOL;
            } else {
                $this->todoListService->addTodoList($todo);
            }
        }

        function removeTodoList():void {
            echo "Menghapus Todo ";

            $pilih = InputHelper::input("No ( Ketik x untuk membatalkan)");
        
            if ($pilih == 'x') {
                echo "Batal menghapus todo" . PHP_EOL;
            } else {    
                $this->todoListService->removeTodoList($pilih);
            }
        }
    }
}