//  <Editable v-model="message"  placeholder="Type aaasomething..."></Editable>

export default { 
  template: `<div class="w-full h-auto p-2 border border-black "
  				      contenteditable="true" 
  				      v-once 
              	v-html="value" 
              	:value="value" 
              	@input="updateValue">
            </div>`,
    mixins: [], 
    props:{
      value:{
        type: String,
        default:''
      }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Editable', 
      }; 
    }, 
    methods: {
        updateValue($event) {
            //console.log('----input---',$event,this.$el,document.activeElement);
            let value = $event.target.innerText;
            this.$emit('input', value) 
        }
    }, 
    watch: {
        value: function (newValue) {
            if (document.activeElement == this.$el) {
                return
            }
            this.$el.innerText = newValue;
        }
    },
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    computed: {}, 
    updated(){},
    mounted(){}, 
    components:{} 
}; 

// /* foreditable component */
// [placeholder]:empty::before {
//     content: attr(placeholder);
//     color: #555;
// }

// [placeholder]:empty:focus::before {
//     content: "";
// }