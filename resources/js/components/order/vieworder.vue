<template>
    <div>
        <div class="row">
            <router-link to="/order" class="btn btn-primary"
                >Go Back
            </router-link>
        </div>

        <div class="row justify-content-center">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">
                                            Order Details
                                        </h1>
                                    </div>

                                    <hr />
                                    <div class="text-center"></div>
                                    <div class="text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
export default {
    created() {
        if (!User.loggedIn()) {
            this.$router.push({ name: "/" });
        }
    },

    data() {
        return {
            errors: {},
            categories: {},
            suppliers: {}
        };
    },
    created() {
        let id = this.$route.params.id;
        axios
            .get("/api/product/" + id)
            .then(({ data }) => (this.form = data))
            .catch(console.log("error"));
    },

    methods: {}
};
</script>

<style type="text/css"></style>
