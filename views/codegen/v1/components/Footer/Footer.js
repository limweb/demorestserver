export default { 
    template: `
    <div class="navbar navbar-expand-lg navbar-light noprint">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                data-target="#navbar-footer">
                <i class="mr-2 icon-unfold"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
            <span class="navbar-text">
                &copy; 2015 - 2018. <a href="#">Accman Co.,Ltd.</a> by <a
                    href="#" >Accman</a>
            </span>

            <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item" >
                        {{breakpoint}}/{{window.width}}/{{layout}}/{{$route.meta}}
                </li>
            </ul>
        </div>
    </div>
    `, 
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Footer',
          window: {
            width: 0,
            height: 0
         } 
      }; 
    }, 
    created() { 
        console.log( this.name + 'component is created'); 
        window.addEventListener("resize", this.handleResize);
        this.handleResize(); 
    }, 
    methods: {
        isMobileDevice() {
            return (
                typeof window.orientation !== "undefined" ||
                navigator.userAgent.indexOf("IEMobile") !== -1
            );
        },
        handleResize() {
            this.window.width = window.innerWidth;
            this.window.height = window.innerHeight;
            this.$store.state.window.width = window.innerWidth;
            this.$store.state.window.height = window.innerHeight;
        }
    }, 
    computed: {
          layout() {
            console.log("layout----", this.$route.meta.layout);
                if (this.isMobileDevice() || this.window.width < 1024) {
                    return "mobilelayout";
                } else {
                    return this.$route.meta.layout;
                }
         },
         breakpoint() {
            if (this.window.width > 2014) {
                return '----xxl--2014px';
            } else if (this.window.width > 1920) {
                return '----x9l--1920px';
            } else if (this.window.width > 1600) {
                return '----x6l--1600px';
            } else if (this.window.width > 1500) {
                return '----x5l--1500px';
            } else if (this.window.width > 1280) {
                return "----xl--1280px";
            } else if (this.window.width > 1024) {
                return " ----lg--1024px";
            } else if (this.window.width > 768) {
                return "----md--768px";
            } else if (this.window.width > 640) {
                return "----sm--640px";
            } else {
                return "----sm----";
            }
         },
    }, 
    mounted() {
        console.log('-----footer mounted----');
        window.App.initCore();
    }, 
    components:{} 
}; 