<template>
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img
                    :src="showAvatar(auth.avatar)"
                    class="img-circle elevation-2"
                    alt="User Image"
                />
            </div>
            <div class="info">
                <a href="" class="d-block">
                    {{ auth.full_name }}
                    <span class="badge badge-danger ml-2">{{ auth.role }}</span>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
                <li class="nav-item">
                    <router-link :to="{ name: 'Users' }" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Danh sách người dùng</p>
                    </router-link>
                </li>

                <li class="nav-item">
                    <router-link :to="{ name: 'ListRoom' }" class="nav-link">
                        <i class="nav-icon far fa-circle text-danger"></i>
                        <p class="text">Danh sách phòng chat</p>
                    </router-link>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
</template>
<script>
import { mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters("user", ["auth"])
    },
    methods: {
        showAvatar(img) {
            if (img != "") {
                return window.location.origin + "/images/users/" + img;
            }
        }
    }
};
</script>
