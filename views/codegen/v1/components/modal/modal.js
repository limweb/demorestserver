export default { 
    template: `<transition name="modal">
        <div class="modal-mask" v-show="show">
            <div class="modal-container">
                <div class="modal-header">
                    <slot name="header">
                        <h3>New Post</h3>
                    </slot>
                </div>
            
                <div class="modal-body">
                    <slot>
                        <label class="form-label">
                            Title
                            <input class="form-control">
                        </label>
                        <label class="form-label">
                            Body
                            <textarea rows="5" class="form-control"></textarea>
                        </label>
                    </slot>
                </div>

                <div class="modal-footer">
                    <slot name="footer">
                        <button class="modal-default-button" @click="savePost()">
                            Save
                        </button>
                    </slot>
                </div>
            </div>
        </div>
    </transition>`,
    mixins: [], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Modal', 
          uuid: '', 
          show: false,
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created',this.$attrs); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.show = this.$attrs?.show;
    }, 
    methods: {
        savePost(){
            this.show = false;
        },
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 