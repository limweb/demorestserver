import vueDropzone from "./vue2-dropzone.js";


export default {
  template:`
        <vue-dropzone 
        class="w-full flex flex-wrap item-center justify-center"
        ref="dropzone" 
        id="drop1" 
        v-bind="$attrs"
        :options="options"
        @vdropzone-complete="afterComplete"
        ></vue-dropzone>
        <button @click="removeAllFiles">Remove All Files</button>
  `,
  props:['value','options'],
  data: () => ({ }),
  components: {
    vueDropzone
  },
  methods: {
    afterComplete(file) {
      console.log(file);
    },
    removeAllFiles() {
      this.$refs.dropzone.removeAllFiles();
    }
  }
};
