<template>
    <div class="wrapper">
        <SidebarTop></SidebarTop>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <router-link class="brand-link" :to="{ name: 'Dashboard' }">
                <img
                    src="https://scontent.fsgn2-2.fna.fbcdn.net/v/t1.0-1/c1.0.100.100a/p100x100/15781472_1840794652835009_2105292958197217812_n.png?_nc_cat=103&_nc_ohc=iun_UOUT02UAQn1t4TK9JSuNaQpK59Xw74EJEUFMdbB7sU-LuDIhhieoA&_nc_ht=scontent.fsgn2-2.fna&oh=b0e2c05ed231b0fb87c3e65d9eaae218&oe=5E690DC3"
                    alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3"
                    style="opacity: .8"
                />
                <span class="brand-text font-weight-light">Chat realtime</span>
            </router-link>

            <!-- Sidebar -->
            <SidebarLeft></SidebarLeft>
            <!-- /.sidebar -->
        </aside>

        <div class="content-wrapper">
            <section class="content pt-3">
                <div class="container-fluid  card pa-3">
                    <router-view></router-view>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <Footer></Footer>
    </div>
</template>
<script>
import SidebarTop from "./layouts/SidebarTop";
import SidebarLeft from "./layouts/SidebarLeft";
import Footer from "./layouts/Footer";
import { mapGetters, mapActions, mapMutations } from "vuex";
export default {
    components: {
        SidebarTop,
        SidebarLeft,
        Footer
    },
    methods: {
        ...mapActions("user", ["getMeRequest"])
    },
    mounted() {
        this.getMeRequest();
    }
};
</script>
