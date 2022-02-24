<template>
<div>
    <div class="container">
        <h2 class="text-center p-2 text-white bg-primary mt-5">Add Contact</h2>

        <div class="card-body">
            <div class="col-md-6 offset-md-3">
                <form id="validateForm" @submit.prevent="saveContact" enctype="multipart/form-data" novalidate>

                <div class="alert alert-danger" v-if="errors.length">
                    <ul class="mb-0">
                        <li v-for="(error, index) in errors" :key="index">
                            {{ error }}
                        </li>
                        
                    </ul>
                </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" v-model="contact.name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" v-model="contact.email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" id="designation" v-model="contact.designation" class="form-control" placeholder="Designation">
                    </div>
                    <div class="form-group">
                        <label for="bio">Bio</label>
                        <input type="text" id="bio" v-model="contact.bio" class="form-control" placeholder="Bio">
                    </div>
                    <div class="form-group">
                        <label for="contact_no">Contact no</label>
                        <input type="text" id="contact_no" v-model="contact.contact_no" class="form-control" placeholder="Name">
                    </div>

                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="validatedCustomFile" v-on:change="saveImage">
                        <label for="validateCustomFile">Choose file</label>
                    </div>

                    <button class="btn btn-primary mt-4">submit</button>
                </form>
            </div>
        </div>

    </div>
</div>
  
</template>

<script>
import Vue from 'vue';
export default {

    data() {
        return {
            url: document.head.querySelector('meta[name="url"]').content,
            contact: {},
            name:'',
            email: '',
            designation: '',
            contact_no: '',
            errors: []
        }
    },
    methods: {
        saveContact() {
            this.errors =[];
            if(!this.contact.name){
                this.errors.push('Name is required');

            }
            if(!this.contact.email){
                this.errors.push('Email is required');

            }
            if(!this.contact.designation){
                this.errors.push('Designation is required');

            }
            if(!this.contact.bio){
                this.errors.push('Bio is required');

            }
            if(!this.contact.contact_no){
                this.errors.push('Contact No. is required');

            }


            if(!this.errors.length) {
                let formData = new FormData();
                formData.append('name', this.contact.name);
                formData.append('email', this.contact.email);
                formData.append('designation', this.contact.designation);
                formData.append('contact_no', this.contact.contact_no);
                formData.append('image', this.image);
                formData.append('bio', this.contact.bio);
                let url = this.url + '/api/save_contact';
                this.axios.post(url, formData).then((response) => {
                    if(response.status){
                            document.getElementById("name").value = '';
                            document.getElementById("email").value = '';
                            document.getElementById("designation").value = '';
                            document.getElementById("contact_no").value = '';
                            document.getElementById("validatedCustomFile").value = '';
                            document.getElementById("bio").value = '';
                        this.$utils.showSuccess('success', response.message);
                    } else{
                        this.$utils.showError('Error', response.message);
                    }

                }).catch(error => {
                    this.errors.push(error.response.data.error);
                });
            }
            
        },
        saveImage(e) {
            this.image = e.target.files[0];
            console.log(this.image);
        }

    },
    mounted: function() {
        console.log('Add Contacts Component Loaded')
    }

}
</script>

<style>

</style>