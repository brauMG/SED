import Vuetify from "vuetify";

require('./bootstrap');

window.Vue = require('vue');

Vue.use(Vuetify);

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

require('./Test');
require('./Area');
