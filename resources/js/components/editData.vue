<template>
  <div class="row justify-content-center mt-5">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="text-warning">Update data</h3>
        </div>
        <div class="card-body">
          <form @submit.prevent="submitForm">
            <div class="form-group">
              <label for="title">Post Title</label>
              <input
                type="text"
                name="title"
                class="form-control"
                id="title"
                placeholder="Enter Post Title"
                v-model="formFields.title"
              />
            </div>
            <br />
            <label for="">Hobby</label><br />
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                id="cricket"
                value="cricket"
                v-model="arrs.hobby"  
              />
              <label class="form-check-label"  for="cricket"> Cricket </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="carome"
                id="carome"
                v-model="arrs.hobby"
               
              />
              <label class="form-check-label" for="carome"> Carome </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="football"
                id="football"
                v-model="arrs.hobby"
                
              />
              <label class="form-check-label" for="football"> FootBall </label>
            </div>
    
              
            <label for="">Gender</label><br />
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="male"
                value="Male"
                v-model="formFields.gender"
              />
              <label class="form-check-label" for="male"> Male </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="radio"
                name="gender"
                id="female"
                value="female"
                v-model="formFields.gender"
              />
              <label class="form-check-label" for="female"> Female </label>
            </div>
            <div class="form-group">
              <label for="description">Post Description</label>
              <textarea
                name="description"
                class="form-control"
                v-model="formFields.description"
              ></textarea>
            </div>
            <br />
            <div class="form-group">
              <label for="description">Picture</label>
              <input
                type="file"
                name="picture"
                class="form-control-file"
                id="picture"
                @change="onFileChange"
              />
              <img
                :src="'storage/image/' + formFields.picture"
                style="width: 50px"
              />
            </div>
            <br />
            <input type="hidden" name="id" v-model="formFields.id" />
            <div class="form-group">
              <input type="submit" value="Update" class="btn btn-success" />
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
        formFields: {},
        arrs:{hobby:[]},
    };
  },
  created() {
    this.axios
      .get(`http://127.0.0.1:8000/api/edit/${this.$route.params.id}`)
      .then((response) => {
        this.formFields = response.data.formFields;
        //this.arrs = response.data.arr.includes('cricket');
         if($.inArray("cricket", response.data.arr)!== -1 ) {
            $('#cricket').prop('checked', true);
        } else {
            $('#cricket').prop('checked', false);
        }
        if($.inArray("carome", response.data.arr)!== -1 ) {
            $('#carome').prop('checked', true);
        } else {
            $('#carome').prop('checked', false);
        }
        if($.inArray("football", response.data.arr)!== -1 ) {
            $('#football').prop('checked', true);
        } else {
            $('#football').prop('checked', false);
        }
      });
  },
  methods: {
    onFileChange(event) {
      this.formFields.picture = event.target.files[0];
    },
    submitForm() {
      let formData = new FormData();
      formData.append("picture", this.formFields.picture);
      formData.append("title", this.formFields.title);
      formData.append("description", this.formFields.description);
      formData.append("id", this.formFields.id);
      formData.append("hobby[]", this.arrs.hobby);
      formData.append("gender", this.formFields.gender);
       // console.log(formData.append("id", this.formFields.id));
      this.axios
        .post("http://127.0.0.1:8000/api/update", formData)
        .then((response) => {
          this.$router.push({
            name: "home",
          });
        });
    },
  },
};
</script>
