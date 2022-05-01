<template>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card mt-5">
            <div class="card-header">FULL CRUD</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" placeholder="Enter username" id="username" v-model="post.username" />
                    </div>
                    <label>Xender: </label><br />
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="xender" id="male" value="male" v-model="post.xender"/>
                        <label class="form-check-label" for="male"> Male </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="xender" id="female" value="female" v-model="post.xender" />
                        <label class="form-check-label" for="female"> Female </label>
                    </div>
                    <label>Hobby: </label><br />
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Cricket" id="cricket" />
                        <label class="form-check-label" for="cricket"> Cricket </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="Careme" id="careme" />
                        <label class="form-check-label" for="careme"> Careme </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="football" />
                        <label class="form-check-label" for="football"> Football </label>
                    </div>
                    <div class="form-group">
                        <label for="profile">Profile</label>
                        <input type="file" class="form-control-file" v-model="post.profile"/>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" v-model="post.email" />
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" placeholder="Enter password" id="pwd" v-model="post.password"/>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
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
            post: {},
        }
    },
};
</script>
