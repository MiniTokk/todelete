<template>
  <!--Login view-->
  <div class="container">
    <div v-if="$auth.loggedIn" class="wrapper fadeInDown">
      <h2 class="text-warning mb-3 text-center fadeIn first">
        Welcome {{ $auth.user.name }}!
      </h2>
      <h5 class="text-gold mb-3 text-center fadeIn first">
        Let's Take A Few Minutes...
      </h5>
      <div>
        <img
          class="fadeIn first"
          src="https://media1.giphy.com/media/SpopD7IQN2gK3qN4jS/giphy.gif"
        />
      </div>
      <div>
        <h2 class="mt-3 fadeIn second">
          <NuxtLink to="/iq_test/1">Start IQ Test</NuxtLink>
        </h2>
      </div>
    </div>
<!--Logout view-->
    <div v-else class="wrapper fadeInDown">
      <h2 class="text-danger mb-3 text-center fadeIn first">
        You've been Logout!
      </h2>
      <div>
        <img
          class="fadeIn first"
          src="https://miro.medium.com/max/1400/1*CsJ05WEGfunYMLGfsT2sXA.gif"
        />
      </div>

      <div>
        <h2 class="mt-3 fadeIn second fadeIn second">
          <NuxtLink to="/login">Please Login again to take IQTest.</NuxtLink>
        </h2>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
export default {
  name: "IndexPage",
  async asyncData({ $axios, store }) {
    try {
      const data = await $axios.$get(`/api/v1/iq_test`);
      store.commit("SET_LANGUAGES", data.iq_tests);
      store.commit("SET_RECORDS", data.records);
      const tempData = [];
      data.iq_tests.map((element) => {
        tempData.push({
          language_id: element.id,
          answers: element.children
            ? Array.from({ length: element.children.length }, () => "")
            : null,
        });
      });
      store.commit("SET_INIT_ANSWERS", tempData);
      let items = data.records.map((record, index) => {
        return {
          id: user_id,
          name: $auth.user.name,
          "no.": index + 1,
          date: moment(record.created_at).format("DD-MM-YYYY"),
          correct_answers: record.details_answer.filter(
            (ans) => ans.status === 1
          ).length,
        };
      });
      return {
        data: items,
        fields: ["no.", "date", "correct_answers", "details"],
      };
    } catch (error) {
      console.log(error);
    }
  },
};
</script>
<style scoped>
html {
  background-color: #fafa41;
}

body {
  font-family: "Poppins", sans-serif;
  height: 100vh;
}

a {
  color: #fafa41;
  display: inline-block;
  text-decoration: none;
  font-weight: 400;
  padding: 10px;
  background-color: #000;
  border-radius: 20px;
}
h2.active {
  color: #0d0d0d;
  border-bottom: 2px solid #dbf325;
}
h2 {
  text-align: center;
  font-size: 25px;
  font-weight: 600;
  text-transform: uppercase;
  display: inline-block;
  color: #cccccc;
}
/* STRUCTURE */

.wrapper {
  display: flex;
  align-items: center;
  flex-direction: column;
  justify-content: center;
  width: 100%;
  min-height: 100%;
  padding: 20px;
}
.fadeIn.first {
  -webkit-animation-delay: 0.4s;
  -moz-animation-delay: 0.4s;
  animation-delay: 0.4s;
}

.fadeIn.second {
  -webkit-animation-delay: 0.6s;
  -moz-animation-delay: 0.6s;
  animation-delay: 0.6s;
}
</style>