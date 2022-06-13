importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.14.6/firebase-messaging.js');

var firebaseConfig = {
    databaseURL: "YOUR_FIREBASE_DATBASE_URL",
    apiKey: "AIzaSyCae6Z6p2WIhCkPpdj5s1Vbd1F5FjGabFc",
    authDomain: "captain-audit.firebaseapp.com",
    projectId: "captain-audit",
    storageBucket: "captain-audit.appspot.com",
    messagingSenderId: "939933986097",
    appId: "1:939933986097:web:62421376f31de3e01fd410",
    measurementId: "G-3VC3685M37"
};

firebase.initializeApp(firebaseConfig);
const messaging=firebase.messaging();

messaging.setBackgroundMessageHandler(function (payload) {
    console.log(payload);
    const notification=JSON.parse(payload);
    const notificationOption={
        body:notification.body,
        icon:notification.icon
    };
    return self.registration.showNotification(payload.notification.title,notificationOption);
});