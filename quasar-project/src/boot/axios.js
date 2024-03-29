import { boot } from "quasar/wrappers";
import axios from "axios";

const server = axios.create({ baseURL: "http://127.0.0.1/" });
server.defaults.withCredentials = true;

export default boot(({ app }) => {
  app.config.globalProperties.$axios = axios;
  app.config.globalProperties.$server = server;
});

export { server, axios };
