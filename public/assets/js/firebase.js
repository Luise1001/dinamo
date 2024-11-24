import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-app.js';
import { getMessaging, getToken, onMessage } from 'https://www.gstatic.com/firebasejs/9.6.1/firebase-messaging.js';

const firebaseConfig = {
  apiKey: "AIzaSyCg0T3o59dHhlqoojsKbDqEVtzdN7bNSp4",
  authDomain: "dinamo-d33e5.firebaseapp.com",
  projectId: "dinamo-d33e5",
  storageBucket: "dinamo-d33e5.firebasestorage.app",
  messagingSenderId: "635295850742",
  appId: "1:635295850742:web:316ccbd30abffc288d0cd7",
  measurementId: "G-BZC7JJHB41"
};


const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

async function requestPermission() {
  try {
    const permission = await Notification.requestPermission();

    if (permission === "granted") {
       const token = await getToken(messaging, {
        vapidKey: "BNx8lO9CMusOVO7Pdgg4niupPXr60U3PCHasLudc-_4xus7sgE3lqnsM9Hb75mud5SfWUBhCoOXDHZ3lQfKJZmo"
      });

      Livewire.dispatch('saveToken', [token]);
    }

  } catch (error) {
    console.error(error);
  }
};

onMessage(messaging, (payload) => {
  const notificationTitle = payload.notification?.title || 'Default title';
  const notificationOptions = {
      body: payload.notification?.body || 'Default body.',
  };

  if (Notification.permission === 'granted') {
      new Notification(notificationTitle, notificationOptions);
  } else {
      console.warn('permission denied.');
  }
});


if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then((registration) => {
      return navigator.serviceWorker.ready;
    })
    .then((registration) => {
      requestPermission();
    })
    .catch((error) => {
      console.error('failed service worker registration', error);
    });
} else {
  console.warn('service workers are not supported.');
}
