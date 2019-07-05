<template>
    <div class="col d-md-block d-sm-none">
        <section>
        <ul class="list-group">
            <li class="list-group-item"><span class="h2 font-weight-bold">You might like</span></li>
            <!-- <div v-for="(profile, index) in latestProfiles" :key="index">
                <li class="list-group-item">{{ profile.username }}</li>
            </div> -->
            <follow-list-item
                v-for="(profile, index) in latestProfiles"
                :key="index"
                :profile="profile"
                :show-bio="false"
                :follow="false"
                class="bg-white px-2">
            </follow-list-item>
        </ul>
        </section>
        <section class="my-3">
        <ul class="list-group">
            <li class="list-group-item"><span class="h2 font-weight-bold">Trends for you</span></li>
            <!-- <div v-for="(tag, index) in latestTags" :key="index">
                <li class="list-group-item">{{ tag.tag }}</li>
            </div> -->
            <tag-list-item
                v-for="(tag, index) in latestTags"
                :key="index"
                :item="tag">
            </tag-list-item>
        </ul>
        </section>
        <!-- <section>
        <ul class="list-group">
            <li class="list-group-item"><span class="h2 font-weight-bold">You might like</span></li>
            <li class="list-group-item">Dapibus ac facilisis in</li>
            <li class="list-group-item">Morbi leo risus</li>
            <li class="list-group-item">Porta ac consectetur ac</li>
            <li class="list-group-item">Vestibulum at eros</li>
        </ul>
        </section> -->
    </div>
</template>

<script>
    export default {
        props: [ 'latestProfiles', 'latestTags'],

        mounted () {
            // console.log(this.latestProfiles);
        },

        data: function () {
            return {

            }
        },

        computed: {

        },

        methods: {

        }
    }
</script>
