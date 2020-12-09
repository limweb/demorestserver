export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full h-40 flex flex-col">
          <div class="w-full border border-black">
            <Label :label="value.ques.qtitle" />
          </div>
          <div class="w-full h-12 flex items-end">
            <component is="v2monthpicker" v-model="value.answer"></component>
          </div>
          {{value.answer}}
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Month', 
          uuid: '', 
          qtitle:'',
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
      this.qtitle = this.value.qtitle;
    }, 
    methods: { 
       updateValue(){ 
         this.value.qtitle = this.qtitle;
         this.$emit('input',this.value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 