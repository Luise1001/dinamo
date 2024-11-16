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

      Livewire.dispatch('save', [token]);
      console.log('FCM Token:', token);
    }

  } catch (error) {
    console.error(error);
  }
};

onMessage(messaging, (payload) => {
  console.log('Message received. ', payload);
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
      console.error('Error al registrar el Service Worker:', error);
    });
} else {
  console.warn('Service Workers no están soportados en este navegador.');
}
