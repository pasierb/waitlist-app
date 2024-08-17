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

if (import.meta.env.VITE_APP_ENV === 'production') {
    Sentry.init({
        dsn: import.meta.env.VITE_SENTRY_DSN_PUBLIC,
        environment: import.meta.env.VITE_APP_ENV,
        integrations: [
            window.sentryFeedback
        ],
    });
}

