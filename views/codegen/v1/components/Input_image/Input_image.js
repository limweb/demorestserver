export default {
  inheritAttrs: false,
  template:`
    <div class="app-img">
      <div v-if="dataUrl" :style="{ background }" class="app-img__placeholder">
        <img :src="placeholder || dataUrl" alt v-bind="$attrs">
      </div>
      <img :src="dataUrl" :alt="$attrs.alt || ''" v-bind="$attrs" class="app-img__img">
    </div>  
  `,
  props: {
    value: {
      type: String,
      required: true
    },
    placeholder: String,
    background: String
  },

  computed: {
    dataUrl() {
      const { width, height } = this.$attrs;
      if (!width || !height) return "";

      // create a tiny png with matching aspect ratio as img
      const w = 100;
      const canvas = document.createElement("canvas");
      canvas.width = w;
      canvas.height = (height / width) * w;

      return canvas.toDataURL();
    }
  },

  mounted() {
    const { value, srcset, $el } = this;
    let timeOut;

    const observer = new IntersectionObserver(([entry]) => {
      const img = $el.querySelector(`.app-img__img`);
      const placeholder = $el.querySelector(`.app-img__placeholder`);

      img.onload = function() {
        delete img.onload;
        $el.classList.add(`app-img--loaded`);
        if (placeholder) {
          timeOut = setTimeout(() => {
            placeholder.remove();
          }, 300);
        }
      };
      if (entry.isIntersecting) {
        // Element is in viewport
        if (!!srcset) {
          img.srcset = srcset;
        }
        img.src = src;
        observer.disconnect();
      }
    });
    observer.observe($el);

    this.$once("hook:beforeDestroy", () => {
      observer.disconnect();
      if (timeOut) {
        clearTimeout(timeOut);
      }
    });
  }
};