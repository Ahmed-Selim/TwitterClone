<template>
    <button class="btn btn-outline-primary font-weight-bolder rounded-pill"
        style="font-size: larger;height: 42px" v-text="btnText" @click="toggleFollow">
    </button>
</template>

<script>
    export default {
        props: [ 'userId', 'follow' ],

        data: function () {
            return {
                status: this.follow,
            }
        },

        computed: {
            btnText() {
                return (this.status) ? 'following' : '+ Follow' ;
            }
        },

        methods: {

            toggleFollow () {
                axios.post('/follow/' + this.userId, )
                    .then((response) => {
                        this.status = !this.status ;
                        // alert("Following " + this.userId  + " is " + this.status) ;
                        // console.log(response.data);
                    })
                    .catch(error => {
                        // console.log(error) ;
                    });
            }
        }
    }
</script>
