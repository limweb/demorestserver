export default { 
    template: `
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Accman</b>CODEG</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
      <form action="#" method="post">
        <div class="mb-3 input-group">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button  class="btn btn-primary btn-block" @click="chkpass" >Request new password</button>
          </div>
        </div>
      </form>

      <p class="mt-3 mb-1">
        <router-link to="/login">Login</router-link>
      </p>
      <p class="mb-0">
        <router-link to="/register">Register a new membership</router-link>
      </p>
    </div>
  </div>
</div>    
  `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'User Records', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
      chkpass(evt){
        evt.preventDefault();
        this.$router.push('/recoverpass');
      }
    }, 
    mounted() {}, 
    computed: {}, 
    components:{} 
}; 