export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="w-full flex flex-col">
          <div class="w-full border border-black">
            <input type="text" class="w-full p-2 h-12"  v-model="qtitle" placeholder="short answer" @input="updateValue">
          </div>
          <div class="flex w-full">

            <div class="flex flex-col w-1/2">

              <div class="w-full h-8 text-center font-bold">Rows</div>
              <div class="w-full h-12 flex items-center" v-for="(row,idx) in value.choices.rows" :key="idx" >
                  <span class="whitespace-nowrap">{{idx+1}}. &nbsp;&nbsp;</span>
                  <input type="text" class="p-2 w-full" v-model="row.label" placeholder="type your row" >
                  <span @click="rmchoice(row)"> &nbsp;&nbsp;X&nbsp;&nbsp; </span>
              </div>
              <div class="w-full h-12 mt-2">
                  <span @click="addchoice" class="cursor-pointer">Add row...</span>
              </div>
            </div>

            <div class="flex flex-col w-1/2">
              <div class="w-full h-8 text-center font-bold">Columns</div>
              <div class="w-full h-12 flex items-center" v-for="(col,idy) in value.choices.cols" :key="idy" >
                  <input type="checkbox" class='w-12' disabled><input type="text" class="p-2 w-full" v-model="col.label" placeholder="type your column" >
                  <span @click="rmchoice(col)"> &nbsp;&nbsp;X&nbsp;&nbsp; </span>
              </div>
              <div class="w-full h-12 mt-2">
                  <span @click="addcol" class="cursor-pointer">Add column ...</span>
              </div>
            </div>
          </div>
    </div>
    `,
    mixins: [], 
    props:["value"], 
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Checkbox Grid', 
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
       rmchoice(choice){
         console.log('choice--->',choice);
       },
       addchoice(){
         this.value.choices.rows.push({ label:'' })
       },
       addcol(){
         this.value.choices.cols.push({ label:'' })
       },
       updateValue(){ 
         this.value.qtitle = this.qtitle;
         this.$emit('input',this.value) 
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 