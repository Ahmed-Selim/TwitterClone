<template>
    <div class="mx-0 row px-2 py-4 border-top">
        <div class="col-1 mr-2 px-0">
            <img :src="profile.profile_image" alt="profile image" style="width:49px;height:49px" class="rounded-circle">
        </div>
        <div class="col">
            <div class="row">
                <div class="h5 mr-2 font-weight-bold">{{ profile.name }}</div>
                <div class="text-muted">
                    <span>@</span>{{ profile.username }} . {{ tweet.updated_at | formatDate }}
                </div>
            </div>
            <div class="row">{{ tweet.body }}</div>
            <div class="row">
                <a
                    :href="baseUrl + '/tweet-tags/' + tag.id"
                    v-for="(tag, index) in tweet.tags"
                    :key="index"
                    class="card-link">
                    <!-- <span v-if="index != 0">,&nbsp;</span> -->
                    <span>#</span>{{ tag.tag }}
                </a>
            </div>
            <nav class="nav nav-pills nav-fill mt-2">
                <button class="nav-item btn border-info text-left">
                    Replies <span>{{ tweet.replies }}</span>
                </button>
                <button class="nav-item btn border-info text-left">
                    Retweets <span>{{ tweet.retweets }}</span>
                </button>
                <button class="nav-item btn border-info text-left">
                    Likes <span>{{ tweet.likes }}</span>
                </button>
            </nav>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'tweet', 'profile'],

        data: function () {
            return {

            }
        },

        mounted: function () {
            // console.log(this.user);
        },

        computed: {
            // tweetTimeStamp: function() {
            //     return this.tweet.updated_at ;
            // }
            baseUrl() {
                return window.location.origin ;
            }
        },

        methods: {

        }
    }
</script>
