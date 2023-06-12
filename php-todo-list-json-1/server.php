<?php

// vado a fare la decodifica delle informazioni contenuti in $todolist.
if (file_exists('database.json')) {

    $string = file_get_contents('database.json');
    $todoList = json_decode($string, true);
} else {
    $todoList = [
        [
            'text' => 'Svegliarmi',
            'done' => false
        ],
        [
            'text' => 'Fare colazione',
            'done' => true
        ],
        [
            'text' => 'Andare al corso',
            'done' => true
        ],
        [
            'text' => 'Imparare',
            'done' => true
        ],
        [
            'text' => 'Svolgere i progetti',
            'done' => true
        ]
    ];
}


/*
//il comando per controllare l'array 
var_dump($_POST);
// serve a bloccare invio del programma al suo naturale percorso
die(); */

//se questa richiesta(todoitem) allora l'informazione che ho ricevuto da todoitem deve essere aggiunto all'array del server.
// $POST mi permette di aggiungere un nuovo valore a todoList
//il server mi legge todoitem come se fossero due informazioni(text e done).
// === servono per controllare se done e text siano una stringa oppure un oggetto.
if (isset($_POST['todoItem'])) {
    $todoList[] = [
        'text' => $_POST['todoItem'] ['text'],
        'done' => $_POST['todoItem'] ['done'] == "true"?true:false,

    ];
 //ecco come si fa scrivere un file => file_put_contents('prova.text','nel mezzo del cammin di nostra vita')
    file_put_contents('database.json', json_encode($todoList));

} else if (isset($_POST['setTodoDone'])) {
    
    $index = $_POST ['setTodoDone'];
    $todoList[$index]['done'] = true;
    file_put_contents('database.json', json_encode($todoList));

}else if (isset($_POST['toggleTodoDone'])) {
    
    $index = $_POST ['toggleTodoDone'];
    $todoList[$index]['done'] = !$todoList[$index]['done'] ;
    file_put_contents('database.json', json_encode($todoList));

}else if (isset($_POST['cancellaTodo'])) {
    
    $index = $_POST ['cancellaodo'];
    array_splice($todoList, $index, 1);
    file_put_contents('database.json', json_encode($todoList));

}





//H(C-T) serve per segnalare a vue js che informazione che sta ricevendo è codificato in json
header('Content-Type: application/json');
echo json_encode($todoList);

