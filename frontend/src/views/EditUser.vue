<template>
  <div class="about">
    <h1>Edit User</h1>
    <div class="add_user">
      <form>
        <div>
          <label>User Name: </label>
          <input type="text" class="" v-model="user.name" name="name">
        </div>
        <div>
          <label>Email: </label>
          <input type="email" class="" v-model="user.email" name="email">
        </div>
        <div>
          <label>Password: </label>
          <input type="password" class="" v-model="user.password" name="password">
        </div>
        <div>
          <button type="button" @click="editUser()">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>

export default {
  mounted() {
    this.getUser()
  },
  data() {
    return {
      id : this.$route.params.id,
      user: {
        name: '',
        email: '',
        password: '',
      }
    }
  },
  methods: {
    getUser() {
      this.axios.get('http://orm.test/editUser.php?id='+this.id).then(response => {
        this.user = response.data
      }).catch()
    },
    editUser() {
      let formData = new FormData();
      formData.append('id', this.id);
      formData.append('name', this.user.name);
      formData.append('email', this.user.email);
      formData.append('password', this.user.password);
      this.axios.post('http://orm.test/editUser.php', formData).then(response => {
        if (response.data == 'Update success'){
          this.$router.push('/')
        }
      }).catch()
    }
  }
}
</script>

<style>
.add_user{
  text-align: center;
}
.add_user form{

}
.add_user div {
  padding: 10px;
}
.add_user div input{
  padding: 5px;
  border: 0.5px solid #ccc;
  border-radius: 5px;
}
</style>
