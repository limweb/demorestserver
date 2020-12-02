 import autocomplete from "../../util/autocompleter.js"

  //---------- วิธีใช้ ----------------
  // <v-typeahead
  //     placeholder="เลือกรายการสินค้า" 
  //     v-model="test"
  //     :datas="customers"  // datas สำหรับให้เลือก
  //     valkye="id"  // key ที่จะแปลงเป็น id 
  //     :lblfunc="this.myname"  // key ที่จะแปลงเป็น label  ซึ่งใช้  text หรือ function ก็ได้
  //     >



 export default { 
   inheritAttrs: false, 
   template: `<div> 
        <input
              class="w-full h-10 p-2 border border-black"
              v-bind="$attrs"  
              ref="inputRef"
              :placeholder="placeholder" 
              :value="selectvalue"
              type="text" 
        />
   </div>`, 
   mixins: [], 
   props: { 
     value: { 
       type: [String,Number,Object], 
       default: '', 
     }, 
     placeholder: { 
       type: String, 
       default: '', 
     }, 
     datas:{
       type: Array, 
       default: []
     },
     valkey:{
       type: String,
       default: 'value'
     },
     lblfunc:{
       type: [String,Function],
       default: 'label'
     },
     required: { 
       type: Boolean, 
       default: false 
     } 
   }, 
   data() { 
     return { 
       theme: 'AdminLte', 
       name: 'TypeAhead',
       selectvalue: '',
       selectlabel: '' 
     }; 
   }, 
   methods: { 
      updateValue(value) { 
        console.log('----input typeahead---',value); 
        this.$emit('input', value);
      } 
   }, 
   computed: {
      lists(){
          console.log('datas--->',this.datas);
          if(this.datas){
            return this.datas.map(item => {
                let label = '';
                if(typeof(this.lblfunc) == 'string'){
                  label = item[this.lblfunc];
                } else if(typeof(this.lblfunc) == 'function') {
                  label = this.lblfunc(item);
                }
                return {
                    id: item[this.valkey],
                    label: label
                    // label: item[this.label]
                }
            });
          } return [];
      }
   }, 
   created() { 
       console.log('typeahead is create--->');
       this.selectvalue = this.value;
   }, 
   mounted() {
      console.log('datas--->',this.datas);
      this.autocompleteRef = autocomplete({
          input: this.$refs.inputRef,
          minLength: 1,
          emptyMsg: 'No matched items found',
      
          fetch: (text, update)=>{
              console.log('-----start---autocomplete---',this.lists);
              const pattern = new RegExp(text, 'i')
              const suggestions = this.lists.filter(({ label }) => {
                    return pattern.test(label)
                })
              update(suggestions)
          },
      
          onSelect: ({ id, label }) => {
              this.selectid = id
              this.selectvalue = label
              this.updateValue(id)
          }
      })
   },
   beforeDestroy() {
      this.autocompleteRef.destroy()
   },
   components: {} 
 }; 