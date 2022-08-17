<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
})
</script>

<template>
    <Head title="Welcome" />

    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <h1>{{new_task}}</h1>
    </div>
    
    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
        <input type="text" v-model="new_task"/> <button v-on:click="createTodos">Update</button>
    </div>

    <table>
        <tr>
            <th>Date</th>
            <th>Task</th>
            <th>Action</th>
        </tr>
        <tr v-for="todo in todos" :key="todo.id">
            <td>{{todo.created_at}}</td>
            <td>{{todo.task}}</td>
            <td><button v-on:click="deleteTodos(todo.id)">X</button></td>
        </tr>
    </table>

    

</template>


<script>
export default {
    data () {
        return {
            form: this.$inertia.form({
                newfile: null,
            }),
            todos: [],
            new_task: ''
        }
    },
    mounted() {
        this.loadTodos();
    },
    methods: {
        submit() {
            this.form.post('api/image/store')
        },
        loadTodos(){
            axios.get('/api/todo').then(response=>{
                this.todos = response.data
            });
        },
        createTodos(){
            axios.post('/api/todo/store',{new_task: this.new_task}).then(response=>{
                console.log(response.status)
            });
        },
        deleteTodos(id){
            console.log(id)
            axios.delete('/api/todo/'+id).then(response=>{
                console.log(response.status)
            })
        }
    }
}
</script>
