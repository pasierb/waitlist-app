import * as Sentry from "@sentry/browser";
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
});
