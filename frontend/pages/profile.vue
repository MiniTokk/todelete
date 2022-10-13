<template class="align-self-md-center">
  <section class="vh-100" style="background-color: #f4f5f7">
    <div class="container py-5 h-100">
      <button class="btn btn-success next-btn">
        <NuxtLink to="/" class="next-route text-white">Back</NuxtLink>
      </button>
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-lg-6 mb-4 mb-lg-0">
          <div class="card mb-3" style="border-radius: 0.5rem">
            <div class="row g-0">
              <div
                class="col-md-4 gradient-custom text-center text-white"
                style="
                  border-top-left-radius: 0.5rem;
                  border-bottom-left-radius: 0.5rem;
                "
              >
                <img
                  src="https://png.pngtree.com/png-vector/20190802/ourmid/pngtree-user-profile-id-login-business-flat-line-filled-icon-vector-png-image_1646864.jpg"
                  alt="Avatar"
                  class="img-fluid my-5"
                  style="width: 80px"
                />
              </div>

              <!--Read user data from database and show-->
              <div class="col-md-8">
                <div class="card-body p-4">
                  <h6>Your Name</h6>
                  <h3>{{ $auth.user.name }}</h3>
                  <hr class="mt-0 mb-4" />
                  <div class="row pt-1">
                    <div class="col-12 mb-3">
                      <h6>Email</h6>
                      <p>{{ $auth.user.email }}</p>
                    </div>

                    <div class="col-12 mb-3">
                      <h6>Phone Number</h6>
                      <p>{{ $auth.user.phonenumber }}</p>
                    </div>

                    <div class="col-12 mb-3">
                      <h6>Age</h6>
                      <p>{{ $auth.user.age }}</p>
                    </div>
                  </div>

                  <div class="-mt-5 mb-5">
                    <button
                      type="button mt-5"
                      class="p-2 btn-danger rounded"
                      @click="logout"
                    >
                      Logout
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-10">
        <div class="col-6 mb-4 r-20"></div>
      </div>
    </div>
  </section>
</template>
<script>
export default {
  middleware: "auth",

  methods: {
    async logout() {
      this.$nuxt.$loading.start();
      this.$auth.logout();
      this.$nuxt.$loading.finish();
      this.$router.push("/login");
    },
  },
};
</script>
<style scoped>
.row {
  flex-direction: "row";
}
</style>