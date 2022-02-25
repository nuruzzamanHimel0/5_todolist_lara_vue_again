

require('./bootstrap');

window.Vue = require('vue').default;

// mother Componet
import App from "./vue/app.vue"
// ####### Font Awsom Install ####
import { library } from '@fortawesome/fontawesome-svg-core'
import { faPlusSquare , faTrash } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(faPlusSquare , faTrash)
Vue.component('font-awesome-icon', FontAwesomeIcon)



// Vue.component('example-component', require('./components/ExampleComponent.vue').default);



const app = new Vue({
    el: '#app',
    components: { App }
});
