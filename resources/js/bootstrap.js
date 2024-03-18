/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

// for uploading Trix post body images
(function () {
    let upload_url = "/upload-post-image"
    let csrfToken = document.querySelector('input[name="_token"]').value

    function uploadFileAttachment(attachment) {
        uploadFile(attachment.file, setProgress, setAttributes)

        function setProgress(progress) {
            attachment.setUploadProgress(progress)
        }

        function setAttributes(attributes) {
            attachment.setAttributes(attributes)
        }
    }

    function uploadFile(file, progressCallback, successCallback) {
        let formData = new FormData();
        formData.append("file", file)
        formData.append("_token", csrfToken) // Include the CSRF token

        let xhr = new XMLHttpRequest()
        xhr.open("POST", upload_url, true)

        xhr.upload.addEventListener("progress", function (event) {
            let progress = (event.loaded / event.total) * 100
            progressCallback(progress)
        });

        xhr.onload = function () {
            if (xhr.status === 200) {
                let response = JSON.parse(xhr.responseText)
                successCallback(response)
            }
        }

        xhr.send(formData)
    }

    addEventListener("trix-attachment-add", function (event) {
        if (event.attachment.file) {
            uploadFileAttachment(event.attachment)
        }
    })
})()