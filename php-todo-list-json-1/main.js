const { createApp } = Vue
createApp({
    data() {
        return {
            todoList: [],
            todoItem:   {
                            'text': '',
                            'done': 'false'
                        }
        }
            //quando passo un valore dal front in DONE dovrebbe valere false
    },
    methods: {
        readList() {
            axios.get('server.php')
            .then(response => {
                this.todoList = response.data;
            })
        },
            // qui sto creando delle informazioni(todoitem che abbia lo stesso valore) che voglio passare al server
           // console.log(this.todoItem)
        addTodo() {
            const data = {                
                todoItem: this.todoItem
                
            };
            // axios serve a inviare le informazioni
            //Quando invi le informazioni in modalità post determinate informazioni.
            //qualsiasi informazione passi al server può essere verificato nel payload del server da te creato
            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
                
            }

            ).then(response => {
                this.todoList = response.data;
                this.todoItem.text = '';
                
            });
            
        },
        setDone(index) {
            console.log(index);

            const data = {
                setTodoDone: index
            }
            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
            });
        },
        toggleDone(index) {
            console.log(index);

            const data = {
                toggleTodoDone: index
            }
            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
            });
        },
        cancellaTodo(index) {
            console.log(index);

            const data = {
                cancellaTodo: index
            }
            axios.post('server.php', data,
            {
                headers: { 'Content-Type': 'multipart/form-data'}
            }
            ).then(response => {
                this.todoList = response.data;
            });
        }
        
    },
    mounted() {
        this.readList();
    }
}).mount('#app')

