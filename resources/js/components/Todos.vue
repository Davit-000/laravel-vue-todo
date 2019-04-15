<template>
    <el-row>
        <el-col :span="10" :offset="7">
            <el-card shadow="hover">
                <el-row slot="header">
                    <el-col :span="6">
                        <el-button type="text">({{todosLeft}}) items left</el-button>
                    </el-col>
                    <el-col :span="12">
                        <el-radio-group v-model="filter" size="small">
                            <el-radio-button :label="2">All</el-radio-button>
                            <el-radio-button :label="0">Active</el-radio-button>
                            <el-radio-button :label="1">Completed</el-radio-button>
                        </el-radio-group>
                    </el-col>
                    <el-col :span="6">
                        <el-button type="text">Clear completed</el-button>
                    </el-col>
                </el-row>

                <el-input
                    v-model="todo.name"
                    :clearable="true"
                    @keyup.enter.native="create"
                    placeholder="What needs to be done?"
                >
                    <span class="el-input__prefix" slot="prefix">
                        <el-button type="text" icon="el-icon-arrow-down"></el-button>
                    </span>
                </el-input>

                <ul class="list-group list-group-flush mt-3">
                    <todo v-for="todo in todos"
                          :key="todo.id"
                          :todo="todo"
                          @updated="update"
                          @removed="remove"
                    ></todo>
                </ul>
            </el-card>
        </el-col>
    </el-row>
</template>

<script>
    import todo from './Todo';
    import Todo from '../forms/Todo';

    export default {
        props: {
            items: {
                required: false,
                default: () => [],
                type: Array
            }
        },
        data() {
            return {
                filter: 2,
                todos: this.items.map(todo => new Todo(todo)),
                todo: {
                    name: '',
                    done: false
                }
            }
        },
        methods: {
            /**
             * Creates todo
             **/
            create() {
                this.todo.store(this.todo).then(response => {
                    if (response.status === 201) {
                        this.todos.push(new Todo(response.data));
                        this.todo.reset();
                    }
                });
            },
            /**
             * Update todo in list
             * @param {Object} payload
             */
            update(payload) {
                let index = this.todos.findIndex(todo => todo.id === payload.id);

                this.todos[index] = payload.todo;
            },
            /**
             * Remove todo from list
             *
             * @param id
             */
            remove(id) {
                let index = this.todos.findIndex(todo => todo.id === id);

                this.todos.splice(index, 1);
            }
        },
        created() {
            this.todo = new Todo({});
        },
        computed: {
            todosLeft() {
                return this.todos.filter(todo => !todo.done).length;
            },
            filtered() {
                if (this.filter !== 2)
                    return this.todos.filter(todo => todo.done === this.filter);

                return this.todos;
            }
        },
        components: {
            todo
        }
    }
</script>
