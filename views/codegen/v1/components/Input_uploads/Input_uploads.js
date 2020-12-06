export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full rounded border-1">
      <div @click="upload" class="text-center">UPLOAD FILE<small>(S)</small></div>
      <div class="w-full">
        <ul>
          <li v-for="(n,idx) in fnames">{{n}}</li>
      </ul>   
      </div>
      <input 
        ref="inpupload"
        class="hidden"
        type="file"
        class="hidden "  
        :value="value" 
        @input="updateValue($event)"  
        v-bind="$attrs" 
        name="filefield" 
        multiple="multiple"
      />
    </div>    
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Input_uploads', 
          uuid: '', 
          fnames:[],
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.uuid ='idx'+Math.random().toString(36).slice(-6);  
    }, 
    methods: { 
       upload(){
         this.$refs.inpupload.click();
       },
       updateValue(evt){ 
          console.log('value--->',evt);
          let fups = evt.target.files;
          let flength = fups.length;
          this.fnames = [];
          for(let i=0;i<flength;i++) {
            this.fnames.push(fups[i].name);
          }
          // this.$emit('input',fups) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 