/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import moment from 'moment' ;

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('profile-search-form', require('./components/ProfileSearchFormComponent.vue').default);
Vue.component('new-tweet-btn', require('./components/NewTweetBtnComponent.vue').default);
Vue.component('follow-btn', require('./components/FollowBtnComponent.vue').default);
Vue.component('follow-list-item', require('./components/FollowListItemComponent.vue').default);
Vue.component('tag-list-item', require('./components/TagListItemComponent.vue').default);
Vue.component('tweet', require('./components/TweetComponent.vue').default);
Vue.component('profile-main', require('./components/ProfileMainComponent.vue').default);
Vue.component('profile-sidebar', require('./components/ProfileSideBarComponent.vue').default);
Vue.component('follow-main', require('./components/FollowMainComponent.vue').default);

Vue.filter('formatDate', function (val) {
    if (val)
        return moment(String(val)).fromNow() ;
})
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
