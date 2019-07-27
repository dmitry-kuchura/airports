<template>
    <div class="spinner-lg">
    <div class="spinner-lg-loader-outer">
        <div class="spinner-lg-loader-centered">
            <vue-loader></vue-loader>
        </div>
    </div>
    </div>
</template>

<style scoped>
    .vue-loaders .outer {
        text-align: center;
        background-color: dimgray;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        -ms-opacity: 0.9;
        opacity: 0.8;
        height: 100%;
        width: 100%
    }
    .vue-loaders .outer:before {
        content: '';
        display: inline-block;
        height: 100%;
        min-height: 100%;
        vertical-align: middle;
        margin-right: -0.25em; /* Adjusts for spacing */
    }
    .vue-loaders .centered {
        display: inline-block;
        vertical-align: middle;
        width: 300px;
        z-index: 200;
        color: white;
    }
    .vue-loaders .centered i {
        margin-left: 10px;
        margin-top: 10px;
    }
    .vue-loaders .left {
        left:240px;
        top: 60px;
        position: absolute;
    }

    .spinner-lg-loader-outer {
        text-align: center;
        background-color: dimgray;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        -ms-opacity: 0.9;
        opacity: 0.8;
        height: 100%;
        width: 100%
    }
    .spinner-lg-loader-outer:before {
        content: '';
        display: inline-block;
        height: 100%;
        min-height: 100%;
        vertical-align: middle;
        margin-right: -0.25em; /* Adjusts for spacing */
    }
    .spinner-lg-loader-centered {
        display: inline-block;
        vertical-align: middle;
        width: 300px;
        z-index: 200;
        color: white;
    }
    .spinner-lg-loader-centered i {
        margin-left: 10px;
        margin-top: 10px;
    }
</style>
