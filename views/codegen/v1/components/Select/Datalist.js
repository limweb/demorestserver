//  <v-datalist 
//     values="[]" 
//     label="label" 
//     valkey="value" 
//     connector="-" 
//     default=""
//     placeholder=""
//     required="false"
//     v-mode=""
//     />
 
 export default { 
   template: `<div class="w-full h-10 border border-black"> 
                <input :list="uuid" 
                    class="w-full h-10 p-2" 
                    :value="value"
                    @input="updateValue($event.target.value)"
                    v-bind="$attrs"
                    >
                <datalist :id="uuid"  >
                    <option value="">--select รายการ--</option>
                    <option v-for="(item,idx) in values" :key="idx"
                    :value="item[valkey]">{{item[valkey]}}{{connector}}{{item[label]}}</option>
                </datalist>
         </div>`, 
   mixins: [], 
   props: { 
     value: { 
       type: [Number,String,Object],
       default: '', 
     }, 
     values:{
       type: Array,
       default:[]
     },
     label:{
         type: String,
         default:'label'
     },
     valkey:{
         type: String,
         default: 'value'
     },
     default:{
         type: [String,Number,Object],
         default: ''
     },
     placeholder: { 
       type: String, 
       default: '', 
     }, 
     connector:{
       type: String,
       default: ' '
     },
     required: { 
       type: Boolean, 
       default: false 
     } 
   }, 
   data() { 
     return { 
       theme: 'AdminLte', 
       name: 'DataList', 
       uuid:'idx',
       data:''
     }; 
   }, 
   methods: { 
     updateValue(value) { 
       console.log('----input---',value); 
       let arr = value.split(this.connector);
       this.$emit('input', arr[0]) 
     } 
   }, 
   computed: {
      //  xdata: {
      //      get:()=>{
      //          let item = this?.datas.find(item=>item[this.valkey] == this.value);
      //          if(item){
      //               return item[this.valkey] + this.connector + item[this.label];
      //          } else {
      //              return '';
      //          }
      //      },
      //      set:(val)=>{
      //          this.value = val;  
      //      }
      //  }
   }, 
   created() { 
     console.log(this.name + 'component is created',this); 
     this.uuid ='idx'+Math.random().toString(36).slice(-6);
   }, 
   mounted() {}, 
   components: {} 
 }; 
