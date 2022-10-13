<template>
  <div>
    <client-only class="bg-dark">
      <button class="btn btn-danger next-btn">
        <NuxtLink to="/" class="next-route text-white">Exit</NuxtLink>
      </button>
      <b-tabs content-class fill>
        <b-tab
          v-for="item in data.languages"
          :key="item.id"
          :title="item.title"
        >
          <div v-for="(d, i) in item.children" :key="d.id">
            <b-card class="border-top-0">
              <span>Question No - {{ i + 1 }}</span>
              <br />

              <h6 class="ml-5 mt-3">{{ d.title }}</h6>

              <div
                v-for="(cd, index) in d.children"
                :key="cd.id"
                class="d-flex align-items-center mt-2 justify-content-between"
              >
                <div
                  class="d-inline p-1 ml-5"
                  :class="
                    recordArray.includes(cd.id.toString()) && cd.status === 0
                      ? 'bg-danger text-white'
                      : cd.status === 1
                      ? 'bg-success text-white'
                      : ''
                  "
                >
                  <span>({{ index + 1 }}) {{ cd.title }}</span>
                </div>
                <div
                  class="d-inline p-1 bg-success text-white"
                  v-if="cd.status"
                >
                  <span>{{
                    recordArray.includes(cd.id.toString())
                      ? "Your answer is✔️"
                      : "This is correct answer"
                  }}</span>
                </div>
                <div
                  class="d-inline p-1 bg-danger text-white"
                  v-if="
                    recordArray.includes(cd.id.toString()) && cd.status === 0
                  "
                >
                  <span>Your answer is ❌</span>
                </div>
              </div>
            </b-card>
          </div>
        </b-tab>
      </b-tabs>
    </client-only>
  </div>
</template>
  
  <script>
export default {
  async asyncData({ store, redirect, params }) {
    let languages, records;
    if (process.client) {
      languages = store.state.languages;
      records = store.state.records.find((record) => record.id == params.id);
    } else {
      redirect("/");
    }
    return {
      data: {
        languages: languages,
        records: records,
      },
    };
  },
  computed: {
    recordArray() {
      return this.data.records.answer.split(",");
    },
  },
};
</script>
  <style scoped>
.tabs {
  color: #fff;
  background-color: #ffc107;
}
.active {
  color: #495057;
  background-color: #ffc107;
}
.nab-tabs .nav-link.active,
.nav-tabs .nav-item.show .nav-link {
  color: #495057;
  background-color: #ffc107;
  border-color: #dee2e6 #dee2e6 #fff;
}
a {
  color: #00ff47;
}
.ans-count {
  margin-left: 50%;
}
.btn-dark {
  margin-left: 80%;
}
.btn-success {
  margin-left: 80%;
}
</style>