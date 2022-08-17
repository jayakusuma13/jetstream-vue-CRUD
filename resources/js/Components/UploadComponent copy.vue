<template>

  <el-upload drag :auto-upload="false" :on-change="handleChange" multiple>
      <i class="el-icon-upload"></i>
      <div class="el-upload__text">Drop file here or <em>click to upload</em></div>
      <div class="el-upload__tip">Document files with a size less than or equal to 2mb</div>
  </el-upload>

  <el-button type="primary" :disabled="form.processing" @click="submit">Upload Contract</el-button>

</template>

<script>
import axios from 'axios'
import { Head, Link, useForm } from "@inertiajs/inertia-vue3"  
import {ElDialog,ElButton,ElUpload} from "element-plus"

export default {
  data() {
      return {
          form: this.$inertia.form({
              forceFormData: true,
              _method: "POST",
              newfile: [],
          }),
      };
  },
  methods: {
    handleChange(uploadFile, uploadFiles) {
        this.form.newfile = uploadFiles;
    },
    submit() {
      this.form.post('/api/image/store')
    }
  },
}
</script>