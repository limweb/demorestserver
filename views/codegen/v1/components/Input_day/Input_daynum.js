export default {
  template: `
    <select
        class="w-full h-10 border border-black "
        :value="value"
        @change="updateValue($event.target.value)" 
        v-bind="$attrs" 
     >
        <option value="0" >---select day---</option>
        <option value="1" >Monday</option>
        <option value="2" >Tuesday</option>
        <option value="3" >Wednesday</option>
        <option value="4" >Thursday</option>
        <option value="5" >Friday</option>
        <option value="6" >Saturday</option>
        <option value="7" >Sunday</option>
    </select>
  `,
  mixins: [],
  props: {
    value: {
      type: [String,Number],
      default: 0,
    },
    placeholder: {
      type: String,
      default: '',
    },
    required: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      theme: 'AdminLte',
      name: 'Inputnumber',
    };
  },
  created() {
    console.log(this.name + 'component is created');
  },
  mounted() {},
  methods: {
    updateValue(value) {
      console.log('----input---');
      this.$emit('input', value)
    }
  },
  computed: {},
  components: {}
};