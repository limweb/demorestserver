export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="flex flex-wrap bg-white border border-black" >
         <span class="bg-blue-200 rounded px-2 py-1 mr-1 mb-1 outline-none inline-flex items-center select-none flex-wrap cursor-pointer" v-for="tag in tags">
          <span  @click="gotourl(tag)">#{{ tag }}</span>
          <button   type="button" class="text-blue-600 outline-none focus:outline-none -mt-2" :disabled="!editable"  @click="removeTag(tag)">&times;</button>
        </span>
        <input v-if="editable" type="text" class="p-2 outline-none" style="min-width: 10rem;" placeholder="Add tag..." v-model="newTag" @keydown="addTag" >
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'tagsedit', 
          uuid: '', 
          newTag: '',
          baseroute:'/api/tags/',
          editable: false,
          tags:[],
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.tags = this.value;
    }, 
    methods: { 
        gotourl(tag){
            console.log('togourl--->',tag);
            this.$router.push(this.baseroute+tag);
        },
        addTag(e) {
            if(e.keyCode === 13) {
                e.preventDefault()
                console.log('e--->',e);
                if ( this.newTag.trim().length === 0 || this.tags.includes(this.newTag.trim())) {
                    return
                }
                if( this.newTag.charAt(0) == '#'){
                    this.newTag = this.newTag.substring(1);
                }
                this.tags.push(this.newTag.trim());
                this.$emit('input', this.tags)
                this.newTag = ''
            }
        },
        removeTag(tag) {
            this.tags = this.tags.filter(t => t !== tag)
            this.$emit('input', this.tags)
        }      
    }, 

    computed: {}, 
    mounted() {},   
    components:{} 
}; 