export default {
    template: `
        <div>
            <div class="flex">
                <vueavatar v-show="hideimg" :width="200" :height="200" :rotation="rotation" :borderRadius="borderRadius" :scale="scale" class="mr-3"
                    ref="vueavatar" @vue-avatar-editor:image-ready="onImageReady">
                </vueavatar>
                <div class="mt-3" v-show="hideimg">
                        <label>
                            Zoom : {{scale}}x
                            <br>
                            <input type="range" min=1 max=3 step=0.02 v-model='scale' />
                        </label>
                        <br>
                        <label>
                            Rotation : {{rotation}}°
                            <br>
                            <input type="range" min=0 max=360 step=1 v-model='rotation' />
                        </label>
                        <br>
                        <label>
                           {{hideimg}}
                        </label>
                        <br>
                        <button v-on:click="saveClicked">Get image</button>
                </div>
                <div v-show="!hideimg" class="relative w-40 h-40">
                    <img ref="image" v-show="!hideimg" class="w-40 h-40 rounded-full">
                    <div class="absolute w-8 h-8 bg-gray-200 rounded-full cursor-pointer right-3 bottom-3" @click="editimg">
                        <i class="mt-2 ml-2 fas fa-camera " ></i>
                    </div>
                </div>
            </div>
        </div>

    `,
    data: function data() {
        return {
            rotation: 0,
            scale: 1,
            borderRadius: 0,
            hideimg:true
        };
    },
    methods: {
        editimg(){
            this.hideimg = !this.hideimg;
        },
        saveClicked: function saveClicked() {
            var img = this.$refs.vueavatar.getImageScaled();
            this.$refs.image.src = img.toDataURL();
            this.$emit('input',img.toDataURL());
            this.hideimg = !this.hideimg;
        },
        onImageReady: function onImageReady() {
            this.scale = 1;
            this.rotation = 0;
        }
    }
};