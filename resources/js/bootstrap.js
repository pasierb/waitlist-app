import * as Sentry from "@sentry/browser";
import axios from 'axios';

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.sentryFeedback =
    Sentry.feedbackIntegration({
        // Additional SDK configuration goes in here, for example:
        colorScheme: "system",
        autoInject: false,
    });

Sentry.init({
    dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
    integrations: [
        window.sentryFeedback
    ],
});

