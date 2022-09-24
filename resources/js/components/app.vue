<template>
    <div class="ordersContainer">
        <div class="head">
            <h1 id="appTitle">Admin panel [Orders]</h1>
            <viewOrders />
            <button @click="">Fetch</button>
            <p>{{message}}</p>
        </div>
        
    </div>
</template>

<script>
    import viewOrders from "./viewOrders.vue"
    export default {
        data() {
            return {
                message: "#1 1999-06-05 1",
            };
        },
        components: {
            viewOrders
        }
        
    }
</script>

<style scroped>
    .ordersContainer {
        width: 400px;
        margin: auto;
    }

    .head {
        background: #1872f8;
        padding: 10px;
        position:absolute;
    }

    #appTitle {
        text-align: center;
    }


</style>