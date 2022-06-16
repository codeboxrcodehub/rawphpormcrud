<template>
  <div class="home">
    <h1>User List</h1>
    <table class="table" style="margin: auto; border: 1px solid #ccc">
      <thead>
        <tr >
          <td style=" border: 1px solid #ccc; padding: 1rem">Id</td>
          <td style=" border: 1px solid #ccc; padding: 1rem">Name</td>
          <td style=" border: 1px solid #ccc; padding: 1rem">Email</td>
          <td style=" border: 1px solid #ccc; padding: 1rem">Action</td>
        </tr>
      </thead>
      <tbody>
      <tr v-for="user in userList" :key="user.id"  >
        <td style=" border: 1px solid #ccc; padding: 1rem">{{ user.id }}</td>
        <td style=" border: 1px solid #ccc; padding: 1rem">{{ user.name }}</td>
        <td style=" border: 1px solid #ccc; padding: 1rem">{{ user.email }}</td>
        <td style=" border: 1px solid #ccc; padding: 1rem">
          <button>Edit</button>
          <button>Delete</button>
        </td>
      </tr>
      </tbody>
    </table>
<!--    <HelloWorld msg="Welcome to Your Vue.js App"/>-->
  </div>
</template>

<script>
// @ is an alias to /src
// import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'HomeView',
  components: {
    // HelloWorld
  },
  mounted() {
   this.getUser()
  },
  data() {
    return {
      userList: []
    }
  },
  methods: {
    getUser() {
      this.axios.get('http://orm.test').then(response => {
        this.userList = response.data
        console.log(response.data[0].id)
      }).catch(err => {
        console.log(err)
      })
    }
  }

}
</script>
