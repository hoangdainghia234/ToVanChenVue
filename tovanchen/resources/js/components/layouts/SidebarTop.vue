<template>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"
                        ><i class="fas fa-bars"></i
                    ></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a
                        @click="logout"
                        class="nav-link"
                        data-toggle="dropdown"
                        href="javascript:void(0)"
                    >
                        <i class="fas fa-sign-out-alt"></i>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
            </ul>
        </nav>
    </div>
</template>
<script>
import { mapActions } from "vuex";
export default {
    methods: {
        ...mapActions("user", ["logoutRequest"]),
        logout() {
            this.logoutRequest();
            this.$router.go("/");
        }
    }
};
</script>
