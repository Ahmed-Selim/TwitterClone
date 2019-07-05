<template>
  <form class="form-inline col-9 justify-content-center">
        <div class="input-group col-10 border rounded-pill">
            <div class="input-group-prepend">
                <span
                    class="bg-white border-0 pr-2 input-group-text"
                    id="searchLabel">@</span>
            </div>
            <input type="text"
                class="form-control border-0 pl-0 shadow-none"
                placeholder="Search TwitterClone"
                aria-describedby="searchLabel"
                v-model="val"
                @keypress.enter.prevent="search">
        </div>
    </form>
</template>

<script>
export default {
  props: {

  },

  data: function() {
    return {
        val: ''
    };
  },

  computed: {
      baseUrl () {
          return window.location.origin ;
      }
  },

  methods: {
      search () {
        //   console.log(this.val) ;
        window.location.href = this.baseUrl + '/profiles/search/' + this.val ;
      }
  }
};
</script>
