<template>
  <label>
    <div>
      <input type="file" accept="image/*" class="form-control-file" @change="onImageChange" :name="name">
      <img v-show="uploadedImage" :src="uploadedImage">
    </div>
  </label>
</template>

<script>
export default {
    props: {
        name: {
            type: String,
            default: "",
        },
        src: {
            type: String,
            default: "",
        }
    },
    data: function () {
        return {
            uploadedImage: this.src,
        };
    },
    methods: {
        onImageChange(e) {
            const files = e.target.files;
            if (files.length > 0) {
                this.createImage(files[0]);
            } else {
                this.uploadedImage = this.src;
            }
        },
        createImage(file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                this.uploadedImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
    },
}
</script>
