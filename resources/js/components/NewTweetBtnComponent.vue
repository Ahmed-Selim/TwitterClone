<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" id="floating"
                class="btn btn-outline-primary shadow rounded-pill font-weight-bold"
                data-toggle="modal" data-target="#exampleModal">
        + Tweet
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Tweet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="">
                        <textarea v-model="body" class="form-control" name="tweetBody" rows="5" placeholder="What's happening?"></textarea>
                    </div>
                    <div class="align-items-baseline d-flex flex-row flex-wrap">
                        <input placeholder="Enter tag ,then hit 'space'"
                            class="form-control my-2 rounded-pill"
                            v-model="tagField"
                            @keyup.space="addTag()"/>

                        <span class="badge badge-pill badge-primary mb-1 mx-1" style="font-size: initial;" v-for="(tag, index) in tags" v-bind:key="index">
                            #{{ tag }}
                            <span class="font-weight-light ml-2" style="cursor: pointer" @click="removeTag(index)">x</span>
                        </span>
                    </div>
                    <!-- <div class="d-flex flex-row-reverse justify-content-between mt-2">
                        <label class="">
                            <input @change="onMediaAdded($event)" type="file" class="custom-file-input d-none">
                            <span class="custom-file-control btn btn-outline-secondary rounded-pill float-right" style="cursor:pointer">+ Upload</span>
                        </label>
                        <label :hidden="!media" class="flex-grow-1 mt-2 text-truncate">Media added: {{ mediaTitle }}</label>
                    </div> -->

                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                <button @click="storeTweet()" type="button" class="btn btn-primary btn-block" :disabled="(body == '')">Tweet</button>
            </div>
            </div>
        </div>
        </div>
    </div>

</template>

<script>
    export default {
        props: [ ],

        data: function () {
            return {
                body: '',
                // media: null,
                tagField: '',
                tags: []
            }
        },

        computed: {
            // mediaTitle: function () {
            //     return (this.media) ? this.media.name : '' ;
            // }
        },

        methods: {

            reloadPage() {
                window.location.reload() ;
            },

            addTag () {
                if (this.tagField == '') return ;
                this.tags.push(this.tagField.slice(0, -1)) ;
                this.tagField = '' ;
            },

            removeTag (index) {
                this.tags.splice(index, 1) ;
            },

            // onMediaAdded (e) {
            //     var files = e.target.files || e.dataTransfer.files;
            //     if (!files.length)
            //         return;
            //     this.media = files[0] ;
            // },

            storeTweet () {
                // console.log(this.body);
                // console.log(this.media);
                // console.log(this.tags);

                var tweetFormData = new FormData();
                tweetFormData.set('body', this.body) ;
                // tweetFormData.append('media_url', this.media) ;
                this.tags.forEach(tag => {
                    tweetFormData.append('tags[]', tag) ;
                });

                // var request = {
                //     'body' : this.body ,
                //     'media_url' : this.media ,
                //     'tags' : this.tags
                // };

                // axios.post('/tweets', request, {headers: {'Content-Type': 'multipart/form-data' }})
                axios({
                    method: 'post',
                    url: '/tweets',
                    data: tweetFormData,
                    config: { headers: {'Content-Type': 'multipart/form-data' }}
                })
                .then((response) => {
                    // alert(response.data) ;
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error) ;
                });

                this.body = '' ;
                // this.media = null ;
                this.tagField = '' ;
                this.tags = [] ;

                $('#exampleModal').modal('hide') ;
            }
        }
    }
</script>
