<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

<div id="app">
    <div class="container">
        <ul class="list-group">
            <li v-for="(todo, index) in todoList" 
                class="list-group-item d-flex justify-content-between">
            
                <span @click="toggleDone(index)" :class="{'text-decoration-line-through': todo.done}">

                    {{todo.text}}

                </span>

                <div class="btn btn-warning" @click="cancellaTodo(index)"><i class="fa-solid fa-trash"></i></div>

            </li> 
                <!--quando modifico l'array del server.php bisogna a fare la chiamata sia di todo che di text-->
        </ul>
<!-- Pur non mettendo il mio input all'interno di form, riesco ad inviare le miei informazioni al server perchè axios svolge lo stesso lavoro-->
        <input v-model="todoItem.text" type="text"/>
        <button class="btn btn-primary" @click="addTodo">Aggiungi</button>

    </div>
</div>

<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src= 'main.js'></script>
</body>
</html>