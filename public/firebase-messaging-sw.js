importScripts('https://www.gstatic.com/firebasejs/9.22.2/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.22.2/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: "AIzaSyCg0T3o59dHhlqoojsKbDqEVtzdN7bNSp4",
    authDomain: "dinamo-d33e5.firebaseapp.com",
    projectId: "dinamo-d33e5",
    storageBucket: "dinamo-d33e5.firebasestorage.app",
    messagingSenderId: "635295850742",
    appId: "1:635295850742:web:316ccbd30abffc288d0cd7",
    measurementId: "G-BZC7JJHB41"
});


const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  const notificationTitle = payload.notification.title || 'default title';
  const notificationOptions = {
    body: payload.notification.body || 'default body.',
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});

messaging.onMessage(function(payload) {
  const notificationTitle = payload.notification.title || 'default title';
  const notificationOptions = {
    body: payload.notification.body || 'default body.',
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});


self.addEventListener('install', (event) => {
  self.skipWaiting(); 
});

self.addEventListener('activate', (event) => {
  return self.clients.claim();
});
