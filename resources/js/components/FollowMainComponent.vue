<template>
    <div class="col-8 bg-white px-3 pt-3">
        <div>
            <div class="h4 font-weight-bold">{{ user.profile.name }}</div>
            <div><span>@</span>{{ user.profile.username }}</div>
        </div>
        <div class="mt-3">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs nav-fill" id="navId">
                <li class="nav-item">
                    <a href="#tab1" class="nav-link active">Following</a>
                </li>
                <li class="nav-item">
                    <a href="#tab2" class="nav-link">Followers</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                    <template v-if="!user.following.length">
                        <div class="h4 font-weight-bold mt-5 mb-2 text-center">You don’t have any following yet</div>
                        <div class="text-muted text-center">When you follow someone, you’ll see them here</div>
                    </template>
                    <ul class="list-unstyled">
                        <follow-list-item
                            v-for="(pro, index) in user.following"
                            v-bind:key="index"
                            :profile="pro"
                            :follow="true">
                        </follow-list-item>
                    </ul>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel">
                    <template v-if="!user.followers.length">
                        <div class="h4 font-weight-bold mt-5 mb-2 text-center">You don’t have any followers yet</div>
                        <div class="text-muted text-center">When someone follows you, you’ll see them here</div>
                    </template>
                    <ul class="list-unstyled">
                        <follow-list-item
                            v-for="(pro, index) in user.followers"
                            v-bind:key="index"
                            :profile="pro.profile"
                            :follow="false">
                        </follow-list-item>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [ 'user' ],

        mounted () {
            console.log(this.user);
            $('#navId a').click(e => {
                e.preventDefault();
                $(e.target).tab('show');
            });
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
