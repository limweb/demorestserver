export default {
  template: `
    <select
        class="w-full h-10 border border-black"
        v-bind="$attrs" 
        :value="value"
        v-model="mysalectValue"
        @change="updateValue($event.target.value)" 
    >
        <option value="0" >---select year---</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
        <option value="2016">2016</option>
        <option value="2017">2017</option>
        <option value="2018">2018</option>
        <option value="2019">2019</option>
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
        <option value="2023">2023</option>
        <option value="2024">2024</option>
        <option value="2025">2025</option>
        <option value="2026">2026</option>
        <option value="2027">2027</option>
        <option value="2028">2028</option>
        <option value="2029">2029</option>
        <option value="2030">2030</option>
        <option value="2031">2031</option>
        <option value="2032">2032</option>
        <option value="2033">2033</option>
        <option value="2034">2034</option>
        <option value="2035">2035</option>
        <option value="2036">2036</option>
        <option value="2037">2037</option>
        <option value="2038">2038</option>
        <option value="2039">2039</option>
        <option value="2040">2040</option>
        <option value="2041">2041</option>
        <option value="2042">2042</option>
        <option value="2043">2043</option>
        <option value="2044">2044</option>
        <option value="2045">2045</option>
        <option value="2046">2046</option>
        <option value="2047">2047</option>
        <option value="2048">2048</option>
        <option value="2049">2049</option>
        <option value="2050">2050</option>
        <option value="2051">2051</option>
        <option value="2052">2052</option>
        <option value="2053">2053</option>
        <option value="2054">2054</option>
        <option value="2055">2055</option>
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
      mysalectValue:''
    };
  },
  created() {
    console.log(this.name + 'component is created');
  },
  mounted() {
    this.mysalectValue = this.value;
  },
  methods: {
    updateValue(value) {
      console.log('----input---');
      this.$emit('input', this.mysalectValue)
    }
  },
  computed: {},
  components: {}
};