
<template>
    <div>
        <h2 class="text-center">Blogs List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Content</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="blog in blogs" :key="blog.id">
                <td>{{ blog.id }}</td>
                <td>{{ blog.title }}</td>
                <td>{{ blog.content }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: blog.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteBlog(blog.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            blogs: []
        }
    },
    created() {
        this.axios
            .get('http://localhost:8000/api/blogs/')
            .then(response => {
                this.blogs = response.data;
            });
    },
    methods: {
        deleteProduct(id) {
            this.axios
                .delete(`http://localhost:8000/api/blogs/${id}`)
                .then(response => {
                    let i = this.blogs.map(data => data.id).indexOf(id);
                    this.blogs.splice(i, 1)
                });
        }
    }
}
</script>
