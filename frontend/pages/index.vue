<template>
  <v-row justify="center" align="center">
    <v-col cols="12" sm="8" md="6">
      <v-card>
        <v-container class="text-center">
          <pre>{{ data }}</pre>
        </v-container>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
export default {
  name: "IndexPage",
  data: () => ({
    data: null,
  }),
  async created() {
    let response = await this.$axios.get("/api/check");
    this.data = response.data;
  },
};
</script>
