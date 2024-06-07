import api from  "../services/api.js";

export default TodoRepository = {
    async getAll() {
        return await api('/todo', {
            method: 'GET'
        });
    },

    async getId(id) {
        return await api(`/todo/${id}`, {
            method: 'GET',
        });
    },

    async update(id, status) {
        return await api(`/todo/${id}`, {
            method: 'PUT',
            body: JSON.stringify(status)
        });
    },

    async delete(id) {
        return await api(`/todo/${id}`, {
            method: "DELETE",
        });
    },

    async add(description){
        return await api(`/todo`,{
            method: 'POST',
            body: JSON.stringify(description)
        });
    },
}