export default { 
   template: `
 <div class="m-0 max-w-1/4">
  <div class="lockscreen-logo">
    <a href="#"><b>Accman</b>CODEG</a>
  </div>
  <div class="text-center lockscreen-name">John Doe</div>
  <div class="lockscreen-item">
    <div class="lockscreen-image">
      <img src="../../dist/img/user1-128x128.jpg" alt="User Image">
    </div>
    <form class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password">

        <div class="input-group-append">
          <button type="button" class="btn"><i class="fas fa-arrow-right text-muted" @click="gotohome"></i></button>
        </div>
      </div>
    </form>
  </div>
  <div class="text-center help-block">
    Enter your password to retrieve your session
  </div>
  <div class="text-center">
    <a href="login.html">Or sign in as a different user</a>
  </div>
  <div class="text-center lockscreen-footer">
    Copyright &copy; 2014-2019 <b><a href="#" class="text-black">Accman co.,ltd.</a></b><br>
    All rights reserved
  </div>
</div>`,
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Lock Screen', 
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: {
        gotohome(){
            this.$router.push('/crud');
        },
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 