export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full flex flex-col">
          <div class="w-full border border-black">
            <Label :label="value.ques.qtitle" />
          </div>
          <div class="w-full flex items-end">
            <component is="Textarea" v-model="value.answer"></component>
          </div>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Paragraph', 
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