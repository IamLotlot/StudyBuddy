// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyANyCnSqg_b22wKuv-8DfoztKr2yrfAq34",
  authDomain: "studybuddy-acc91.firebaseapp.com",
  projectId: "studybuddy-acc91",
  storageBucket: "studybuddy-acc91.appspot.com",
  messagingSenderId: "933625820871",
  appId: "1:933625820871:web:6cd398be13a9f93d64b0e2",
  measurementId: "G-4J3BT5636J"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);