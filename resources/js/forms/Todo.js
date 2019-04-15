import TodoService from '../services/TodoService';

export default class Todo {
    id = null;
    name = '';
    done = 0;
    #service;

    constructor(todo) {
        this.id = todo.id || null;
        this.name = todo.name || '';
        this.done = todo.done || 0;
        this.#service = new TodoService();
    }

    reset() {
        this.name = '';
        this.done = false;
    }

    /**
     * Store todo
     * @param {Todo} todo
     * @returns {AxiosPromise<any>}
     */
    store(todo) {
        return this.#service.store(todo);
    }

    /**
     * Updates todo
     *
     * @param {Todo} todo
     * @param {Number} id
     * @returns {AxiosPromise<any>}
     */
    update(todo, id) {
        return this.#service.update(todo, id);
    }

    /**
     * Delete todo
     *
     * @param {Number} id
     * @returns {AxiosPromise}
     */
    delete(id) {
        return this.#service.delete(id);
    }
}
