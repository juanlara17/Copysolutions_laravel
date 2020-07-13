<template>
    <div class="container_variations mt-2">
            <div class="select_data">
                <h3>Dimension</h3>
                <v-select class="select_data" :options="dimension"></v-select>
            </div>

            <div class="select_data">
                <h3>Quantiy</h3>
                <v-select class="select_data" :options="quantity"></v-select>
            </div>
    </div>



</template>

<script>
    import 'vue-select/dist/vue-select.css';
    import vSelect from 'vue-select'
    Vue.component('v-select', vSelect)

    export default {
        props: ['product'],
        data() {
            return {
                dimension: [
                    '4.5x3.0',
                    '2.0x3.5',
                    '4.0x11.5'
                ],
                quantity: [250,500,1000,5000,10000,20000,50000,100000],
                show_price: false
            }
        },
        methods: {
            dropdown() {

            }
        },
        mounted() {
           // console.log(this.product.price)
        }

    }
</script>

<style scoped>

    /*Styling Selectbox*/
    .dropdown {
        width: 300px;
        display: inline-block;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 0 2px rgb(204, 204, 204);
        transition: all .5s ease;
        position: relative;
        font-size: 14px;
        color: #474747;
        height: 100%;
        text-align: left
    }
    .dropdown .select {
        cursor: pointer;
        display: block;
        padding: 10px
    }
    .dropdown .select > i {
        font-size: 13px;
        color: #888;
        cursor: pointer;
        transition: all .3s ease-in-out;
        float: right;
        line-height: 20px
    }
    .dropdown:hover {
        box-shadow: 0 0 4px rgb(204, 204, 204)
    }
    .dropdown:active {
        background-color: #f8f8f8
    }
    .dropdown.active:hover,
    .dropdown.active {
        box-shadow: 0 0 4px rgb(204, 204, 204);
        border-radius: 2px 2px 0 0;
        background-color: #f8f8f8
    }
    .dropdown.active .select > i {
        transform: rotate(-90deg)
    }
    .dropdown .dropdown-menu {
        position: absolute;
        background-color: #fff;
        width: 100%;
        left: 0;
        margin-top: 1px;
        box-shadow: 0 1px 2px rgb(204, 204, 204);
        border-radius: 0 1px 2px 2px;
        overflow: hidden;
        display: none;
        max-height: 144px;
        overflow-y: auto;
        z-index: 9
    }
    .dropdown .dropdown-menu li {
        padding: 10px;
        transition: all .2s ease-in-out;
        cursor: pointer
    }
    .dropdown .dropdown-menu {
        padding: 0;
        list-style: none
    }
    .dropdown .dropdown-menu li:hover {
        background-color: #f2f2f2
    }
    .dropdown .dropdown-menu li:active {
        background-color: #e2e2e2
    }

    .container_variations {
        display: flex;
        justify-content: space-between;
    }

    .select_data {
        margin-top: 10px;
        width: 200px;
        height: 100%;
        border-radius: 0;
    }

    .select_data h3{
        font-weight: 400;
    }
</style>
