export default  class R {
    constructor(store) {
        this.store = store;
        this.token = Vue.ls.get('token');
        this.pkey =  Vue.ls.get('pubkey');
        this.user =  Vue.ls.get('user');
        this.name = Vue.ls.get('username');
        this.role = Vue.ls.get('role');
        this.store.state.auth.user   = this.user;
        this.store.state.auth.name   = this.name;
        this.store.state.auth.token  = this.token;
        this.store.state.auth.pubkey = this.pkey;
        this.uid = -1;
        console.log('pkey',this.pkey);
        console.log('token',this.token)
    }
    hasToken(){
            return (this.token && this.pkey); 
    }
    verify() {
        try {
            let rs = jwt.verify(this.token,this.pkey);
            console.log('rs-->',rs);
            this.role = rs.roles;
            this.uid = rs.uid;
            return true;
        } catch (error) {
            return false; 
        }
    }
    can(to,from,next) {
        console.log('to-->',to);
        console.log('check',this.verify(),this.role >= to.meta.role);
        if(to.meta.auth) {
            if(this.verify() && this.chkrole(to) ) {
                if(to.fullPath =='/'){
                    next('/home');
                } else {
                    next();
                }
            } else {
                console.log('no verify and not role togo login');
                next('/login');
            }
        } else {
            next();
        }
    }

    chkrole(to){
        // if not check role you can return true;
        // return true;
        return this.role >= to.meta.role
    }
    canView(menu){
        let yn = this.role <= menu;
        return yn;
    }

    updatetoken() {
        this.token = Vue.ls.get('token');
        this.pkey  = Vue.ls.get('pubkey')
        this.user  = Vue.ls.get('user');
        this.name  = Vue.ls.get('username');
        this.role =  Vue.ls.get('role');
        this.store.state.auth.user   = this.user;
        this.store.state.auth.name   = this.name;
        this.store.state.auth.token  = this.token;
        this.store.state.auth.pubkey = this.pkey;
        this.store.state.auth.logined =  Vue.ls.get('logined');
        axios.defaults.headers.common["authorization"] = `Bearer ${this.token}`;
    }
    clearlogin(){
        this.token = '';
        this.pkey = '';
        this.role = 0;
        this.uid = -1;
        this.name  = '';
        this.user = {};
        this.store.state.auth.user   = this.user;
        this.store.state.auth.name   = this.name;
        this.store.state.auth.token  = this.token;
        this.store.state.auth.pubkey = this.pkey;
        this.store.state.auth.logined = false;
        Vue.ls.remove('token');
        Vue.ls.remove('pubkey');
        Vue.ls.remove('user');
        Vue.ls.remove('username');
        Vue.ls.remove('role');
        Vue.ls.remove('logined');
    }
}
