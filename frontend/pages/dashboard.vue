
<template>
  <b-container fluid class="p-5">
    <button class="btn btn-success next-btn">
      <NuxtLink to="/" class="next-route text-white">Back</NuxtLink>
    </button>
<!--Read user name from database-->
    <h2 class="active text-warning mb-3 text-center fadeIn first">
      {{ $auth.user.name }} Score DashsBoard
    </h2>
    <b-row class="mt-3">
      <b-col>
        <b-table striped hover :items="data" :fields="fields">
          <template #cell(details)="row">
            <b-button
              size="sm"
              class="mr-2 btn-warning"
              tag="nuxt-link"
              :to="`/record/${row.item.id}`"
            >
              Check Answers
            </b-button>
          </template>
        </b-table>
      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import moment from "moment";
export default {
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
          "no.": index + 1,
          date: moment(record.created_at).format("DD-MM-YYYY"),
          correct_answers: record.details_answer.filter(
            (ans) => ans.status === 1
          ).length,
        };
      });
      return {
        data: items,
        fields: ["no.", "name", "date", "correct_answers", "details"],
      };
    } catch (error) {
      console.log(error);
    }
  },
};
</script>
