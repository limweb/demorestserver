export default {
  template: `<div><input type="number" 
      class="form-control"
      :class="'w-3/4'"
      :value="value"
      :placeholder="placeholder"
      :required="required"
      @input="updateValue($event.target.value)" 
      readonly
  /></div>`,
  mixins: [],
  props: {
    value: {
      type: Number ,
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
      this.$emit('input', Number(value))
    }
  },
  computed: {},
  components: {}
};