<template>
</template>

<script>
export default {

    data() {
        return {
            formFields: {}
        }
    },
    created() {
        this.axios
            .get(`http://127.0.0.1:8000/api/delete/${this.$route.params.id}`)
            .then((response) => {
                    this.$router.push({
                        name: 'home'
                    });
                })
    },

}
</script>
