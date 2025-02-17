<template>
  <v-app dark>
    <v-main style="min-height: 100vh" >
      <Nuxt />
    </v-main>
  </v-app>
</template>
 
<script>
export default {
  data() {
    return {
      pageNotFound: "404 Not Found",
      otherError: "An error occurred",
    };
  },
};
</script>
