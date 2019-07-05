<template>
  <li class="media border-top py-2 d-flex justify-content-between">
    <a :href="baseUrl + '/profiles/' + profile.id" class="d-inline-flex align-items-center card-link">
        <img
          :src="profile.profile_image"
          class="mr-3 rounded-circle"
          style="width:64px;height:64px"
          alt="..."
        />
        <div class="">
            <div class="font-weight-bold h4 mb-0 text-dark">{{ profile.name }}</div>
            <div class="text-muted">
                <span>@</span>
                {{ profile.username }}
            </div>
            <div v-if="showBio">{{ profile.bio }}</div>
        </div>
    </a>

    <follow-btn
        :user-id="(user) ? user.id : profile.id"
        :follow="follow"
        class="mt-2">
    </follow-btn>
  </li>
</template>

<script>
export default {
  props: {
    profile: Object,
    user: Object,
    showBio: {
      type: Boolean,
      default: true
    },
    follow: {
      type: Boolean,
      default: true
    }
  },

  data: function() {
    return {};
  },

  computed: {
      baseUrl () {
          return window.location.origin ;
      }
  }
};
</script>
