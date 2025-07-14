<?php


if(!function_exists('authUser')){
    function authUser(){
        return auth()->user();
    }
}