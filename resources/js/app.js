import './bootstrap';

import.meta.glob(["../images/**", "../fonts/**"]);

import Pusher from "pusher-js";
window.Pusher = Pusher;

import "./echo";