<template>
  <form class="max-w-sm mx-auto mt-8" @submit.prevent="addDeal">
    <h2 class="text-xl font-bold mb-4">Deal</h2>
    <div class="mb-4">
      <label for="dealName" class="block text-sm font-semibold mb-1">Deal Name:</label>
      <input type="text" id="dealName" v-model="dealName" class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>
    <div class="mb-4">
      <label for="dealStage" class="block text-sm font-semibold mb-1">Deal Stage:</label>
      <input type="text" id="dealStage" v-model="dealStage" class="w-full border border-gray-300 rounded px-3 py-2" required>
    </div>
    <div class="mb-4">
      <label for="dealAccountName" class="block text-sm font-semibold mb-1">Account Name:</label>
      <input type="text" id="dealAccountName" v-model="dealAccountName" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Submit</button>
  </form>

  <form class="max-w-sm mx-auto mt-8" @submit.prevent="addAccount">
    <h2 class="text-xl font-bold mb-4">Account</h2>
    <div class="mb-4">
      <label for="accountName" class="block text-sm font-semibold mb-1">Account Name:</label>
      <input type="text" id="accountName" v-model="accountName" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <div class="mb-4">
      <label for="accountWebsite" class="block text-sm font-semibold mb-1">Account Website:</label>
      <input type="text" id="accountWebsite" v-model="accountWebsite" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <div class="mb-4">
      <label for="accountPhone" class="block text-sm font-semibold mb-1">Account Phone:</label>
      <input type="text" id="accountPhone" v-model="accountPhone" class="w-full border border-gray-300 rounded px-3 py-2">
    </div>
    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Submit</button>
  </form>

  <div class="mt-5 ms-5 text-xl" v-if="message">{{ message }}</div>

</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      dealName: '',
      dealStage: '',
      accountName: '',
      accountWebsite: '',
      accountPhone: '',
      dealAccountName: '',
      message: '',
    }
  },
  methods: {
    addDeal() {
      axios.post('/api/add-deal', {
        dealName: this.dealName,
        dealStage: this.dealStage,
        dealAccountName: this.dealAccountName,
      })
          .then(response => {
            console.log(response);
            this.message = response.data;
            this.dealName = '';
            this.dealStage = '';
            this.dealAccountName = '';
          })
          .catch(error => {
            console.error('Error:', error);
            this.message = error.response.data.message;
          });
    },
    addAccount() {
      axios.post('/api/add-account', {
        accountName: this.accountName,
        accountWebsite: this.accountWebsite,
        accountPhone: this.accountPhone
      })
          .then(response => {
            console.log(response);
            this.message = response.data;
            this.accountName = '';
            this.accountWebsite = '';
            this.accountPhone = '';

          })
          .catch(error => {
            console.error('Error:', error);
            this.message = error.response.data.message;
          });
    }
  }
}
</script>

<style scoped>

</style>