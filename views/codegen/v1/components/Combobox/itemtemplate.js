 export default {  
   template: `  <div>
    <b>#{{item.id}}</b>
    <span>{{ item.name }}</span>
  </div>`, 
     mixins: [],  
     props: {
        item: { required: true },
     },
     data() {  
       return {  
           theme: 'AdminLte',  
           name: 'itemtemplate',  
       };  
     },  
     methods: { 
         updateValue($event) { 
                 let value = $event.target.innerHTML; 
             //console.log('----input---',$event,this.$el,document.activeElement); 
             this.$emit('input', value)  
         } 
     },  
     watch: { 
         value: function (newValue) { 
             if (document.activeElement == this.$el) { 
                 return 
             } 
             this.$el.innerHTML = newValue; 
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