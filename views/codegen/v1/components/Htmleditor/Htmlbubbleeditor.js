export default { 
    template: `
    <div class="w-full border border-black">
          <quill-editor
            ref="quillEditor"
            class="w-full h-40"
            v-model="content"
            v-bind="$attrs"
            :options="editorOption"
            @blur="onEditorBlur($event)"
            @focus="onEditorFocus($event)"
            @ready="onEditorReady($event)"
            @change="onEditorChange($event)"
          />
    </div>
    `, 
    mixins: [], 
    props:['value'],
    data() { 
      return { 
          theme: 'AdminLte', 
          name: 'Html Editor', 
          message: 'Hi from Vue.',
          content: '',
          editorOption: {
            theme: 'bubble'
          },
      }; 
    }, 
    created() { 
      console.log( this.name + 'component is created'); 
      this.content = this.value;
    }, 
    methods: {
      onEditorBlur(quill) {
        console.log('editor blur!', quill)
      },
      onEditorFocus(quill) {
        console.log('editor focus!', quill)
      },
      onEditorReady(quill) {
        console.log('editor ready!', quill)
      },
      onEditorChange({ quill, html, text }) {
        console.log('editor change!', quill, html, text)
        this.content = html
        this.$emit('input',this.content);
      }
    },
    computed: {
      editor() {
        return this.$refs.quillEditor.quill
      }
    },
    mounted() {
      console.log('this is quill instance object', this.editor)
    }, 
    components:{} 
}; 