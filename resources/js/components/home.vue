<template>
<div>
    <h3 class="text-center mt-5">Employee Data</h3><br />
 <router-link :to="{name: 'addEmployee'}" class="btn btn-primary">Add Employee
                        </router-link>
    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Hobby</th>
                <th>Gender</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="post in AllData" :key="post.id">
                <td>{{ post.id }}</td>
                <td>{{ post.title }}</td>
                <td>{{ post.hobby }}</td>
                <td>{{ post.gender }}</td>
                <td>{{ post.description }}</td>
                <td><img :src="'storage/image/' + post.picture" style="width:50px;"/></td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary">Edit
                        </router-link> 
                        <router-link :to="{name: 'delete', params: { id: post.id }}" class="btn btn-danger">Delete
                        </router-link>
                         <!--button class="btn btn-danger" @click="deletePost(post.id)">Delete</button-->
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
            AllData: []
        }
    },
    created() {
        this.axios
            .get('http://127.0.0.1:8000/api/home')
            .then(response => {
                this.AllData = response.data;
            });
    },
    methods: {
        deletePost(id) {
            this.axios
                .get(`http://127.0.0.1:8000/api/delete/${id}`)
                
                .then((response) => {
                    this.$router.push("/").catch(()=>{});

                })
        }
    }
}
</script>
