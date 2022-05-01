<template>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="text-warning"> CRUD</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="submitForm">
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Enter Post Title" v-model="formFields.title">
                    </div><br>
                    <label for="">Hobby</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="cricket" id="cricket" v-model="formFields.hobby">
                        <label class="form-check-label" for="cricket">
                            Cricket
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="carome" id="carome" v-model="formFields.hobby">
                        <label class="form-check-label" for="carome">
                            Carome
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="football" id="football" v-model="formFields.hobby">
                        <label class="form-check-label" for="football">
                            FootBall
                        </label>
                    </div>
                    <br>
                
                    <label for="">Gender</label><br>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" v-model="formFields.gender" >
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female" v-model="formFields.gender">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>

                    <div class="form-group">
                        <label for="description">Post Description</label>
                        <textarea name="description" class="form-control" v-model="formFields.description"></textarea>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">Picture</label>
                        <input type="file" name="picture" class="form-control-file" id="picture" @change="onFileChange">
                        <img v-bind:src="formFields.filepath" width="100" height="100" />
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" />
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {

    data() {
        return {
            formFields: {
                title: null,
                description: null,
                picture: null,
                filepath: '',
                hobby:[],
                gender:null,

            }
        }
    },
    methods: {

        onFileChange(event) {
            this.formFields.picture = event.target.files[0];
            this.formFields.filepath = URL.createObjectURL(this.formFields.picture);
        },
        submitForm() {
            let formData = new FormData();
            formData.append("picture", this.formFields.picture);
            formData.append("title", this.formFields.title);
            formData.append("description", this.formFields.description);
            formData.append("hobby[]", this.formFields.hobby);
            formData.append("gender", this.formFields.gender);

            axios.post('http://127.0.0.1:8000/api/upload', formData)
                .then((response) => {
                    this.$router.push({
                        name: 'home'
                    });
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    }
}
</script>
