<template>
    <li class="media border-top bg-white py-2 px-3 d-flex justify-content-between">
    <a :href="baseUrl + '/tweet-tags/' + item.id" class="d-inline-flex align-items-center card-link">
        <div class="">
            <div class="font-weight-bold h4 mb-0 text-dark">#{{ item.tag }}</div>
            <div class="text-muted">
                {{ item.tweets.length }} Tweets
            </div>
        </div>
    </a>
  </li>
</template>

<script>
    export default {
        props: [ 'item' ],
        mounted() {
            // console.log(this.item) ;
        },
        computed: {
            baseUrl() {
                return window.location.origin ;
            }
        }
    }
</script>
