<template>
    <div>
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary"
            data-toggle="modal"
            data-target="#exampleModal"
        >
            Create new room
        </button>

        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Infomation room
                        </h5>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Name</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exampleFormControlInput1"
                                placeholder="Name room"
                                v-model="name"
                            />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Role</label>
                            <select class="form-control" v-model="is_active">
                                <option value="0">Public</option>
                                <option value="1">Private</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Status</label>
                            <select class="form-control" v-model="status">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <button
                            @click="createRoom"
                            type="button"
                            class="btn btn-primary"
                            data-dismiss="modal"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
    data() {
        return {
            name: "",
            is_active: "",
            status: ""
        };
    },
    methods: {
        ...mapActions("room", ["createNewRoomRequest"]),
        createRoom() {
            const data = {
                name: this.name,
                is_active: this.is_active,
                status: this.status,
                user_id: this.auth.id,
                email: this.auth.email
            };
            this.createNewRoomRequest(data);
        }
    },
    computed: {
        ...mapGetters("user", ["auth"])
    }
};
</script>
