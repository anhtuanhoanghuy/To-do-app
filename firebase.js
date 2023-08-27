const firebaseConfig = {
    apiKey: "AIzaSyDtZUYNa4eZT5eEItrSrSARfuepAtHtdB8",
    authDomain: "to-do-list-7aff7.firebaseapp.com",
    projectId: "to-do-list-7aff7",
    storageBucket: "to-do-list-7aff7.appspot.com",
    messagingSenderId: "469135922465",
    appId: "1:469135922465:web:54a4667e6a34358a241a60",
    measurementId: "G-NT7PH0CLRM"
  };

  // Initialize Firebase
//   const app = initializeApp(firebaseConfig);
//   const analytics = getAnalytics(app);
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
//   const db = getFirestore(app);
  var db = firebase.firestore();