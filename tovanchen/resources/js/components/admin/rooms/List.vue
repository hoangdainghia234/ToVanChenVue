<template>
    <div>
        <table class="table">
            <caption>
                <CreateRoom></CreateRoom>
            </caption>
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created by</th>
                    <th scope="col">Role</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="room in rooms" :key="room.id">
                    <th scope="row">{{ room.id }}</th>
                    <td>
                        {{ room.name }}
                    </td>
                    <td>Phong Jr</td>
                    <td>
                        <span
                            v-if="room.is_active == 1"
                            class="badge badge-danger ml-2"
                            >{{ showRole(room.is_active) }}</span
                        >
                        <span v-else class="badge badge-success ml-2">{{
                            showRole(room.is_active)
                        }}</span>
                    </td>
                    <td>
                        <span
                            v-if="room.status == 0"
                            class="badge badge-success ml-2"
                        >
                            Active
                        </span>

                        <span v-else class="badge badge-danger ml-2">
                            Inactive
                        </span>
                    </td>
                    <td>
                        <button
                          @click="updateStatus(room.id)"
                            type="button"
                            :class="`${room.status == 0 ? 'btn-outline-danger btn btn-sm' : 'btn-outline-success btn btn-sm'}` "
                        >
                            {{ room.status == 0 ? 'Inactive' : 'Active' }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import CreateRoom from "./Create";

export default {
    data() {
        return {};
    },
    components: {
        CreateRoom
    },
    methods: {
        ...mapActions("room", ["getDataRoomRequest", "createNewRoomRequest", "updateStatusRequest"]),
        showRole(role) {
            return role == 0 ? "Public" : "Private";
        },
        updateStatus(id){
          this.updateStatusRequest(id);
        }
    },
    computed: {
        ...mapGetters("room", ["rooms"])
    },
    mounted() {
        this.getDataRoomRequest();
    }
};
</script>
