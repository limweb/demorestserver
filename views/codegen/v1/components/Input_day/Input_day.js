export default {
  template: `
    <select
        class="form-control"
        :class="'w-2/4'"
        :value="value"
        :placeholder="placeholder"
        :required="required"
        @change="updateValue($event.target.value)" 
    >
        <option value="" >---select day---</option>
        <option value="Monday" >Monday</option>
        <option value="Tuesday" >Tuesday</option>
        <option value="Wednesday" >Wednesday</option>
        <option value="Thursday" >Thursday</option>
        <option value="Friday" >Friday</option>
        <option value="Saturday" >Saturday</option>
        <option value="Sunday" >Sunday</option>
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