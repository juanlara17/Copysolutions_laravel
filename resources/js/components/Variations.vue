<template>
    <div class="price_element">
        <div class="container_variations mt-2">
                <div class="select_data">
                    <h3>Dimension</h3>
                    <v-select v-model="dimension" class="select_data" :options="this.dimens"  :on-change="showPrice"></v-select>
                </div>

                <div class="select_data">
                    <h3>Quantity</h3>
                    <v-select v-model="quantity" class="select_data" :options="this.quantities" on-change="showPrice"></v-select>
                </div>
        </div>

        <div v-if="show_price" class="product-section-price">
           <strong>Price: </strong> ${{ product.price }}
        </div>
    </div>
</template>

<script>
    import 'vue-select/dist/vue-select.css';
    import vSelect from 'vue-select'
    Vue.component('v-select', vSelect)

    export default {
        props: ['dimens','quantities','product'],
        data() {
            return {
                show_price: false,
                dimension: null,
                quantity: null
            }
        },
        mounted() {
            console.log(this.quantities)
        },
        methods: {
            selected_dimension() {
            }
        },
        computed: {
            showPrice: function () {
                if (this.dimension && this.quantity) {
                    this.show_price = true;
                }
            }
        }
    }
</script>

<style scoped>

    .price_element {
        margin-bottom: 15px;
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

    .product-section-price {
        margin-top: 10px;
    }
</style>
