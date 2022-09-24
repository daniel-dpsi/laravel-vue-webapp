import './bootstrap';

import { createApp } from 'vue'
import { Quasar } from 'quasar'

//import 'quasar-project/extras/fontawesome-v6/fontawesome-v6.css'

//import 'quasar-project/src/css/index.sass'

import app from './components/app.vue'

createApp(app).mount("#app")

app.use(Quasar, {
    plugins: {},
})


