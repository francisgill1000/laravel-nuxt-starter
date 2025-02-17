<template>
  <v-container>
    <v-app-bar app color="primary" dark>
      <v-toolbar-title>Dashboard</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn text @click="logout">Logout</v-btn>
    </v-app-bar>

    <v-main>
      <v-container>
        <v-card class="pa-4" outlined>
          <v-card-title class="text-h5">Welcome, {{ user.name }}</v-card-title>
          <v-card-subtitle>Email: {{ user.email }}</v-card-subtitle>
        </v-card>
      </v-container>
    </v-main>
  </v-container>
</template>

<script>
export default {
  middleware: 'auth',
  computed: {
    user() {
      return this.$auth.user;
    }
  },
  methods: {
    async logout() {
      await this.$auth.logout();
      this.$router.push('/login');
    }
  }
};
</script>
