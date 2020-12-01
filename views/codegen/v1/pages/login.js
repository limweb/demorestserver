export default { 
    template: `<div class="login-box">
  <div class="login-logo">
    <router-link to="#"><b>AccMan</b>CODEG</router-link>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
      <form action="#" method="post">
        <div class="mb-3 input-group">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="mb-3 input-group">
          <input type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="flex icheck-primary align-center">
              <input type="checkbox" id="remember" class="mr-3">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" @click="login()" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
      <div class="mb-3 text-center social-auth-links">
        <p>- OR -</p>
        <router-link to="/authfacebook" class="btn btn-block btn-primary">
          <i class="mr-2 fab fa-facebook"></i> Sign in using Facebook
        </router-link>
        <router-link to="/authgoogle" class="btn btn-block btn-danger">
          <i class="mr-2 fab fa-google-plus"></i> Sign in using Google+
        </router-link>
      </div>
      <p class="mb-1">
        <router-link to="/forgotpass">I forgot my password</router-link>
      </p>
      <p class="mb-0">
        <router-link to="/register" class="text-center">Register a new membership</router-link>
      </p>
    </div>
  </div>`, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Login', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    mounted() {
    }, 
    methods: {
     login(evt){
        evt.preventDefault();
        this.$router.push('/index');
      }

    }, 
    computed: {}, 
    components:{} 
}; 