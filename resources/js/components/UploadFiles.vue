<template>
    <div class="container">
        <label class="wcuf_disclaimer_label">
            <input type="checkbox" class="wcuf_disclaimer_checkbox" v-model="check">
            I understand I cannot proceed with my order without uploading the design file.
        </label>
        <div v-if="show_alert && !check" class="alert alert-danger" role="alert">
            You must accept the disclaimer
            <button v-on:click="m_show_alert" type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="large-12 medium-12 small-12 filezone">
            <input type="file" id="files" ref="files" multiple v-on:change="handleFiles()">
            <p>
                Drop your files here <br> or click to search
            </p>
        </div>
        <div class="row container_files">
            <div class="upload_selected_files col-lg-6">
                <div class="file-listing" v-for="(file, key) in files" v-if="!file.id">
                    <div>
                        <strong>FILE SELECTED:</strong>
                    </div>
                    <img v-bind:ref="'preview'+ parseInt(key) " class="preview"/>
                    <div class="container-name d-flex">
                        <div class="">{{ file.name }}</div>
                        <div class="remove-container ml-3">
                            <a v-on:click="removeFile(key)" class="remove">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uploaded_files col-lg-6">
                <div class="file-listing" v-for="(file, key) in files" v-if="file.id > 0">
                    <div class="success-container">
                        <strong>UPLOADED FILE</strong>
                    </div>
                    <img v-bind:ref="'preview'+ parseInt(key) " class="preview"/>
                    <a  v-if="show_remove" v-on:click="removeData(key)"><img class="remove_data" :src="image_src" alt="icon_remove"></a>
                    <div class="">{{ file.name }}</div>
                </div>
            </div>
        </div>
        <a v-on:click="SubmitFiles()" class="submit-button" v-show="files.length > 0">Submit</a>
    </div>
</template>

<script>
    export  default {
        props: ['post_url','env_url'],
        data(){
            return {
                files: [],
                message: '',
                image_src: '/images/icons/icon_remove.png',
                show_remove: false,
                check: false,
                show_alert: false,
            }
        },
        methods: {
            handleFiles() {
                let updloadFiles = this.$refs.files.files;

                for (var i = 0; i < updloadFiles.length; i++) {
                    this.files.push(updloadFiles[i]);
                }
                this.getImagePreviews();
            },
            getImagePreviews(){
                for (let i = 0; i < this.files.length; i++){
                    if (/\.(jpe?g|png|gif)$/i.test(this.files[i].name)) {
                        let reader = new FileReader();
                        reader.addEventListener('load', function () {
                            this.$refs['preview' + parseInt(i)][0].src = reader.result;
                        }.bind(this), false);
                        reader.readAsDataURL(this.files[i]);
                    }else{
                        this.$nextTick(function () {
                            this.$refs['preview' + parseInt(i)][0].src = '/img/image_default.png';
                        });
                    }
                }
            },
            removeFile(key) {
                this.files.splice(key, 1);
                this.getImagePreviews();
            },
            SubmitFiles() {
                if (this.check) {
                    this.show_alert = false;
                    for (let i = 0; i < this.files.length; i++) {
                        if (this.files[i].id) {
                            continue;
                        }
                        console.log(this.files);
                        let formData = new FormData();
                        formData.append('file', this.files[i]);
                        axios.post(
                            this.post_url,
                            formData,
                            {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                }
                            }
                        )
                            .then(function (data) {
                                this.files[i].id = data['data']['id'];
                                this.files.splice(i, 1, this.files[i]);
                                this.getImagePreviews();
                                console.log('success');
                            }.bind(this)).catch(function (data) {
                                console.log('error');
                        });
                    }
                    this.show_remove = true;
                } else {
                    this.show_alert = true
                }
            },
            removeData(key) {
                axios
                    .delete('/delete/'+ this.files[key].id)
                    .then(response => (console.log(response)));
                    this.files.splice(key, 1);
                    this.getImagePreviews();
            },
            m_show_alert() {
                this.show_alert = false;
            }
        },
    }

</script>

<style scoped>
    input[type="file"]{
        opacity: 0;
        width: 100%;
        height: 200px;
        position: absolute;
        cursor: pointer;
    }
    .filezone {
        outline: 2px dashed grey;
        outline-offset: -10px;
        background: #ccc;
        color: dimgray;
        padding: 10px 10px;
        min-height: 200px;
        position: relative;
        cursor: pointer;
    }
    .filezone:hover {
        background: #c0c0c0;
    }

    .filezone p {
        font-size: 1.2em;
        text-align: center;
        padding: 50px 50px 50px 50px;
    }
    img.preview{
        max-width: 90%;
        height: 100px;
    }

    div.file-listing{
        margin: auto;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }


    div.upload_selected_files {
        /*width: 100%;
        display: flex;
        flex-direction: column;*/
    }

    div.uploaded_files {

    }

    div.success-container{
        text-align: left;
        color: green;
    }

    div.remove-container{
        text-align: center;
    }

    div.remove-container a{
        color: red;
        cursor: pointer;
    }

    div.file-listing a{
        cursor: pointer;
        width: 20px;
        height: 20px;
    }

    img.remove_data{
        width: 20px;
        height: 20px;
    }

    a.submit-button{
        display: block;
        margin: auto;
        text-align: center;
        width: 200px;
        padding: 10px;
        text-transform: uppercase;
        background-color: #CCC;
        color: #ffffff;
        font-weight: bold;
        margin-top: 20px;
    }
    a.submit-button:hover{
        cursor: pointer;
        background-color: #4e555b;
    }
</style>
