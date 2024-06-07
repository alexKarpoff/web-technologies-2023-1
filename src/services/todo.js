import TodoRepository from "../repository/todo.js";

export default class Todo{
    static async getAll() {
        try {
            return await TodoRepository.getAll()
        }
		catch(err) {
            console.log(err);
            return [];
        }
    }

    static async getId(id) {
        try {
            return await TodoRepository.getId(id)
        }
		catch(err) {
            console.log(err);
            return null;
        }
    }

    static async update(id, status) {
        try {
            return await TodoRepository.update(id, { completed: status })
        }
		catch(err) {
            console.log(err);
        }
    }

    static async delete(id) {
        try {
            return await TodoRepository.delete(id)
        }
		catch(err) {
            console.log(err);
        }
    }

    static async add(description) {
        try {
            return await TodoRepository.add({description})
        }
		catch(err) {
            console.log(err);
        }
    }
}