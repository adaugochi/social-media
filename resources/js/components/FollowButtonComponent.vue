<template>
    <div>
        <button class="btn btn-sm btn-primary font-weight-bold" @click="followUser" v-text="buttonText"></button>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },

        props: ['userId', 'follows'],

        data: function () {
            return {
                status: this.follows,
            }
        },

        methods: {
            followUser() {
                axios.post('/follow/' + this.userId)
                    .then(this.status = !this.status)
                    .catch( errors => {
                        if(errors.response.status == 401) {
                            window.location = '/login'
                        }
                    })
            }
        },

        computed: {
            buttonText() {
                return (this.status) ? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
