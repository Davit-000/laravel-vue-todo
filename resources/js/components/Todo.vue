<template>
    <li class="list-group-item d-flex justify-content-between align-items-center" @dblclick="edit = !edit">
        <el-input v-if="edit"
            v-model="todo.name"
            @keyup.enter.native="update(todo.id)"
            placeholder="What you need todo?"
            class="mr-2"
            clearable
        ></el-input>

        <el-checkbox v-else
            v-model="todo.done"
            :true-label="1"
            :false-label="0"
            @change="update(todo.id)"
            class="m-0"
        >
            <h5 class="mb-0">{{todo.name}}</h5>
        </el-checkbox>

        <el-button type="danger" icon="el-icon-delete" size="mini" plain circle @click="remove(todo.id)"></el-button>
    </li>
</template>

<script>
    import Todo from "../forms/Todo";

    export default {
        name: "Todo",
        props: {
            todo: {
                required: true,
                type: Object
            },
        },
        data: () => ({
            edit: false
        }),
        methods: {
            /**
             * Emits update event
             *
             * @param {Number} id
             */
            update(id) {
                this.todo.update(this.todo, id).then(response => {
                    if (response.status === 200) {
                        this.$emit('updated', {
                            id: id,
                            todo: new Todo(response.data)
                        });

                        this.edit = false;
                    }
                });
            },
            /**
             * Emits deleted event
             *
             * @param {Number} id
             */
            remove(id) {
                this.todo.delete(id).then(response => {
                     if (response.status === 200 && response.data.status)
                         this.$emit('removed', id);
                });
            },
        },
        mounted() {
        }
    }
</script>

<style scoped>

</style>
