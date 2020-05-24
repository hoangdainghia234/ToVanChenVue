<template>
    <div>
        <table class="table">
            <caption>Danh sách người dùng</caption>
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <th scope="row">{{ user.id }}</th>
                    <td>{{ user.user_profile.first_name }} {{ user.user_profile.first_name }}</td>
                    <td>{{ user.email }}</td>
                    <td>
                        <span v-if="user.role == 0" class="badge badge-danger ml-2">{{ showRole(user.role) }}</span>
                        <span v-else class="badge badge-success ml-2">{{ showRole(user.role) }}</span>
                    </td>
                    <td>
                        <button v-if="user.status == 0" type="button" class="btn btn-outline-danger btn-sm">Inactive</button>
                        <button v-else type="button" class="btn btn-outline-success btn-sm">Active</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    data(){
        return {

        }
    },
    methods: {
        ...mapActions('user', ['getDataUserRequest']),
        showRole(role){
            return role == 0 ? 'Admin' : 'Customer';
        }
    },
    computed:{
        ...mapGetters('user', ['users']),
        
    },
    mounted(){
        this.getDataUserRequest();
    }
}
</script>