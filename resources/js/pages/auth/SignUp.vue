<template>
  <div class="flex min-h-full items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-md space-y-8">
      <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Sign up to create your account</h2>
      <div class="mt-8 space-y-6">
        <input type="hidden" name="remember" value="true" />
        <div class="rounded-md shadow-sm">
          <div class="mb-2">
            <label for="first_name" class="sr-only">First name</label>
            <input
              id="first_name"
              name="first_name"
              type="text"
              v-model="this.register.first_name"
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="First name"
            />
          </div>

          <div class="mb-2">
            <label for="last_name" class="sr-only">Last name</label>
            <input
              id="last_name"
              name="last_name"
              type="text"
              v-model="this.register.last_name"
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Last name"
            />
          </div>

          <div class="mb-2">
            <label for="email_address" class="sr-only">Email address</label>
            <input
              id="email_address"
              name="email"
              type="email"
              v-model="this.register.email"
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Email address"
            />
          </div>

          <div class="mb-2">
            <label for="password" class="sr-only">Password</label>
            <input
              id="password"
              name="password"
              type="password"
              v-model="this.register.password"
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Password"
            />
          </div>

          <div>
            <label for="confirm_password" class="sr-only">Confirm password</label>
            <input
              id="confirm_password"
              name="confirm_password"
              type="password"
              v-model="this.register.confirm_password"
              class="relative block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"
              placeholder="Confirm password"
            />
          </div>
        </div>

        <div>
          <button @click="submitApi()" class="group relative flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Sign Up
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      register: {
        first_name: null,
        last_name: null,
        email: null,
        password: null,
        confirm_password: null,
      }
    }
  },

  methods: {
    async submitApi() {
      const formData = {
        first_name: this.register.first_name,
        last_name: this.register.last_name,
        email: this.register.email,
        password: this.register.password,
        confirm_password: this.register.confirm_password,
      }

      axios.post('/api/sign-up', formData).then(response => {
        if(response.status === 200) {
          console.log('Hello')
        }
      }).catch( errors => {
        console.log(errors)
      })
    }
  }
}
</script>

<style scoped>

</style>
