import axios from 'axios'

export default class Service {
    url = window.location.origin;

    constructor(path) {
        this.url = this.url + '/' + path;
    }

    /**
     * Get all resource
     *
     * @returns {AxiosPromise<any>}
     */
    all() {
        return axios.get(this.url);
    }

    /**
     * Get specified resource
     *
     * @param {Number} id
     * @returns {AxiosPromise<any>}
     */
    find(id) {
        return axios.get(`${this.url}/${id}`);
    }

    /**
     * Store resource
     *
     * @param {Todo} resource
     * @returns {AxiosPromise<any>}
     */
    store(resource) {
        return axios.post(this.url, resource);
    }

    /**
     * Update specified resource
     *
     * @param {Number} id
     * @param {Todo} resource
     * @returns {AxiosPromise<any>}
     */
    update(resource, id) {
        console.log(this.url);
        return axios.put(`${this.url}/${id}`, resource);
    }

    /**
     * Delete specified resource from db
     *
     * @param {Number} id
     * @returns {AxiosPromise}
     */
    delete(id) {
        return axios.delete(`${this.url}/${id}`);
    }
}
