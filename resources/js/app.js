import { createApp } from "vue";
import App from "./App.vue";
import router from "./routes.js";

const app = createApp(App);

app.use(router).mount("#app");
