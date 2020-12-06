export default { 
    inheritAttrs: false, 
    template: ` 
    <div class="flex items-center justify-center">
      <label  :for="$attrs.id" class="flex items-center cursor-pointer"   >
        <div class="relative">
          <input v-bind="$attrs" type="checkbox" class="hidden" @change="updateValue" />
          <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner toggle__line" ></div>
          <div class="absolute left-0 w-6 h-6 rounded-full shadow bg-gray-300 inset-y--4 toggle__dot" ></div>
        </div>
        <div  class="ml-3 font-medium text-gray-700" >
          {{label}}
        </div>
      </label>
    </div>
    `,
    mixins: [], 
    props:{
      value: {
        type: Boolean,
        default: false
      },
      label:{
        type: String,
        default: ''
      }
    },
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Toggle', 
          state: false,
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
    }, 
    methods: { 
      emit() {
         this.$emit('input', this.state)
      },
      toggle(state) {
          this.state = state
      },
      updateValue(){ 
          this.toggle(!this.state)
          this.emit()
       }         
    }, 
    computed: {}, 
    mounted() {}, 
    components:{} 
}; 